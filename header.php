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

include '../../mainfile.php';
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . '/class/tree.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/include/functions.php';
//permission
$gperm_handler = xoops_getHandler('groupperm');
$groups        = XOOPS_GROUP_ANONYMOUS;
if (is_object($xoopsUser)) {
    $groups = $xoopsUser->getGroups();
}
xoops_loadLanguage('admin', $xoopsModule->getVar('dirname', 'e'));

$perm_submit      = $gperm_handler->checkRight('biblioteca_ac', 4, $groups, $xoopsModule->getVar('mid')) ? true : false;
$perm_modif       = $gperm_handler->checkRight('biblioteca_ac', 8, $groups, $xoopsModule->getVar('mid')) ? true : false;
$perm_vote        = $gperm_handler->checkRight('biblioteca_ac', 16, $groups, $xoopsModule->getVar('mid')) ? true : false;
$perm_upload      = $gperm_handler->checkRight('biblioteca_ac', 32, $groups, $xoopsModule->getVar('mid')) ? true : false;
$perm_autoapprove = $gperm_handler->checkRight('biblioteca_ac', 64, $groups, $xoopsModule->getVar('mid')) ? true : false;

//param�tres:
// pour les images des cat�gories:
$uploaddir = XOOPS_ROOT_PATH . '/uploads/biblioteca/images/cats/';
$uploadurl = XOOPS_URL . '/uploads/biblioteca/images/cats/';
// pour les fichiers
$uploaddir_downloads = XOOPS_ROOT_PATH . '/uploads/biblioteca/downloads/';
$uploadurl_downloads = XOOPS_URL . '/uploads/biblioteca/downloads/';
// pour les logos
$uploaddir_shots = XOOPS_ROOT_PATH . '/uploads/biblioteca/images/shots/';
$uploadurl_shots = XOOPS_URL . '/uploads/biblioteca/images/shots/';
// pour les images des champs:
$uploaddir_field = XOOPS_ROOT_PATH . '/uploads/biblioteca/images/field/';
$uploadurl_field = XOOPS_URL . '/uploads/biblioteca/images/field/';
/////////////

//appel des class
//$downloadscat_Handler          = xoops_getHandler('biblioteca_cat', 'biblioteca');
//$downloads_Handler             = xoops_getHandler('downloads', 'biblioteca');
//$downloadsvotedata_Handler     = xoops_getHandler('biblioteca_votedata', 'biblioteca');
//$downloadsmod_Handler          = xoops_getHandler('biblioteca_mod', 'biblioteca');
//$downloadsbroken_Handler       = xoops_getHandler('biblioteca_broken', 'biblioteca');
//$downloadsfield_Handler        = xoops_getHandler('biblioteca_field', 'biblioteca');
//$downloadsfielddata_Handler    = xoops_getHandler('biblioteca_fielddata', 'biblioteca');
//$downloadsfieldmoddata_Handler = xoops_getHandler('biblioteca_modfielddata', 'biblioteca');
$downloadscat_Handler          = xoops_getModuleHandler('cat', 'biblioteca');
$downloads_Handler             = xoops_getModuleHandler('downloads', 'biblioteca');
$downloadsvotedata_Handler     = xoops_getModuleHandler('votedata', 'biblioteca');
$downloadsfield_Handler        = xoops_getModuleHandler('field', 'biblioteca');
$downloadsfielddata_Handler    = xoops_getModuleHandler('fielddata', 'biblioteca');
$downloadsbroken_Handler       = xoops_getModuleHandler('broken', 'biblioteca');
$downloadsmod_Handler          = xoops_getModuleHandler('mod', 'biblioteca');
$downloadsfieldmoddata_Handler = xoops_getModuleHandler('modfielddata', 'biblioteca');
