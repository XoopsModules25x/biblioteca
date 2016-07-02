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

xoops_cp_header();
//appel du menu admin
if ( !is_readable(XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php"))	{
    biblioteca_adminmenu(8, _MI_biblioteca_ADMENU8);
} else {
    include_once XOOPS_ROOT_PATH.'/Frameworks/art/functions.admin.php';
    loadModuleAdminMenu (8, _MI_biblioteca_ADMENU8);
}
echo '<br /><br /><br />';
$permission = isset($_POST['permission']) ? intval($_POST['permission']) : 1;
$selected = array('','','','');
$selected[$permission - 1]= ' selected';

echo "<form method='post' name='fselperm' action='permissions.php'><table border='0'><tr><td><select name='permission' onChange='javascript: document.fselperm.submit()'><option value='1'".$selected[0].">"._AM_biblioteca_PERM_VIEW."</option><option value='2'".$selected[1].">"._AM_biblioteca_PERM_SUBMIT."</option><option value='3'".$selected[2].">"._AM_biblioteca_PERM_DOWNLOAD."</option><option value='4'".$selected[3].">"._AM_biblioteca_PERM_AUTRES."</option></select></td></tr><tr><td><input type='submit' name='go'></tr></table></form>";

$moduleId = $xoopsModule->getVar('mid');

switch($permission) {
	case 1:	// View permission
		$formTitle = _AM_biblioteca_PERM_VIEW;
		$permissionName = 'biblioteca_view';
		$permissionDescription = _AM_biblioteca_PERM_VIEW_DSC;
		break;
	case 2:	// Submit Permission
		$formTitle = _AM_biblioteca_PERM_SUBMIT;
		$permissionName = 'biblioteca_submit';
		$permissionDescription = _AM_biblioteca_PERM_SUBMIT_DSC;
		break;
    case 3:	// Download Permission
		$formTitle = _AM_biblioteca_PERM_DOWNLOAD;
        if ($xoopsModuleConfig['permission_download'] == 1) {
            $permissionDescription = _AM_biblioteca_PERM_DOWNLOAD_DSC;
            $permissionName = 'biblioteca_download';
        }else{
            $permissionDescription = _AM_biblioteca_PERM_DOWNLOAD_DSC2;
            $permissionName = 'biblioteca_download_item';
        }
		break;
    case 4:
        $formTitle = _AM_biblioteca_PERM_AUTRES;
        $permissionName = "biblioteca_ac";
        $permissionDescription = _AM_biblioteca_PERM_AUTRES_DSC;
        $global_perms_array = array(
        '4' => _AM_biblioteca_PERMISSIONS_4 ,
		'8' => _AM_biblioteca_PERMISSIONS_8 ,
		'16' => _AM_biblioteca_PERMISSIONS_16 ,
        '32' => _AM_biblioteca_PERMISSIONS_32 ,
		'64' => _AM_biblioteca_PERMISSIONS_64
		 );
		break;
}

$permissionsForm = new XoopsGroupPermForm($formTitle, $moduleId, $permissionName, $permissionDescription, 'admin/permissions.php');
if ($permission == 4){
    foreach( $global_perms_array as $perm_id => $permissionName ) {
		$permissionsForm->addItem($perm_id , $permissionName) ;
	}
}else{
    if ($xoopsModuleConfig['permission_download'] == 2 && $permission == 3) {
        $sql = "SELECT lid, cid, title FROM ".$xoopsDB->prefix("biblioteca_downloads")." ORDER BY title";
        $result = $xoopsDB->query($sql);
        if($result) {
            while ($row = $xoopsDB->fetchArray($result)) {
                $permissionsForm->addItem($row['lid'], $row['title']);
            }
        }
    }else{
        $sql = 'SELECT cat_cid, cat_pid, cat_title FROM '.$xoopsDB->prefix('biblioteca_cat').' ORDER BY cat_title';
        $result = $xoopsDB->query($sql);
        if($result) {
            while ($row = $xoopsDB->fetchArray($result)) {
                $permissionsForm->addItem($row['cat_cid'], $row['cat_title'], $row['cat_pid']);
            }
        }
    }
}
echo $permissionsForm->render();
echo "<br /><br /><br /><br />\n";
unset ($permissionsForm);

xoops_cp_footer();
?>
