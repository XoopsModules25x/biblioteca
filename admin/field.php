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
include 'admin_header.php';
//On recupere la valeur de l'argument op dans l'URL$
$op = biblioteca_CleanVars($_REQUEST, 'op', 'list', 'string');

//Les valeurs de op qui vont permettre d'aller dans les differentes parties de la page
switch ($op) 
{
	// Vue liste
    case "list":
        //Affichage de la partie haute de l'administration de Xoops
        xoops_cp_header();
        //appel du menu admin
        if ( !is_readable(XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php"))	{
            biblioteca_adminmenu(6, _MI_biblioteca_ADMENU6);
        } else {
            include_once XOOPS_ROOT_PATH.'/Frameworks/art/functions.admin.php';
            loadModuleAdminMenu (6, _MI_biblioteca_ADMENU6);
        }
        // Sous-menu
        echo '<div class="head" align="center">';
        echo $op == 'new_field' ? _AM_biblioteca_FIELD_NEW : '<a href="field.php?op=new_field">' . _AM_biblioteca_FIELD_NEW . '</a>';
        echo ' | ';
        echo $op == 'list' ? _AM_biblioteca_FIELD_LIST : '<a href="field.php?op=list">' . _AM_biblioteca_FIELD_LIST . '</a>';
        echo '</div><br>';
        $criteria = new CriteriaCompo();
        $criteria->setSort('weight ASC, title');
        $criteria->setOrder('ASC');
        $downloads_field = $downloadsfield_Handler->getall($criteria);
        $numrows = count($downloads_field);
        //Affichage du tableau
        if ($numrows>0) {
			echo '<table width="100%" cellspacing="1" class="outer">';
			echo '<tr>';			
			echo '<th align="left">' . _AM_biblioteca_FORMTITLE . '</th>';
            echo '<th align="center" width="10%">' . _AM_biblioteca_FORMIMAGE . '</th>';
            echo '<th align="center" width="10%">' . _AM_biblioteca_FORMWEIGHT . '</th>';
            echo '<th align="center" width="10%">' . _AM_biblioteca_FORMAFFICHE . '</th>';
            echo '<th align="center" width="10%">' . _AM_biblioteca_FORMAFFICHESEARCH . '</th>';
			echo '<th align="center" width="10%">' . _AM_biblioteca_FORMACTION . '</th>';			
			echo '</tr>';
			$class = 'odd';
            foreach (array_keys($downloads_field) as $i) {                   
                $downloadsfield_fid = $downloads_field[$i]->getVar('fid');
                echo '<tr class="'.$class.'">';
                echo '<td align="left">' . $downloads_field[$i]->getVar('title') . '</a></td>';
                echo '<td align="center" width="10%">';
                echo '<img src="' . $uploadurl_field . $downloads_field[$i]->getVar('img') . '" alt="" title="" height="16">';
                echo '</td>';
                echo '<td align="center" width="10%">' . $downloads_field[$i]->getVar('weight') . '</td>';
                
                echo '<td align="center" width="10%"><a href="field.php?op=update_status&fid=' . $downloadsfield_fid . '&aff=' . ($downloads_field[$i]->getVar('status') == 1 ? '0"><img src="../images/icon/on.gif"></a>' : '1"><img src="../images/icon/off.gif"></a>') . '</td>';
                echo '<td align="center" width="10%"><a href="field.php?op=update_search&fid=' . $downloadsfield_fid . '&aff=' . ($downloads_field[$i]->getVar('search') == 1 ? '0"><img src="../images/icon/on.gif"></a>' : '1"><img src="../images/icon/off.gif"></a>') . '</td>';
                echo '<td align="center" width="10%">';
                echo '<a href="field.php?op=edit_field&fid=' . $downloadsfield_fid . '"><img src="../images/icon/edit_mini.gif" alt="' . _AM_biblioteca_FORMEDIT . '" title="' . _AM_biblioteca_FORMEDIT . '"></a> ';
                if ($downloads_field[$i]->getVar('status_def') == 0){
                    echo '<a href="field.php?op=del_field&fid=' . $downloadsfield_fid . '"><img src="../images/icon/delete_mini.gif" alt="' . _AM_biblioteca_FORMDEL . '" title="' . _AM_biblioteca_FORMDEL . '"></a>';
                }
                echo '</td>';                    
                echo '</tr>';
                $class = ($class == 'even') ? 'odd' : 'even';
            }
			echo '</table>';
		}
	break;
    
    case "update_status":
        $obj =& $downloadsfield_Handler->get($_REQUEST['fid']);

        $obj->setVar('status', $_REQUEST["aff"]);
        if ($downloadsfield_Handler->insert($obj)) {
            redirect_header('field.php?op=list', 1, _AM_biblioteca_REDIRECT_SAVE);
        }
        echo $obj->getHtmlErrors();
    break;
    
    case "update_search":
        $obj =& $downloadsfield_Handler->get($_REQUEST['fid']);

        $obj->setVar('search', $_REQUEST["aff"]);
        if ($downloadsfield_Handler->insert($obj)) {
            redirect_header('field.php?op=list', 1, _AM_biblioteca_REDIRECT_SAVE);
        }
        echo $obj->getHtmlErrors();
    break;
    //
    
    // vue création
    case "new_field":
        //Affichage de la partie haute de l'administration de Xoops
        xoops_cp_header();
        //appel du menu admin
        if ( !is_readable(XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php"))	{
            biblioteca_adminmenu(6, _MI_biblioteca_ADMENU6);
        } else {
            include_once XOOPS_ROOT_PATH.'/Frameworks/art/functions.admin.php';
            loadModuleAdminMenu (6, _MI_biblioteca_ADMENU6);
        }
        // Sous-menu
        echo '<div class="head" align="center">';
        echo $op == 'new_field' ? _AM_biblioteca_FIELD_NEW : '<a href="field.php?op=new_field">' . _AM_biblioteca_FIELD_NEW . '</a>';
        echo ' | ';
        echo $op == 'list' ? _AM_biblioteca_FIELD_LIST : '<a href="field.php?op=list">' . _AM_biblioteca_FIELD_LIST . '</a>';
        echo '</div><br>';
        //Affichage du formulaire de création des champs
    	$obj =& $downloadsfield_Handler->create();
    	$form = $obj->getForm();
    	$form->display();
    break;
    
    // Pour éditer un champ
    case "edit_field":
        //Affichage de la partie haute de l'administration de Xoops
        xoops_cp_header();
        //appel du menu admin
        if ( !is_readable(XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php"))	{
            biblioteca_adminmenu(6, _MI_biblioteca_ADMENU6);
        } else {
            include_once XOOPS_ROOT_PATH.'/Frameworks/art/functions.admin.php';
            loadModuleAdminMenu (6, _MI_biblioteca_ADMENU6);
        }
        // Sous-menu
        echo '<div class="head" align="center">';
        echo $op == 'new_field' ? _AM_biblioteca_FIELD_NEW : '<a href="field.php?op=new_field">' . _AM_biblioteca_FIELD_NEW . '</a>';
        echo ' | ';
        echo $op == 'list' ? _AM_biblioteca_FIELD_LIST : '<a href="field.php?op=list">' . _AM_biblioteca_FIELD_LIST . '</a>';
        echo '</div><br>';
        //Affichage du formulaire de création des champs
        $obj = $downloadsfield_Handler->get($_REQUEST['fid']);
		$form = $obj->getForm();
		$form->display();
    break;
    
    // Pour supprimer un champ
    case "del_field":
        global $xoopsModule;
		$obj =& $downloadsfield_Handler->get($_REQUEST['fid']);
		if (isset($_REQUEST['ok']) && $_REQUEST['ok'] == 1) {
			if (!$GLOBALS['xoopsSecurity']->check()) {
				redirect_header('field.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
			}
            // supression des entrée du champ
            $criteria = new CriteriaCompo();
            $criteria->add(new Criteria('fid', $_REQUEST['fid']));
            $downloads_arr = $downloadsfielddata_Handler->getall( $criteria );
			foreach (array_keys($downloads_arr) as $i) {
                // supression de l'entrée
				$objdownloadsfielddata =& $downloadsfielddata_Handler->get($downloads_arr[$i]->getVar('iddata'));
                $downloadsfielddata_Handler->delete($objdownloadsfielddata) or $objdownloads->getHtmlErrors();
			}            
			if ($downloadsfield_Handler->delete($obj)) {				
				redirect_header('field.php', 1, _AM_biblioteca_REDIRECT_DELOK);
			} else {
				echo $obj->getHtmlErrors();
			}
		} else {
            $downloadsfield = $downloadsfield_Handler->get($_REQUEST['fid']);
            if ($downloadsfield->getVar('status_def') == 1){
                redirect_header('field.php', 2, _AM_biblioteca_REDIRECT_NODELFIELD);
            }
            $message = '';
            $criteria = new CriteriaCompo();
            $criteria->add(new Criteria('fid', $_REQUEST['fid']));
            $downloads_arr = $downloadsfielddata_Handler->getall($criteria);
            if (count($downloads_arr) > 0) {
                $message .= _AM_biblioteca_DELDATA .'<br>';
                foreach (array_keys($downloads_arr) as $i) {
                    $message .= '<span style="color : Red">' . $downloads_arr[$i]->getVar('data') . '</span><br>';
                }
            }
            //Affichage de la partie haute de l'administration de Xoops
            xoops_cp_header();
            //appel du menu admin
            if ( !is_readable(XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php"))	{
                biblioteca_adminmenu(6, _MI_biblioteca_ADMENU6);
            } else {
                include_once XOOPS_ROOT_PATH.'/Frameworks/art/functions.admin.php';
                loadModuleAdminMenu (6, _MI_biblioteca_ADMENU6);
            }
            // Sous-menu
            echo '<div class="head" align="center">';
            echo $op == 'new_field' ? _AM_biblioteca_FIELD_NEW : '<a href="field.php?op=new_field">' . _AM_biblioteca_FIELD_NEW . '</a>';
            echo ' | ';
            echo $op == 'list' ? _AM_biblioteca_FIELD_LIST : '<a href="field.php?op=list">' . _AM_biblioteca_FIELD_LIST . '</a>';
            echo '</div><br>';
			xoops_confirm(array('ok' => 1, 'fid' => $_REQUEST['fid'], 'op' => 'del_field'), $_SERVER['REQUEST_URI'], sprintf(_AM_biblioteca_FORMSUREDEL, $obj->getVar('title')) . '<br><br>' . $message);
		}

    break;
        
    // Pour sauver un champ
	case "save_field":
		if (!$GLOBALS['xoopsSecurity']->check()) {
           redirect_header('field.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if (isset($_REQUEST['fid'])) {
           $obj =& $downloadsfield_Handler->get($_REQUEST['fid']);
        } else {
           $obj =& $downloadsfield_Handler->create();
        }
        $erreur = false;
        $message_erreur = '';
        // Récupération des variables:
        // Pour l'image
	    include_once XOOPS_ROOT_PATH.'/class/uploader.php';	    
        $uploader = new XoopsMediaUploader($uploaddir_field, array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png'), $xoopsModuleConfig['maxuploadsize'], 16, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
			$uploader->setPrefix('downloads_') ;
			$uploader->fetchMedia($_POST['xoops_upload_file'][0]);
			if (!$uploader->upload()) {
				$errors = $uploader->getErrors();
				redirect_header("javascript:history.go(-1)",3, $errors);
			} else {
				$obj->setVar('img', $uploader->getSavedFileName());
			}
		} else {
			$obj->setVar('img', $_REQUEST['downloadsfield_img']);
        }
        // Pour les autres variables
        $obj->setVar('title', $_POST['title']);
        $obj->setVar('weight', $_POST["weight"]);
        $obj->setVar('status', $_POST["status"]);
        $obj->setVar('search', $_POST["search"]);
        $obj->setVar('status_def',  $_POST["status_def"]);
        
        if (intval($_REQUEST['weight'])==0 && $_REQUEST['weight'] != '0'){
            $erreur=true;
            $message_erreur = _AM_biblioteca_ERREUR_WEIGHT . '<br>';
        }
        if ($erreur==true){
            echo '<div class="errorMsg" style="text-align: left;">' . $message_erreur . '</div>';        
        }else{
            if ($downloadsfield_Handler->insert($obj)) {                
                redirect_header('field.php', 1, _AM_biblioteca_REDIRECT_SAVE);
            }
            echo $obj->getHtmlErrors();
        }       
        $form =& $obj->getForm();
        $form->display();
	break;
}
//Affichage de la partie basse de l'administration de Xoops
xoops_cp_footer();
?>
