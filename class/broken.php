<?php
/**
 * ****************************************************************************
 *  - biblioteca By TDM   - TEAM DEV MODULE FOR XOOPS
 *  - GNU Licence Copyright (c)  (www.xoops.org)
 *
 * La licence GNU GPL, garanti � l'utilisateur les droits suivants
 *
 * 1. La libert� d'ex�cuter le logiciel, pour n'importe quel usage,
 * 2. La libert� de l' �tudier et de l'adapter � ses besoins,
 * 3. La libert� de redistribuer des copies,
 * 4. La libert� d'am�liorer et de rendre publiques les modifications afin
 * que l'ensemble de la communaut� en b�n�ficie.
 *
 * @copyright     http://www.tdmxoops.net
 * @license       http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author        TDM (G.Mage); TEAM DEV MODULE
 *
 * ****************************************************************************
 */

if (!defined('XOOPS_ROOT_PATH')) {
    die('XOOPS root path not defined');
}

/**
 * Class BibliotecaBroken
 */
class BibliotecaBroken extends XoopsObject
{
    // constructor
    /**
     * BibliotecaBroken constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initVar('reportid', XOBJ_DTYPE_INT, null, false, 5);
        $this->initVar('lid', XOBJ_DTYPE_INT, null, false, 11);
        $this->initVar('sender', XOBJ_DTYPE_INT, null, false, 11);
        $this->initVar('ip', XOBJ_DTYPE_TXTBOX, null, false);
        //pour les jointures:
        $this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('cid', XOBJ_DTYPE_INT, null, false, 5);
    }

    /**
     * @param      $lid
     * @param bool $action
     * @return XoopsThemeForm
     */
    public function getForm($lid, $action = false)
    {
        global $xoopsDB, $xoopsModule, $xoopsModuleConfig;
        if ($action === false) {
            $action = $_SERVER['REQUEST_URI'];
        }

        $form = new XoopsThemeForm(_MD_BIBLIOTECA_BROKENFILE_REPORTBROKEN, 'brokenform', 'brokenfile.php', 'post');
        $form->setExtra('enctype="multipart/form-data"');
        $form->addElement(new XoopsFormCaptcha(), true);
        $form->addElement(new XoopsFormHidden('op', 'save'));
        $form->addElement(new XoopsFormHidden('lid', $lid));
        // Submit button		
        $button_tray = new XoopsFormElementTray(_MD_BIBLIOTECA_BROKENFILE_REPORTBROKEN, '', '');
        $button_tray->addElement(new XoopsFormButton('', 'post', _MD_BIBLIOTECA_BROKENFILE_REPORTBROKEN, 'submit'));
        $form->addElement($button_tray);

        return $form;
    }
}

/**
 * Class BibliotecaBrokenHandler
 */
class BibliotecaBrokenHandler extends XoopsPersistableObjectHandler
{
    /**
     * bibliotecabiblioteca_brokenHandler constructor.
     * @param null|XoopsDatabase $db
     */
    public function __construct(&$db)
    {
        parent::__construct($db, 'biblioteca_broken', 'BibliotecaBroken', 'reportid', 'lid');
    }
}
