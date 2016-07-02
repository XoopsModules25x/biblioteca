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
function xoops_module_install_biblioteca() {
    global $xoopsModule, $xoopsConfig, $xoopsDB;

    $namemodule = "biblioteca";
    if( file_exists(XOOPS_ROOT_PATH."/modules/".$namemodule."/language/".$xoopsConfig['language']."/admin.php") ) {
        include_once(XOOPS_ROOT_PATH."/modules/".$namemodule."/language/".$xoopsConfig['language']."/admin.php");
    } else {
        include_once(XOOPS_ROOT_PATH."/modules/".$namemodule."/language/english/admin.php");
    }
    $downloadsfield_Handler =& xoops_getModuleHandler('biblioteca_field', 'biblioteca');
    $obj =& $downloadsfield_Handler->create();
    $obj->setVar('title', _AM_biblioteca_FORMHOMEPAGE);
    $obj->setVar('img', 'homepage.png');
    $obj->setVar('weight', 1);
    $obj->setVar('search', 0);
    $obj->setVar('status', 1);
    $obj->setVar('status_def', 1);
    $downloadsfield_Handler->insert($obj);
    $obj =& $downloadsfield_Handler->create();
    $obj->setVar('title', _AM_biblioteca_FORMVERSION);
    $obj->setVar('img', 'version.png');
    $obj->setVar('weight', 2);
    $obj->setVar('search', 0);
    $obj->setVar('status', 1);
    $obj->setVar('status_def', 1);
    $downloadsfield_Handler->insert($obj);
    $obj =& $downloadsfield_Handler->create();
    $obj->setVar('title', _AM_biblioteca_FORMSIZE);
    $obj->setVar('img', 'size.png');
    $obj->setVar('weight', 3);
    $obj->setVar('search', 0);
    $obj->setVar('status', 1);
    $obj->setVar('status_def', 1);
    $downloadsfield_Handler->insert($obj);
    $obj =& $downloadsfield_Handler->create();
    $obj->setVar('title', _AM_biblioteca_FORMPLATFORM);
    $obj->setVar('img', 'platform.png');
    $obj->setVar('weight', 4);
    $obj->setVar('search', 0);
    $obj->setVar('status', 1);
    $obj->setVar('status_def', 1);
    $downloadsfield_Handler->insert($obj);
    
    
	//Creation du fichier ".$namemodule."/
	$dir = XOOPS_ROOT_PATH."/uploads/".$namemodule."";
	if(!is_dir($dir))
		mkdir($dir, 0777);
		chmod($dir, 0777);
	
	//Creation du fichier ".$namemodule."/images/
	$dir = XOOPS_ROOT_PATH."/uploads/".$namemodule."/images";
	if(!is_dir($dir))
		mkdir($dir, 0777);
		chmod($dir, 0777);
	
	//Creation du fichier ".$namemodule."/images/cat
	$dir = XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/cats";
	if(!is_dir($dir))
		mkdir($dir, 0777);
		chmod($dir, 0777);
		
	//Creation du fichier ".$namemodule."/images/shots
	$dir = XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/shots";
	if(!is_dir($dir))
		mkdir($dir, 0777);
		chmod($dir, 0777);
    
    //Creation du fichier ".$namemodule."/images/field
	$dir = XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/field";
	if(!is_dir($dir))
		mkdir($dir, 0777);
		chmod($dir, 0777);
			
	//Creation du fichier ".$namemodule."/downloads
	$dir = XOOPS_ROOT_PATH."/uploads/".$namemodule."/downloads";
	if(!is_dir($dir))
		mkdir($dir, 0777);
		chmod($dir, 0777);
	
//Copie des index.html
	$indexFile = XOOPS_ROOT_PATH."/modules/".$namemodule."/include/index.html";
	copy($indexFile, XOOPS_ROOT_PATH."/uploads/".$namemodule."/index.html");
	copy($indexFile, XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/index.html");
	copy($indexFile, XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/cats/index.html");
	copy($indexFile, XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/shots/index.html");
    copy($indexFile, XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/field/index.html");
	copy($indexFile, XOOPS_ROOT_PATH."/uploads/".$namemodule."/downloads/index.html");

//Copie des blank.gif
	$blankFile = XOOPS_ROOT_PATH."/modules/".$namemodule."/images/blank.gif";
	copy($blankFile, XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/cats/blank.gif");
    copy($blankFile, XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/shots/blank.gif");
    copy($blankFile, XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/field/blank.gif");

//Copie des images pour les champs   
    copy(XOOPS_ROOT_PATH."/modules/".$namemodule."/images/icon/homepage.png", XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/field/homepage.png");
    copy(XOOPS_ROOT_PATH."/modules/".$namemodule."/images/icon/version.png", XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/field/version.png");
    copy(XOOPS_ROOT_PATH."/modules/".$namemodule."/images/icon/size.png", XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/field/size.png");
    copy(XOOPS_ROOT_PATH."/modules/".$namemodule."/images/icon/platform.png", XOOPS_ROOT_PATH."/uploads/".$namemodule."/images/field/platform.png");
    
    
    
	return true;
}
?>
