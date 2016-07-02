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

if (!defined("XOOPS_ROOT_PATH")) {
    die("XOOPS root path not defined");
}
class biblioteca_modfielddata extends XoopsObject
{
// constructor
	function __construct()
	{
		$this->XoopsObject();
		$this->initVar("modiddata",XOBJ_DTYPE_INT,null,false,11);
        $this->initVar("fid",XOBJ_DTYPE_INT,null,false,11);
        $this->initVar("lid",XOBJ_DTYPE_INT,null,false,11);
		$this->initVar("moddata",XOBJ_DTYPE_TXTAREA, null, false);
        $this->initVar('dohtml', XOBJ_DTYPE_INT, 1, false);
	}
	function biblioteca_modfielddata()
    {
        $this->__construct();
    }
}

class bibliotecabiblioteca_modfielddataHandler extends XoopsPersistableObjectHandler 
{
	function __construct(&$db) 
	{
		parent::__construct($db, "biblioteca_modfielddata", 'biblioteca_modfielddata', 'modiddata', 'moddata');
    }
}
?>
