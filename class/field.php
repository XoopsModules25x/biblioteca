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
 * Class BibliotecaField
 */
class BibliotecaField extends XoopsObject
{
    // constructor
    /**
     * BibliotecaField constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initVar('fid', XOBJ_DTYPE_INT, null, false, 11);
        $this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('img', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('weight', XOBJ_DTYPE_INT, null, false, 11);
        $this->initVar('status', XOBJ_DTYPE_INT, null, false, 5);
        $this->initVar('search', XOBJ_DTYPE_INT, null, false, 5);
        $this->initVar('status_def', XOBJ_DTYPE_INT, null, false, 5);

        //pour les jointures
        $this->initVar('data', XOBJ_DTYPE_TXTAREA, null, false);
    }

    /**
     * @return mixed
     */
    public function get_new_enreg()
    {
        global $xoopsDB;
        $new_enreg = $xoopsDB->getInsertId();

        return $new_enreg;
    }

    /**
     * @param bool $action
     * @return XoopsThemeForm
     */
    public function getForm($action = false)
    {
        global $xoopsDB, $xoopsModule, $xoopsModuleConfig;
        if ($action === false) {
            $action = $_SERVER['REQUEST_URI'];
        }
        include_once(XOOPS_ROOT_PATH . '/class/xoopsformloader.php');

        //nom du formulaire selon l'action (editer ou ajouter):        
        $title = $this->isNew() ? sprintf(_AM_BIBLIOTECA_FORMADD) : sprintf(_AM_BIBLIOTECA_FORMEDIT);

        //cr�ation du formulaire
        $form = new XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        //titre
        if ($this->getVar('status_def') == 1) {
            $form->addElement(new xoopsFormLabel(_AM_BIBLIOTECA_FORMTITLE, $this->getVar('title')));
            $form->addElement(new XoopsFormHidden('title', $this->getVar('title')));
        } else {
            $form->addElement(new XoopsFormText(_AM_BIBLIOTECA_FORMTITLE, 'title', 50, 255, $this->getVar('title')), true);
        }
        //image
        $downloadsfield_img = $this->getVar('img') ?: 'blank.gif';
        $uploadirectory     = '/uploads/biblioteca/images/field';
        $imgtray            = new XoopsFormElementTray(_AM_BIBLIOTECA_FORMIMAGE, '<br>');
        $imgpath            = sprintf(_AM_BIBLIOTECA_FORMPATH, $uploadirectory);
        $imageselect        = new XoopsFormSelect($imgpath, 'downloadsfield_img', $downloadsfield_img);
        $topics_array       = XoopsLists:: getImgListAsArray(XOOPS_ROOT_PATH . $uploadirectory);
        foreach ($topics_array as $image) {
            $imageselect->addOption("$image", $image);
        }
        $imageselect->setExtra("onchange='showImgSelected(\"image3\", \"downloadsfield_img\", \"" . $uploadirectory . "\", \"\", \"" . XOOPS_URL . "\")'");
        $imgtray->addElement($imageselect, false);
        $imgtray->addElement(new XoopsFormLabel('', "<br><img src='" . XOOPS_URL . '/' . $uploadirectory . '/' . $downloadsfield_img . "' name='image3' id='image3' alt='' /><br>"));
        $fileseltray = new XoopsFormElementTray('', '<br>');
        $fileseltray->addElement(new XoopsFormFile(_AM_BIBLIOTECA_FORMUPLOAD, 'attachedfile', $xoopsModuleConfig['maxuploadsize']), false);
        $fileseltray->addElement(new XoopsFormLabel(''), false);
        $imgtray->addElement($fileseltray);
        $form->addElement($imgtray);
        //poids du champ
        $form->addElement(new XoopsFormText(_AM_BIBLIOTECA_FORMWEIGHT, 'weight', 5, 5, $this->getVar('weight', 'e')), true);
        // affich�?
        $status = $this->getVar('status') ?: 0;
        $form->addElement(new XoopsFormRadioYN(_AM_BIBLIOTECA_FORMAFFICHE, 'status', $status));
        // affich� dans le champ de recherche?
        $search = $this->getVar('search') ?: 0;
        $form->addElement(new XoopsFormRadioYN(_AM_BIBLIOTECA_FORMAFFICHESEARCH, 'search', $search));
        // pour passer "fid" si on modifie le champ
        if (!$this->isNew()) {
            $form->addElement(new XoopsFormHidden('fid', $this->getVar('fid')));
            $form->addElement(new XoopsFormHidden('status_def', $this->getVar('status_def')));
        } else {
            $form->addElement(new XoopsFormHidden('status_def', 0));
        }
        //pour enregistrer le formulaire
        $form->addElement(new XoopsFormHidden('op', 'save_field'));
        //boutton d'envoi du formulaire
        $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));

        return $form;
    }
}

/**
 * Class BibliotecaFieldHandler
 */
class BibliotecaFieldHandler extends XoopsPersistableObjectHandler
{
    /**
     * bibliotecabiblioteca_fieldHandler constructor.
     * @param null|XoopsDatabase $db
     */
    public function __construct(&$db)
    {
        parent::__construct($db, 'biblioteca_field', 'BibliotecaField', 'fid', 'title');
    }
}
