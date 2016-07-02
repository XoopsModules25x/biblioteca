<?php
/**
 * ****************************************************************************
 *  - biblioteca By Leandro Angelo
 *
 *  - Este � um m�dulo clonado do TDMDownloads
 *
 * 1. La libert� d'ex�cuter le logiciel, pour n'importe quel usage,
 * 2. La libert� de l' �tudier et de l'adapter � ses besoins,
 * 3. La libert� de redistribuer des copies,
 * 4. La libert� d'am�liorer et de rendre publiques les modifications afin
 * que l'ensemble de la communaut� en b�n�ficie.
 *
 * @copyright     http://www.jequiehost.com
 * @license       http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author        Leandro Angelo; TEAM DEV MODULE
 *
 * ****************************************************************************
 */

include_once 'header.php';
// template d'affichage
$xoopsOption['template_main'] = 'biblioteca_ratefile.html';
include_once XOOPS_ROOT_PATH . '/header.php';
$xoTheme->addStylesheet(XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname', 'n') . '/css/styles.css', null);
//On recupere la valeur de l'argument op dans l'URL$
$op  = biblioteca_CleanVars($_REQUEST, 'op', 'liste', 'string');
$lid = biblioteca_CleanVars($_REQUEST, 'lid', 0, 'int');

//redirection si pas de permission de vote
if ($perm_vote == false) {
    redirect_header('index.php', 2, _NOPERM);
    exit();
}

$view_downloads = $downloads_Handler->get($lid);
// redirection si le t�l�chargement n'existe pas ou n'est pas activ�
if (count($view_downloads) == 0 || $view_downloads->getVar('status') == 0) {
    redirect_header('index.php', 3, _MD_BIBLIOTECA_SINGLEFILE_NONEXISTENT);
    exit();
}

//redirection si pas de permission (cat)
$categories = biblioteca_MygetItemIds('biblioteca_view', 'biblioteca');
if (!in_array($view_downloads->getVar('cid'), $categories)) {
    redirect_header(XOOPS_URL, 2, _NOPERM);
    exit();
}

//Les valeurs de op qui vont permettre d'aller dans les differentes parties de la page
switch ($op) {
    // Vue liste
    case 'liste':
        //tableau des cat�gories
        $criteria = new CriteriaCompo();
        $criteria->setSort('cat_weight ASC, cat_title');
        $criteria->setOrder('ASC');
        $criteria->add(new Criteria('cat_cid', '(' . implode(',', $categories) . ')', 'IN'));
        $downloadscat_arr = $downloadscat_Handler->getall($criteria);
        $mytree           = new XoopsObjectTree($downloadscat_arr, 'cat_cid', 'cat_pid');
        //navigation
        $navigation = biblioteca_PathTreeUrl($mytree, $view_downloads->getVar('cid'), $downloadscat_arr, 'cat_title', $prefix = ' <img src="images/deco/arrow.gif"> ', true, 'ASC', true);
        $navigation .= ' <img src="images/deco/arrow.gif"> <a href="singlefile.php?lid=' . $view_downloads->getVar('lid') . '">' . $view_downloads->getVar('title') . '</a>';
        $navigation .= ' <img src="images/deco/arrow.gif"> ' . _MD_BIBLIOTECA_SINGLEFILE_RATHFILE;
        $xoopsTpl->assign('navigation', $navigation);
        // r�f�rencement
        // titre de la page
        $pagetitle = _MD_BIBLIOTECA_SINGLEFILE_RATHFILE . ' - ' . $view_downloads->getVar('title') . ' - ';
        $pagetitle .= biblioteca_PathTreeUrl($mytree, $view_downloads->getVar('cid'), $downloadscat_arr, 'cat_title', $prefix = ' - ', false, 'DESC', true);
        $xoopsTpl->assign('xoops_pagetitle', $pagetitle);
        //description
        $xoTheme->addMeta('meta', 'description', strip_tags(_MD_BIBLIOTECA_SINGLEFILE_RATHFILE . ' (' . $view_downloads->getVar('title') . ')'));
        //Affichage du formulaire de notation des t�l�chargements
        $obj  =& $downloadsvotedata_Handler->create();
        $form = $obj->getForm($lid);
        $xoopsTpl->assign('themeForm', $form->render());
        break;

    // save
    case 'save':
        $obj =& $downloadsvotedata_Handler->create();
        if (empty($xoopsUser)) {
            $ratinguser = 0;
        } else {
            $ratinguser = $xoopsUser->getVar('uid');
        }
        // si c'est un membre on v�rifie qu'il ne vote pas pour son fichier
        if ($ratinguser != 0) {
            $criteria = new CriteriaCompo();
            $criteria->add(new Criteria('lid', $lid));
            $downloads_arr = $downloads_Handler->getall($criteria);
            foreach (array_keys($downloads_arr) as $i) {
                if ($downloads_arr[$i]->getVar('submitter') == $ratinguser) {
                    redirect_header('singlefile.php?lid=' . (int)$_REQUEST['lid'], 2, _MD_BIBLIOTECA_RATEFILE_CANTVOTEOWN);
                    exit();
                }
            }
            // si c'est un membre on v�rifie qu'il ne vote pas 2 fois
            $criteria = new CriteriaCompo();
            $criteria->add(new Criteria('lid', $lid));
            $downloadsvotes_arr = $downloadsvotedata_Handler->getall($criteria);
            foreach (array_keys($downloadsvotes_arr) as $i) {
                if ($downloadsvotes_arr[$i]->getVar('ratinguser') == $ratinguser) {
                    redirect_header('singlefile.php?lid=' . (int)$_REQUEST['lid'], 2, _MD_BIBLIOTECA_RATEFILE_VOTEONCE);
                    exit();
                }
            }
        } else {
            // si c'est un utilisateur anonyme on v�rifie qu'il ne vote pas 2 fois par jour
            $yesterday = (time() - 86400);
            $criteria  = new CriteriaCompo();
            $criteria->add(new Criteria('lid', $lid));
            $criteria->add(new Criteria('ratinguser', 0));
            $criteria->add(new Criteria('ratinghostname', getenv('REMOTE_ADDR')));
            $criteria->add(new Criteria('ratingtimestamp', $yesterday, '>'));
            if ($downloadsvotedata_Handler->getCount($criteria) >= 1) {
                redirect_header('singlefile.php?lid=' . (int)$_REQUEST['lid'], 2, _MD_BIBLIOTECA_RATEFILE_VOTEONCE);
                exit();
            }
        }
        $erreur         = false;
        $message_erreur = '';
        // Test avant la validation
        $rating = (int)$_POST['rating'];
        if ($rating < 0 || $rating > 10) {
            $message_erreur .= _MD_BIBLIOTECA_RATEFILE_NORATING . '<br>';
            $erreur = true;
        }
        xoops_load('captcha');
        $xoopsCaptcha = XoopsCaptcha::getInstance();
        if (!$xoopsCaptcha->verify()) {
            $message_erreur .= $xoopsCaptcha->getMessage() . '<br>';
            $erreur = true;
        }
        $obj->setVar('lid', $lid);
        $obj->setVar('ratinguser', $ratinguser);
        $obj->setVar('rating', $rating);
        $obj->setVar('ratinghostname', getenv('REMOTE_ADDR'));
        $obj->setVar('ratingtimestamp', time());
        if ($erreur == true) {
            $xoopsTpl->assign('message_erreur', $message_erreur);
        } else {
            if ($downloadsvotedata_Handler->insert($obj)) {
                $criteria = new CriteriaCompo();
                $criteria->add(new Criteria('lid', $lid));
                $downloadsvotes_arr = $downloadsvotedata_Handler->getall($criteria);
                $total_vote         = $downloadsvotedata_Handler->getCount($criteria);
                $total_rating       = 0;
                foreach (array_keys($downloadsvotes_arr) as $i) {
                    $total_rating += $downloadsvotes_arr[$i]->getVar('rating');
                }
                $rating       = $total_rating / $total_vote;
                $objdownloads =& $downloads_Handler->get($lid);
                $objdownloads->setVar('rating', number_format($rating, 1));
                $objdownloads->setVar('votes', $total_vote);
                if ($downloads_Handler->insert($objdownloads)) {
                    redirect_header('singlefile.php?lid=' . $lid, 2, _MD_BIBLIOTECA_RATEFILE_VOTEOK);
                }
                echo $objdownloads->getHtmlErrors();
            }
            echo $obj->getHtmlErrors();
        }
        //Affichage du formulaire de notation des t�l�chargements
        $form =& $obj->getForm($lid);
        $xoopsTpl->assign('themeForm', $form->render());

        break;
}
include XOOPS_ROOT_PATH . '/footer.php';
