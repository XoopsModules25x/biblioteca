<?php
/**
 * ****************************************************************************
 *  - biblioteca By Leandro Angelo
 *
 *  - Este é um módulo clonado do TDMDownloads
 *
 * 1. La liberté d'exécuter le logiciel, pour n'importe quel usage,
 * 2. La liberté de l' étudier et de l'adapter à ses besoins,
 * 3. La liberté de redistribuer des copies,
 * 4. La liberté d'améliorer et de rendre publiques les modifications afin
 * que l'ensemble de la communauté en bénéficie.
 *
 * @copyright   http://www.jequiehost.com
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		Leandro Angelo; TEAM DEV MODULE
 *
 * ****************************************************************************
 */

include_once 'header.php';
// template d'affichage
$xoopsOption['template_main'] = 'biblioteca_viewcat.html';
include_once XOOPS_ROOT_PATH.'/header.php';
$xoTheme->addStylesheet( XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname', 'n') . '/css/styles.css', null );
$cid = biblioteca_CleanVars($_REQUEST, 'cid', 0, 'int');

// pour les permissions
$categories = biblioteca_MygetItemIds('biblioteca_view', 'biblioteca');

// redirection si la catégorie n'existe pas
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('cat_cid', $cid));
if ($downloadscat_Handler->getCount($criteria) == 0 || $cid == 0){
    redirect_header('index.php', 3, _MD_biblioteca_CAT_NONEXISTENT);
	exit();
}
// pour les permissions (si pas de droit, redirection)
if(!in_array(intval($_REQUEST['cid']), $categories)) {
	redirect_header('index.php', 2, _NOPERM);
	exit();
}

//tableau des catégories
$criteria = new CriteriaCompo();
$criteria->setSort('cat_weight ASC, cat_title');
$criteria->setOrder('ASC');
$criteria->add(new Criteria('cat_cid', '(' . implode(',', $categories) . ')','IN'));
$downloadscat_arr = $downloadscat_Handler->getall($criteria);
$mytree = new XoopsObjectTree($downloadscat_arr, 'cat_cid', 'cat_pid');

//tableau des téléchargements
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('status', 0, '!='));
$criteria->add(new Criteria('cid', '(' . implode(',', $categories) . ')','IN'));
$downloads_arr = $downloads_Handler->getall($criteria);
$xoopsTpl->assign('lang_thereare', sprintf(_MD_biblioteca_INDEX_THEREARE, count($downloads_arr)));

//navigation
$nav_category = biblioteca_PathTreeUrl($mytree, $cid, $downloadscat_arr, 'cat_title', $prefix = ' <img src="images/deco/arrow.gif"> ', true, 'ASC');
$xoopsTpl->assign('category_path', $nav_category);

//affichage des catégories
$count = 1;
$keywords = '';
foreach (array_keys($downloadscat_arr) as $i) {
    if ($downloadscat_arr[$i]->getVar('cat_pid') == $cid){
        $totaldownloads = biblioteca_NumbersOfEntries($mytree, $categories, $downloads_arr, $downloadscat_arr[$i]->getVar('cat_cid'));
        $subcategories_arr = $mytree->getFirstChild($downloadscat_arr[$i]->getVar('cat_cid'));
        $chcount = 0;
        $subcategories = '';
        //pour les mots clef
        $keywords .= $downloadscat_arr[$i]->getVar('cat_title') . ',';
        foreach (array_keys($subcategories_arr) as $j) {
                if ($chcount>=$xoopsModuleConfig['nbsouscat']){				
                    $subcategories .= '<li>[<a href="' . XOOPS_URL . '/modules/biblioteca/viewcat.php?cid=' . $downloadscat_arr[$i]->getVar('cat_cid') . '">+</a>]</li>';
                    break;
                }
                $subcategories .= '<li><a href="' . XOOPS_URL . '/modules/biblioteca/viewcat.php?cid=' . $subcategories_arr[$j]->getVar('cat_cid') . '">' . $subcategories_arr[$j]->getVar('cat_title') . '</a></li>';
                $keywords .= $downloadscat_arr[$i]->getVar('cat_title') . ',';
                $chcount++;
        }
        $xoopsTpl->append('subcategories', array('image' => $uploadurl . $downloadscat_arr[$i]->getVar('cat_imgurl'), 'id' => $downloadscat_arr[$i]->getVar('cat_cid'), 'title' => $downloadscat_arr[$i]->getVar('cat_title'), 'description_main' => $downloadscat_arr[$i]->getVar('cat_description_main'), 'infercategories' => $subcategories, 'totaldownloads' => $totaldownloads, 'count' => $count));
        $count++;
    }
}

//pour afficher les résumés
//----------------------------------------------------------------------------------------------------------------------------------------------------
//téléchargements récents
if($xoopsModuleConfig['bldate']==1){
    $criteria = new CriteriaCompo();
    $criteria->add(new Criteria('status', 0, '!='));
    $criteria->add(new Criteria('cid', '(' . implode(',', $categories) . ')','IN'));
    $criteria->add(new Criteria('cid', intval($_REQUEST['cid'])));
    $criteria->setSort('date');
    $criteria->setOrder('DESC');
    $criteria->setLimit($xoopsModuleConfig['nbbl']);
    $downloads_arr = $downloads_Handler->getall($criteria);
    foreach (array_keys($downloads_arr) as $i) {
        $title = $downloads_arr[$i]->getVar('title');
		if (strlen($title) >= $xoopsModuleConfig['longbl']) {
				$title = substr($title,0,($xoopsModuleConfig['longbl']))."...";
		}
        $date = formatTimestamp($downloads_arr[$i]->getVar('date'),"s");
        $xoopsTpl->append('bl_date', array('id' => $downloads_arr[$i]->getVar('lid'),'cid' => $downloads_arr[$i]->getVar('cid'),'date' => $date,'title' => $title));
    }
}
//plus téléchargés
if($xoopsModuleConfig['blpop']==1){
    $criteria = new CriteriaCompo();
    $criteria->add(new Criteria('status', 0, '!='));
    $criteria->add(new Criteria('cid', '(' . implode(',', $categories) . ')','IN'));
    $criteria->add(new Criteria('cid', intval($_REQUEST['cid'])));
    $criteria->setSort('hits');
    $criteria->setOrder('DESC');
    $criteria->setLimit($xoopsModuleConfig['nbbl']);
    $downloads_arr = $downloads_Handler->getall($criteria);
    foreach (array_keys($downloads_arr) as $i) {
        $title = $downloads_arr[$i]->getVar('title');
		if (strlen($title) >= $xoopsModuleConfig['longbl']) {
				$title = substr($title,0,($xoopsModuleConfig['longbl'])) . "...";
		}
        $xoopsTpl->append('bl_pop', array('id' => $downloads_arr[$i]->getVar('lid'),'cid' => $downloads_arr[$i]->getVar('cid'),'hits' => $downloads_arr[$i]->getVar('hits'),'title' => $title));
    }
}
//mieux notés
if($xoopsModuleConfig['blrating']==1){
    $criteria = new CriteriaCompo();
    $criteria->add(new Criteria('status', 0, '!='));
    $criteria->add(new Criteria('cid', '(' . implode(',', $categories) . ')','IN'));
    $criteria->add(new Criteria('cid', intval($_REQUEST['cid'])));
    $criteria->setSort('rating');
    $criteria->setOrder('DESC');
    $criteria->setLimit($xoopsModuleConfig['nbbl']);
    $downloads_arr = $downloads_Handler->getall($criteria);
    foreach (array_keys($downloads_arr) as $i) {
        $title = $downloads_arr[$i]->getVar('title');
		if (strlen($title) >= $xoopsModuleConfig['longbl']) {
				$title = substr($title,0,($xoopsModuleConfig['longbl']))."...";
		}
        $rating = number_format($downloads_arr[$i]->getVar('rating'),1);
        $xoopsTpl->append('bl_rating', array('id' => $downloads_arr[$i]->getVar('lid'),'cid' => $downloads_arr[$i]->getVar('cid'),'rating' => $rating,'title' => $title));
    }
}
// affichage du résumé
if ($xoopsModuleConfig['bldate']==0 and $xoopsModuleConfig['blpop']==0 and $xoopsModuleConfig['blrating']==0){
    $bl_affichage = 0;
}else{
    $bl_affichage = 1;  
}
//----------------------------------------------------------------------------------------------------------------------------------------------------

// affichage des téléchargements
if ($xoopsModuleConfig['perpage'] > 0){
    //Utilisation d'une copie d'écran avec la largeur selon les préférences
    if ($xoopsModuleConfig['useshots'] == 1) {
        $xoopsTpl->assign('shotwidth', $xoopsModuleConfig['shotwidth']);
        $xoopsTpl->assign('show_screenshot', true);
    }
    $criteria = new CriteriaCompo();
    $criteria->add(new Criteria('status', 0, '!='));
    $criteria->add(new Criteria('cid', '(' . implode(',', $categories) . ')','IN'));
    $criteria->add(new Criteria('cid', intval($_REQUEST['cid'])));
    $numrows = $downloads_Handler->getCount($criteria);
    $xoopsTpl->assign('lang_thereare', sprintf(_MD_biblioteca_CAT_THEREARE,$numrows));

    // Pour un affichage sur plusieurs pages
    if (isset($_REQUEST['limit'])) {
        $criteria->setLimit($_REQUEST['limit']);
        $limit = $_REQUEST['limit'];
    } else {
        $criteria->setLimit($xoopsModuleConfig['perpage']);
        $limit = $xoopsModuleConfig['perpage'];
    }
    if (isset($_REQUEST['start'])) {
        $criteria->setStart($_REQUEST['start']);
        $start = $_REQUEST['start'];
    } else {
        $criteria->setStart(0);
        $start = 0;
    }
    if (isset($_REQUEST['sort'])) {
        $criteria->setSort($_REQUEST['sort']);
        $sort = $_REQUEST['sort'];
    }else{
        $criteria->setSort('date');
        $sort = 'date';
    }
    if (isset($_REQUEST['order'])) {
        $criteria->setOrder($_REQUEST['order']);
        $order = $_REQUEST['order'];
    }else{
        $criteria->setOrder('DESC');
        $order = 'DESC';
    }

    $downloads_arr = $downloads_Handler->getall($criteria);
    if ( $numrows > $limit ) {
        $pagenav = new XoopsPageNav($numrows, $limit, $start, 'start', 'limit=' . $limit . '&cid=' . intval($_REQUEST['cid']) . '&sort=' . $sort . '&order=' . $order);
        $pagenav = $pagenav->renderNav(4);
    } else {
        $pagenav = '';
    }
    $xoopsTpl->assign('pagenav', $pagenav);
    $summary = '';
    $cpt = 0;
    $categories = biblioteca_MygetItemIds('biblioteca_download', 'biblioteca');
    $item = biblioteca_MygetItemIds('biblioteca_download_item', 'biblioteca');
    foreach (array_keys($downloads_arr) as $i) {
        if ($downloads_arr[$i]->getVar('logourl') == 'blank.gif'){
            $logourl = '';
        }else{
            $logourl = $downloads_arr[$i]->getVar('logourl');
            $logourl = $uploadurl_shots . $logourl;
        }
        $datetime = formatTimestamp($downloads_arr[$i]->getVar('date'),'s');
        $submitter = XoopsUser::getUnameFromId($downloads_arr[$i]->getVar('submitter'));    
        $description = $downloads_arr[$i]->getVar('description');
        //permet d'afficher uniquement la description courte
        if (strpos($description,'[pagebreak]')==false){	
            $description_short = $description;
        }else{
            $description_short = substr($description,0,strpos($description,'[pagebreak]'));
        }
        // pour les vignettes "new" et "mis à jour"
        $new = biblioteca_Thumbnail($downloads_arr[$i]->getVar('date'), $downloads_arr[$i]->getVar('status'));
        $pop = biblioteca_Popular($downloads_arr[$i]->getVar('hits'));
        
        // Défini si la personne est un admin
        if (is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->mid())) {
            $adminlink = '<a href="' . XOOPS_URL . '/modules/biblioteca/admin/downloads.php?op=view_downloads&amp;downloads_lid=' . $downloads_arr[$i]->getVar('lid') . '" title="' . _MD_biblioteca_EDITTHISDL . '"><img src="' . XOOPS_URL . '/modules/biblioteca/images/editicon.png" width="16px" height="16px" border="0" alt="' . _MD_biblioteca_EDITTHISDL . '" /></a>';
        } else {
            $adminlink = '';
        }
        //permission de télécharger
        if ($xoopsModuleConfig['permission_download'] == 1) {
            if (!in_array($downloads_arr[$i]->getVar('cid'), $categories)) {
                $perm_download = false;
            }else{
                $perm_download = true;
            }
        }else{
            if (!in_array($downloads_arr[$i]->getVar('lid'), $item)) {
                $perm_download = false;
            }else{
                $perm_download = true;
            }
        }
        // utilisation du sommaire
        $cpt++;
        $summary = $cpt . '- <a href="#l' . $cpt . '">' . $downloads_arr[$i]->getVar('title') . '</a><br />'; 
        $xoopsTpl->append('summary', array('title' => $summary, 'count' => $cpt));
        
        $xoopsTpl->append('file', array('id' => $downloads_arr[$i]->getVar('lid'),'cid' => $downloads_arr[$i]->getVar('cid'), 'title' => $downloads_arr[$i]->getVar('title') . $new . $pop,'logourl' => $logourl,'updated' => $datetime,'description_short' => $description_short,
                                        'adminlink' => $adminlink, 'submitter' => $submitter, 'perm_download' => $perm_download));
        //pour les mots clef
        $keywords .= $downloads_arr[$i]->getVar('title') . ',';
    }


    if ($numrows == 0){
        $bl_affichage = 0;
    }
    $xoopsTpl->assign('bl_affichage', $bl_affichage);

    // affichage du sommaire
    if($xoopsModuleConfig['autosummary']) {
        if ($numrows == 0){
            $xoopsTpl->assign('aff_summary', false);
        }else{
            $xoopsTpl->assign('aff_summary', true);
        }
    } else {
        $xoopsTpl->assign('aff_summary', false);
    }

    // affichage du menu de tri
    if($numrows>1){
        $xoopsTpl->assign('navigation', true);
        $xoopsTpl->assign('category_id', intval($_REQUEST['cid']));
        $sortorder = $sort . $order;
        if ($sortorder == "hitsASC") $affichage_tri = _MD_biblioteca_CAT_POPULARITYLTOM;
        if ($sortorder == "hitsDESC") $affichage_tri = _MD_biblioteca_CAT_POPULARITYMTOL;
        if ($sortorder == "titleASC") $affichage_tri = _MD_biblioteca_CAT_TITLEATOZ;
        if ($sortorder == "titleDESC") $affichage_tri = _MD_biblioteca_CAT_TITLEZTOA;
        if ($sortorder == "dateASC") $affichage_tri = _MD_biblioteca_CAT_DATEOLD;
        if ($sortorder == "dateDESC") $affichage_tri = _MD_biblioteca_CAT_DATENEW;
        if ($sortorder == "ratingASC") $affichage_tri = _MD_biblioteca_CAT_RATINGLTOH;
        if ($sortorder == "ratingDESC") $affichage_tri = _MD_biblioteca_CAT_RATINGHTOL;
        $xoopsTpl->assign('affichage_tri', sprintf(_MD_biblioteca_CAT_CURSORTBY, $affichage_tri));
    }
}
// référencement
// titre de la page
$pagetitle = biblioteca_PathTreeUrl($mytree, $cid, $downloadscat_arr, 'cat_title', $prefix = ' - ', false, 'DESC');
$xoopsTpl->assign('xoops_pagetitle', $pagetitle);
//description
$xoTheme->addMeta( 'meta', 'description', strip_tags($downloadscat_arr[$cid]->getVar('cat_description_main')));
//keywords
$keywords = substr($keywords,0,-1);
$xoTheme->addMeta( 'meta', 'keywords', $keywords);

include XOOPS_ROOT_PATH.'/footer.php';
?>
