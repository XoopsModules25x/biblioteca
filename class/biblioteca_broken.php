<?php
/**
 * ****************************************************************************
 *  - biblioteca By TDM   - TEAM DEV MODULE FOR XOOPS
 *  - GNU Licence Copyright (c)  (www.xoops.org)
 *
 * La licence GNU GPL, garanti à l'utilisateur les droits suivants
 *
 * 1. La liberté d'exécuter le logiciel, pour n'importe quel usage,
 * 2. La liberté de l' étudier et de l'adapter à ses besoins,
 * 3. La liberté de redistribuer des copies,
 * 4. La liberté d'améliorer et de rendre publiques les modifications afin
 * que l'ensemble de la communauté en bénéficie.
 *
 * @copyright   http://www.tdmxoops.net
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author		TDM (G.Mage); TEAM DEV MODULE
 *
 * ****************************************************************************
 */
 
if (!defined("XOOPS_ROOT_PATH")) {
    die("XOOPS root path not defined");
}

class biblioteca_broken extends XoopsObject
{
// constructor
	function __construct()
	{
		$this->XoopsObject();
        $this->initVar("reportid",XOBJ_DTYPE_INT,null,false,5);
		$this->initVar("lid",XOBJ_DTYPE_INT,null,false,11);
        $this->initVar("sender",XOBJ_DTYPE_INT,null,false,11);
		$this->initVar("ip",XOBJ_DTYPE_TXTBOX,null,false);
        //pour les jointures:
        $this->initVar("title",XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar("cid",XOBJ_DTYPE_INT,null,false,5);
    }
	function biblioteca_broken()
    {
        $this->__construct();
    }
    function getForm($lid, $action = false)
    {
		global $xoopsDB, $xoopsModule, $xoopsModuleConfig;
		if ($action === false) {
			$action = $_SERVER['REQUEST_URI'];
		}
        
        $form = new XoopsThemeForm(_MD_biblioteca_BROKENFILE_REPORTBROKEN, 'brokenform', 'brokenfile.php', 'post');
        $form->setExtra('enctype="multipart/form-data"');
        $form->addElement(new XoopsFormCaptcha(), true);        
        $form->addElement(new XoopsFormHidden('op', 'save'));
        $form->addElement(new XoopsFormHidden('lid', $lid));
        // Submit button		
        $button_tray = new XoopsFormElementTray(_MD_biblioteca_BROKENFILE_REPORTBROKEN, '' ,'');
        $button_tray->addElement(new XoopsFormButton('', 'post', _MD_biblioteca_BROKENFILE_REPORTBROKEN, 'submit'));
        $form->addElement($button_tray);
    	return $form;
    }
}

class bibliotecabiblioteca_brokenHandler extends XoopsPersistableObjectHandler 
{
	function __construct(&$db) 
	{
		parent::__construct($db, "biblioteca_broken", 'biblioteca_broken', 'reportid', 'lid');
    }
}
?>
