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
 * @copyright     http://www.jequiehost.com
 * @license       http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author        Leandro Angelo; TEAM DEV MODULE
 *
 * ****************************************************************************
 */

include 'admin_header.php';
//On recupere la valeur de l'argument op dans l'URL$
$op = biblioteca_CleanVars($_REQUEST, 'op', 'list', 'string');

//Les valeurs de op qui vont permettre d'aller dans les differentes parties de la page
switch ($op) {
    // Vue liste
    case 'list':
        //Affichage de la partie haute de l'administration de Xoops
        xoops_cp_header();
        //appel du menu admin
        if (!is_readable(XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php')) {
            biblioteca_adminmenu(2, _MI_BIBLIOTECA_ADMENU2);
        } else {
            include_once XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php';
            loadModuleAdminMenu(2, _MI_BIBLIOTECA_ADMENU2);
        }
        // Sous-menu
        echo '<div class="head" align="center">';
        echo $op == 'new_cat' ? _AM_BIBLIOTECA_CAT_NEW : '<a href="category.php?op=new_cat">' . _AM_BIBLIOTECA_CAT_NEW . '</a>';
        echo ' | ';
        echo $op == 'list' ? _AM_BIBLIOTECA_CAT_LIST : '<a href="category.php?op=list">' . _AM_BIBLIOTECA_CAT_LIST . '</a>';
        echo '</div><br>';
        $criteria = new CriteriaCompo();
        $criteria->setSort('cat_weight ASC, cat_title');
        $criteria->setOrder('ASC');
        $downloads_cat = $downloadscat_Handler->getall($criteria);
        //Affichage du tableau
        if (count($downloads_cat) > 0) {
            echo '<table width="100%" cellspacing="1" class="outer">';
            echo '<tr>';
            echo '<th align="left" width="25%">' . _AM_BIBLIOTECA_FORMTITLE . '</th>';
            echo '<th align="center" width="10%">' . _AM_BIBLIOTECA_FORMIMG . '</th>';
            echo '<th align="center">' . _AM_BIBLIOTECA_FORMTEXT . '</th>';
            echo '<th align="center" width="3%">' . _AM_BIBLIOTECA_FORMWEIGHT . '</th>';
            echo '<th align="center" width="5%">' . _AM_BIBLIOTECA_FORMACTION . '</th>';
            echo '</tr>';
            $class = 'odd';
            include_once XOOPS_ROOT_PATH . '/modules/biblioteca/class/tree.php';
            $mytree             = new TDMObjectTree($downloads_cat, 'cat_cid', 'cat_pid');
            $category_ArrayTree = $mytree->makeArrayTree('cat_title', '<img src="../images/deco/arrow.gif">');
            foreach (array_keys($category_ArrayTree) as $i) {
                echo '<tr class="' . $class . '">';
                echo '<td align="left" ><a href="' . XOOPS_URL . '/modules/biblioteca/viewcat.php?cid=' . $i . '">' . $category_ArrayTree[$i] . '</a></td>';
                echo '<td align="center">';
                echo '<img src="' . $uploadurl . $downloads_cat[$i]->getVar('cat_imgurl') . '" alt="" title="" height="60">';
                echo '</td>';
                echo '<td align="left">' . $downloads_cat[$i]->getVar('cat_description_main') . '</td>';
                echo '<td align="center">' . $downloads_cat[$i]->getVar('cat_weight') . '</td>';
                echo '<td align="center">';
                echo '<a href="category.php?op=edit_cat&downloadscat_cid=' . $i . '"><img src="../images/icon/edit_mini.gif" alt="' . _AM_BIBLIOTECA_FORMEDIT . '" title="' . _AM_BIBLIOTECA_FORMEDIT . '"></a> ';
                echo '<a href="category.php?op=del_cat&downloadscat_cid=' . $i . '"><img src="../images/icon/delete_mini.gif" alt="' . _AM_BIBLIOTECA_FORMDEL . '" title="' . _AM_BIBLIOTECA_FORMDEL . '"></a>';
                echo '</td>';
                echo '</tr>';
                $class = ($class == 'even') ? 'odd' : 'even';
            }
            echo '</table>';
        }
        break;

    // vue création
    case 'new_cat':
        //Affichage de la partie haute de l'administration de Xoops
        xoops_cp_header();
        //appel du menu admin
        if (!is_readable(XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php')) {
            biblioteca_adminmenu(2, _MI_BIBLIOTECA_ADMENU2);
        } else {
            include_once XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php';
            loadModuleAdminMenu(2, _MI_BIBLIOTECA_ADMENU2);
        }
        // Sous-menu
        echo '<div class="head" align="center">';
        echo $op == 'new_cat' ? _AM_BIBLIOTECA_CAT_NEW : '<a href="category.php?op=new_cat">' . _AM_BIBLIOTECA_CAT_NEW . '</a>';
        echo ' | ';
        echo $op == 'list' ? _AM_BIBLIOTECA_CAT_LIST : '<a href="category.php?op=list">' . _AM_BIBLIOTECA_CAT_LIST . '</a>';
        echo '</div><br>';
        //Affichage du formulaire de création des catégories
        $obj  =& $downloadscat_Handler->create();
        $form = $obj->getForm();
        $form->display();
        break;

    // Pour éditer une catégorie
    case 'edit_cat':
        //Affichage de la partie haute de l'administration de Xoops
        xoops_cp_header();
        //appel du menu admin
        if (!is_readable(XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php')) {
            biblioteca_adminmenu(2, _MI_BIBLIOTECA_ADMENU2);
        } else {
            include_once XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php';
            loadModuleAdminMenu(2, _MI_BIBLIOTECA_ADMENU2);
        }
        // Sous-menu
        echo '<div class="head" align="center">';
        echo $op == 'new_cat' ? _AM_BIBLIOTECA_CAT_NEW : '<a href="category.php?op=new_cat">' . _AM_BIBLIOTECA_CAT_NEW . '</a>';
        echo ' | ';
        echo $op == 'list' ? _AM_BIBLIOTECA_CAT_LIST : '<a href="category.php?op=list">' . _AM_BIBLIOTECA_CAT_LIST . '</a>';
        echo '</div><br>';
        //Affichage du formulaire de création des catégories
        $downloadscat_cid = biblioteca_CleanVars($_REQUEST, 'downloadscat_cid', 0, 'int');
        $obj              = $downloadscat_Handler->get($downloadscat_cid);
        $form             = $obj->getForm();
        $form->display();
        break;

    // Pour supprimer une catégorie
    case 'del_cat':
        global $xoopsModule;
        $downloadscat_cid = biblioteca_CleanVars($_REQUEST, 'downloadscat_cid', 0, 'int');
        $obj              =& $downloadscat_Handler->get($downloadscat_cid);
        if (isset($_REQUEST['ok']) && $_REQUEST['ok'] == 1) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                redirect_header('category.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            // supression des téléchargements de la catégorie
            $criteria = new CriteriaCompo();
            $criteria->add(new Criteria('cid', $downloadscat_cid));
            $downloads_arr = $downloads_Handler->getall($criteria);
            foreach (array_keys($downloads_arr) as $i) {
                // supression des votes
                $criteria_1 = new CriteriaCompo();
                $criteria_1->add(new Criteria('lid', $downloads_arr[$i]->getVar('lid')));
                $downloads_votedata = $downloadsvotedata_Handler->getall($criteria_1);
                foreach (array_keys($downloads_votedata) as $j) {
                    $objvotedata =& $downloadsvotedata_Handler->get($downloads_votedata[$j]->getVar('ratingid'));
                    $downloadsvotedata_Handler->delete($objvotedata) or $objvotedata->getHtmlErrors();
                }
                // supression des rapports de fichier brisé
                $criteria_2 = new CriteriaCompo();
                $criteria_2->add(new Criteria('lid', $downloads_arr[$i]->getVar('lid')));
                $downloads_broken = $downloadsbroken_Handler->getall($criteria_2);
                foreach (array_keys($downloads_broken) as $j) {
                    $objbroken =& $downloadsbroken_Handler->get($downloads_broken[$j]->getVar('reportid'));
                    $downloadsbroken_Handler->delete($objbroken) or $objbroken->getHtmlErrors();
                }
                // supression des data des champs sup.
                $criteria_3 = new CriteriaCompo();
                $criteria_3->add(new Criteria('lid', $downloads_arr[$i]->getVar('lid')));
                $downloads_fielddata = $downloadsfielddata_Handler->getall($criteria_3);
                if ($downloadsfielddata_Handler->getCount($criteria_3) > 0) {
                    foreach (array_keys($downloads_fielddata) as $j) {
                        $objfielddata =& $downloadsfielddata_Handler->get($downloads_fielddata[$j]->getVar('iddata'));
                        $downloadsfielddata_Handler->delete($objfielddata) or $objvfielddata->getHtmlErrors();
                    }
                }
                // supression des commentaires
                if ($downloads_arr[$i]->getVar('comments') > 0) {
                    xoops_comment_delete($xoopsModule->getVar('mid'), $downloads_arr[$i]->getVar('lid'));
                }
                //supression des tags
                if (($xoopsModuleConfig['usetag'] == 1) and is_dir('../../tag')) {
                    $tag_handler = xoops_getmodulehandler('link', 'tag');
                    $criteria    = new CriteriaCompo();
                    $criteria->add(new Criteria('tag_itemid', $downloads_arr[$i]->getVar('lid')));
                    $downloads_tags = $tag_handler->getall($criteria);
                    if (count($downloads_tags) > 0) {
                        foreach (array_keys($downloads_tags) as $j) {
                            $objtags =& $tag_handler->get($downloads_tags[$j]->getVar('tl_id'));
                            $tag_handler->delete($objtags) or $objtags->getHtmlErrors();
                        }
                    }
                }
                // supression du fichier
                // pour extraire le nom du fichier
                $urlfile = substr_replace($downloads_arr[$i]->getVar('url'), '', 0, strlen($uploadurl_downloads));
                // chemin du fichier
                $urlfile = $uploaddir_downloads . $urlfile;
                if (is_file($urlfile)) {
                    chmod($urlfile, 0777);
                    unlink($urlfile);
                }
                // supression du téléchargment
                $objdownloads =& $downloads_Handler->get($downloads_arr[$i]->getVar('lid'));
                $downloads_Handler->delete($objdownloads) or $objdownloads->getHtmlErrors();
            }
            // supression des sous catégories avec leurs téléchargements            
            $downloadscat_arr   = $downloadscat_Handler->getall();
            $mytree             = new XoopsObjectTree($downloadscat_arr, 'cat_cid', 'cat_pid');
            $downloads_childcat = $mytree->getAllChild($downloadscat_cid);
            foreach (array_keys($downloads_childcat) as $i) {
                // supression de la catégorie
                $objchild =& $downloadscat_Handler->get($downloads_childcat[$i]->getVar('cat_cid'));
                $downloadscat_Handler->delete($objchild) or $objchild->getHtmlErrors();
                // supression des téléchargements associés
                $criteria = new CriteriaCompo();
                $criteria->add(new Criteria('cid', $downloads_childcat[$i]->getVar('cat_cid')));
                $downloads_arr = $downloads_Handler->getall($criteria);
                foreach (array_keys($downloads_arr) as $i) {
                    // supression des votes
                    $criteria = new CriteriaCompo();
                    $criteria->add(new Criteria('lid', $downloads_arr[$i]->getVar('lid')));
                    $downloads_votedata = $downloadsvotedata_Handler->getall($criteria);
                    foreach (array_keys($downloads_votedata) as $j) {
                        $objvotedata =& $downloadsvotedata_Handler->get($downloads_votedata[$j]->getVar('ratingid'));
                        $downloadsvotedata_Handler->delete($objvotedata) or $objvotedata->getHtmlErrors();
                    }
                    // supression des rapports de fichier brisé
                    $criteria = new CriteriaCompo();
                    $criteria->add(new Criteria('lid', $downloads_arr[$i]->getVar('lid')));
                    $downloads_broken = $downloadsbroken_Handler->getall($criteria);
                    foreach (array_keys($downloads_broken) as $j) {
                        $objbroken =& $downloadsbroken_Handler->get($downloads_broken[$j]->getVar('reportid'));
                        $downloadsbroken_Handler->delete($objbroken) or $objbroken->getHtmlErrors();
                    }
                    // supression des data des champs sup.
                    $criteria = new CriteriaCompo();
                    $criteria->add(new Criteria('lid', $downloads_arr[$i]->getVar('lid')));
                    $downloads_fielddata = $downloadsfielddata_Handler->getall($criteria);
                    foreach (array_keys($downloads_fielddata) as $j) {
                        $objfielddata =& $downloadsfielddata_Handler->get($downloads_fielddata[$j]->getVar('iddata'));
                        $downloadsfielddata_Handler->delete($objfielddata) or $objvfielddata->getHtmlErrors();
                    }
                    // supression des commentaires
                    if ($downloads_arr[$i]->getVar('comments') > 0) {
                        xoops_comment_delete($xoopsModule->getVar('mid'), $downloads_arr[$i]->getVar('lid'));
                    }
                    //supression des tags
                    if (($xoopsModuleConfig['usetag'] == 1) and is_dir('../../tag')) {
                        $tag_handler = xoops_getmodulehandler('link', 'tag');
                        $criteria    = new CriteriaCompo();
                        $criteria->add(new Criteria('tag_itemid', $downloads_arr[$i]->getVar('lid')));
                        $downloads_tags = $tag_handler->getall($criteria);
                        if (count($downloads_tags) > 0) {
                            foreach (array_keys($downloads_tags) as $j) {
                                $objtags =& $tag_handler->get($downloads_tags[$j]->getVar('tl_id'));
                                $tag_handler->delete($objtags) or $objtags->getHtmlErrors();
                            }
                        }
                    }
                    // supression du fichier                        
                    $urlfile = substr_replace($downloads_arr[$i]->getVar('url'), '', 0, strlen($uploadurl_downloads)); // pour extraire le nom du fichier                        
                    $urlfile = $uploaddir_downloads . $urlfile; // chemin du fichier
                    if (is_file($urlfile)) {
                        chmod($urlfile, 0777);
                        unlink($urlfile);
                    }
                    // supression du téléchargment
                    $objdownloads =& $downloads_Handler->get($downloads_arr[$i]->getVar('lid'));
                    $downloads_Handler->delete($objdownloads) or $objdownloads->getHtmlErrors();
                }
            }
            if ($downloadscat_Handler->delete($obj)) {
                redirect_header('category.php', 1, _AM_BIBLIOTECA_REDIRECT_DELOK);
            } else {
                echo $obj->getHtmlErrors();
            }
        } else {
            $message  = '';
            $criteria = new CriteriaCompo();
            $criteria->add(new Criteria('cid', $downloadscat_cid));
            $downloads_arr = $downloads_Handler->getall($criteria);
            if (count($downloads_arr) > 0) {
                $message .= _AM_BIBLIOTECA_DELDOWNLOADS . '<br>';
                foreach (array_keys($downloads_arr) as $i) {
                    $message .= '<span style="color : Red">' . $downloads_arr[$i]->getVar('title') . '</span><br>';
                }
            }
            $downloadscat_arr   = $downloadscat_Handler->getall();
            $mytree             = new XoopsObjectTree($downloadscat_arr, 'cat_cid', 'cat_pid');
            $downloads_childcat = $mytree->getAllChild($downloadscat_cid);
            if (count($downloads_childcat) > 0) {
                $message .= _AM_BIBLIOTECA_DELSOUSCAT . ' <br><br>';
                foreach (array_keys($downloads_childcat) as $i) {
                    $message .= '<b><span style="color : Red">' . $downloads_childcat[$i]->getVar('cat_title') . '</span></b><br>';
                    $criteria = new CriteriaCompo();
                    $criteria->add(new Criteria('cid', $downloads_childcat[$i]->getVar('cat_cid')));
                    $downloads_arr = $downloads_Handler->getall($criteria);
                    if (count($downloads_arr) > 0) {
                        $message .= _AM_BIBLIOTECA_DELDOWNLOADS . '<br>';
                        foreach (array_keys($downloads_arr) as $i) {
                            $message .= '<span style="color : Red">' . $downloads_arr[$i]->getVar('title') . '</span><br>';
                        }
                    }
                }
            } else {
                $message .= '';
            }
            //Affichage de la partie haute de l'administration de Xoops
            xoops_cp_header();
            //appel du menu admin
            if (!is_readable(XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php')) {
                biblioteca_adminmenu(2, _MI_BIBLIOTECA_ADMENU2);
            } else {
                include_once XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php';
                loadModuleAdminMenu(2, _MI_BIBLIOTECA_ADMENU2);
            }
            // Sous-menu
            echo '<div class="head" align="center">';
            echo $op == 'new_cat' ? _AM_BIBLIOTECA_CAT_NEW : '<a href="category.php?op=new_cat">' . _AM_BIBLIOTECA_CAT_NEW . '</a>';
            echo ' | ';
            echo $op == 'list' ? _AM_BIBLIOTECA_CAT_LIST : '<a href="category.php?op=list">' . _AM_BIBLIOTECA_CAT_LIST . '</a>';
            echo '</div><br>';
            xoops_confirm(array('ok' => 1, 'downloadscat_cid' => $downloadscat_cid, 'op' => 'del_cat'), $_SERVER['REQUEST_URI'], sprintf(_AM_BIBLIOTECA_FORMSUREDEL, $obj->getVar('cat_title')) . '<br><br>' . $message);
        }

        break;

    // Pour sauver une catégorie
    case 'save_cat':
        if (!$GLOBALS['xoopsSecurity']->check()) {
            redirect_header('category.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        $cat_cid = biblioteca_CleanVars($_REQUEST, 'cat_cid', 0, 'int');
        if (isset($_REQUEST['cat_cid'])) {
            $obj =& $downloadscat_Handler->get($cat_cid);
        } else {
            $obj =& $downloadscat_Handler->create();
        }
        $erreur         = false;
        $message_erreur = '';
        // Récupération des variables:
        // Pour l'image
        include_once XOOPS_ROOT_PATH . '/class/uploader.php';
        $uploader = new XoopsMediaUploader($uploaddir, array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png'), $xoopsModuleConfig['maxuploadsize'], null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $uploader->setPrefix('downloads_');
            $uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if (!$uploader->upload()) {
                $errors = $uploader->getErrors();
                redirect_header('javascript:history.go(-1)', 3, $errors);
            } else {
                $obj->setVar('cat_imgurl', $uploader->getSavedFileName());
            }
        } else {
            $obj->setVar('cat_imgurl', $_REQUEST['downloadscat_img']);
        }
        // Pour les autres variables
        $obj->setVar('cat_pid', $_POST['cat_pid']);
        $obj->setVar('cat_title', $_POST['cat_title']);
        $obj->setVar('cat_description_main', $_POST['cat_description_main']);
        $obj->setVar('cat_weight', $_POST['cat_weight']);
        if (intval($_REQUEST['cat_weight']) == 0 && $_REQUEST['cat_weight'] != '0') {
            $erreur         = true;
            $message_erreur = _AM_BIBLIOTECA_ERREUR_WEIGHT . '<br>';
        }
        if (isset($_REQUEST['cat_cid'])) {
            if ($cat_cid == $_REQUEST['cat_pid']) {
                $erreur = true;
                $message_erreur .= _AM_BIBLIOTECA_ERREUR_CAT;
            }
        }
        if ($erreur == true) {
            echo '<div class="errorMsg" style="text-align: left;">' . $message_erreur . '</div>';
        } else {
            if ($downloadscat_Handler->insert($obj)) {
                $newcat_cid = $obj->get_new_enreg();
                //permission pour voir
                $perm_id       = isset($_REQUEST['cat_cid']) ? $cat_cid : $newcat_cid;
                $gperm_handler = xoops_gethandler('groupperm');
                $criteria      = new CriteriaCompo();
                $criteria->add(new Criteria('gperm_itemid', $perm_id, '='));
                $criteria->add(new Criteria('gperm_modid', $xoopsModule->getVar('mid'), '='));
                $criteria->add(new Criteria('gperm_name', 'biblioteca_view', '='));
                $gperm_handler->deleteAll($criteria);
                if (isset($_POST['groups_view'])) {
                    foreach ($_POST['groups_view'] as $onegroup_id) {
                        $gperm_handler->addRight('biblioteca_view', $perm_id, $onegroup_id, $xoopsModule->getVar('mid'));
                    }
                }
                //permission pour editer
                $perm_id       = isset($_REQUEST['cat_cid']) ? $cat_cid : $newcat_cid;
                $gperm_handler = xoops_gethandler('groupperm');
                $criteria      = new CriteriaCompo();
                $criteria->add(new Criteria('gperm_itemid', $perm_id, '='));
                $criteria->add(new Criteria('gperm_modid', $xoopsModule->getVar('mid'), '='));
                $criteria->add(new Criteria('gperm_name', 'biblioteca_submit', '='));
                $gperm_handler->deleteAll($criteria);
                if (isset($_POST['groups_submit'])) {
                    foreach ($_POST['groups_submit'] as $onegroup_id) {
                        $gperm_handler->addRight('biblioteca_submit', $perm_id, $onegroup_id, $xoopsModule->getVar('mid'));
                    }
                }
                //permission pour télécharger
                if ($xoopsModuleConfig['permission_download'] == 1) {
                    $perm_id       = isset($_REQUEST['cat_cid']) ? $cat_cid : $newcat_cid;
                    $gperm_handler = xoops_gethandler('groupperm');
                    $criteria      = new CriteriaCompo();
                    $criteria->add(new Criteria('gperm_itemid', $perm_id, '='));
                    $criteria->add(new Criteria('gperm_modid', $xoopsModule->getVar('mid'), '='));
                    $criteria->add(new Criteria('gperm_name', 'biblioteca_download', '='));
                    $gperm_handler->deleteAll($criteria);
                    if (isset($_POST['groups_download'])) {
                        foreach ($_POST['groups_download'] as $onegroup_id) {
                            $gperm_handler->addRight('biblioteca_download', $perm_id, $onegroup_id, $xoopsModule->getVar('mid'));
                        }
                    }
                }
                //notification
                if (!isset($_REQUEST['categorie_modified'])) {
                    $tags                  = array();
                    $tags['CATEGORY_NAME'] = $_POST['cat_title'];
                    $tags['CATEGORY_URL']  = XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/viewcat.php?cid=' . $newcat_cid;
                    $notification_handler  = xoops_gethandler('notification');
                    $notification_handler->triggerEvent('global', 0, 'new_category', $tags);
                }
                redirect_header('category.php?op=list', 1, _AM_BIBLIOTECA_REDIRECT_SAVE);
            }
            echo $obj->getHtmlErrors();
        }
        $form =& $obj->getForm();
        $form->display();
        break;
}
//Affichage de la partie basse de l'administration de Xoops
xoops_cp_footer();
