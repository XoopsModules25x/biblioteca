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

if (!defined('XOOPS_ROOT_PATH')) {
    die('XOOPS root path not defined');
}

/**
 * Class BibliotecaFielddata
 */
class BibliotecaFielddata extends XoopsObject
{
    // constructor
    /**
     * BibliotecaFielddata constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initVar('iddata', XOBJ_DTYPE_INT, null, false, 11);
        $this->initVar('fid', XOBJ_DTYPE_INT, null, false, 11);
        $this->initVar('lid', XOBJ_DTYPE_INT, null, false, 11);
        $this->initVar('data', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('dohtml', XOBJ_DTYPE_INT, 1, false);
    }

}

/**
 * Class BibliotecaFielddataHandler
 */
class BibliotecaFielddataHandler extends XoopsPersistableObjectHandler
{
    /**
     * bibliotecabiblioteca_fielddataHandler constructor.
     * @param null|XoopsDatabase $db
     */
    public function __construct(&$db)
    {
        parent::__construct($db, 'biblioteca_fielddata', 'BibliotecaFielddata', 'iddata', 'data');
    }
}
