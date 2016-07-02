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
class biblioteca_cat extends XoopsObject
{
// constructor
	function __construct()
	{
		$this->XoopsObject();
		$this->initVar("cat_cid",XOBJ_DTYPE_INT,null,false,5);
		$this->initVar("cat_pid",XOBJ_DTYPE_INT,null,false,5);
		$this->initVar("cat_title",XOBJ_DTYPE_TXTBOX, null, false);
		$this->initVar("cat_imgurl",XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar("cat_description_main",XOBJ_DTYPE_TXTAREA, null, false);
		// Pour autoriser le html
		$this->initVar('dohtml', XOBJ_DTYPE_INT, 1, false);
        $this->initVar("cat_weight",XOBJ_DTYPE_INT,null,false,11);
	}
	function biblioteca_cat()
    {
        $this->__construct();
    }
    function get_new_enreg()
    {
        global $xoopsDB;
        $new_enreg = $xoopsDB->getInsertId();
        return $new_enreg;
    }
    function getForm($action = false)
    {
		global $xoopsDB, $xoopsModule, $xoopsModuleConfig;
		if ($action === false) {
			$action = $_SERVER['REQUEST_URI'];
		}
        include_once(XOOPS_ROOT_PATH."/class/xoopsformloader.php");
        
        //nom du formulaire selon l'action (editer ou ajouter):        
        $title = $this->isNew() ? sprintf(_AM_biblioteca_FORMADD) : sprintf(_AM_biblioteca_FORMEDIT);
        
        //création du formulaire
        $form = new XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        //titre
        $form->addElement(new XoopsFormText(_AM_biblioteca_FORMTITLE, 'cat_title', 50, 255, $this->getVar('cat_title')), true);
        //editeur
        $editor_configs=array();
    	$editor_configs["name"] ="cat_description_main";
    	$editor_configs["value"] = $this->getVar('cat_description_main', 'e');
    	$editor_configs["rows"] = 20;
    	$editor_configs["cols"] = 160;
    	$editor_configs["width"] = "100%";
    	$editor_configs["height"] = "400px";
    	$editor_configs["editor"] = $xoopsModuleConfig['editor'];
		$form->addElement( new XoopsFormEditor(_AM_biblioteca_FORMTEXT, "cat_description_main", $editor_configs), false);
        //image
        $downloadscat_img = $this->getVar('cat_imgurl') ? $this->getVar('cat_imgurl') : 'blank.gif';
		$uploadirectory='/uploads/biblioteca/images/cats';
		$imgtray = new XoopsFormElementTray(_AM_biblioteca_FORMIMG,'<br />');
		$imgpath=sprintf(_AM_biblioteca_FORMPATH, $uploadirectory );
		$imageselect= new XoopsFormSelect($imgpath, 'downloadscat_img',$downloadscat_img);        
   		$topics_array = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . $uploadirectory );
    	foreach( $topics_array as $image ) {
   	    	$imageselect->addOption("$image", $image);
    	}
		$imageselect->setExtra( "onchange='showImgSelected(\"image3\", \"downloadscat_img\", \"" . $uploadirectory . "\", \"\", \"" . XOOPS_URL . "\")'" );
    	$imgtray->addElement($imageselect,false);
    	$imgtray -> addElement( new XoopsFormLabel( '', "<br /><img src='" . XOOPS_URL . "/" . $uploadirectory . "/" . $downloadscat_img . "' name='image3' id='image3' alt='' />" ) );
    	$fileseltray= new XoopsFormElementTray('','<br />');
    	$fileseltray->addElement(new XoopsFormFile(_AM_biblioteca_FORMUPLOAD , 'attachedfile', $xoopsModuleConfig['maxuploadsize']), false);
    	$fileseltray->addElement(new XoopsFormLabel('' ), false);
    	$imgtray->addElement($fileseltray);
    	$form->addElement($imgtray);
        // Pour faire une sous-catégorie
        $downloadscat_Handler =& xoops_getModuleHandler('biblioteca_cat', 'biblioteca');
        $criteria = new CriteriaCompo();
        $criteria->setSort('cat_weight ASC, cat_title');
        $criteria->setOrder('ASC');
		$downloadscat_arr = $downloadscat_Handler->getall($criteria);     
		$mytree = new XoopsObjectTree($downloadscat_arr, 'cat_cid', 'cat_pid');
		$form->addElement(new XoopsFormLabel(_AM_biblioteca_FORMINCAT, $mytree->makeSelBox('cat_pid', 'cat_title','--',$this->getVar('cat_pid'),true)));
        //poids de la catégorie
        $form->addElement(new XoopsFormText(_AM_biblioteca_FORMWEIGHT, 'cat_weight', 5, 5, $this->getVar('cat_weight', 'e')), true);
        
        //permissions
        $member_handler = & xoops_gethandler('member');
        $group_list = &$member_handler->getGroupList();
        $gperm_handler = &xoops_gethandler('groupperm');
        $full_list = array_keys($group_list);
        global $xoopsModule;
        if(!$this->isNew()) {
            $groups_ids_view = $gperm_handler->getGroupIds('biblioteca_view', $this->getVar('cat_cid'), $xoopsModule->getVar('mid'));
            $groups_ids_submit = $gperm_handler->getGroupIds('biblioteca_submit', $this->getVar('cat_cid'), $xoopsModule->getVar('mid'));
            $groups_ids_download = $gperm_handler->getGroupIds('biblioteca_download', $this->getVar('cat_cid'), $xoopsModule->getVar('mid'));
            $groups_ids_view = array_values($groups_ids_view);
            $groups_news_can_view_checkbox = new XoopsFormCheckBox(_AM_biblioteca_PERM_VIEW_DSC, 'groups_view[]', $groups_ids_view);
            $groups_ids_submit = array_values($groups_ids_submit);
            $groups_news_can_submit_checkbox = new XoopsFormCheckBox(_AM_biblioteca_PERM_SUBMIT_DSC, 'groups_submit[]', $groups_ids_submit);
            $groups_ids_download = array_values($groups_ids_download);
            $groups_news_can_download_checkbox = new XoopsFormCheckBox(_AM_biblioteca_PERM_DOWNLOAD_DSC, 'groups_download[]', $groups_ids_download);
        } else {
            $groups_news_can_view_checkbox = new XoopsFormCheckBox(_AM_biblioteca_PERM_VIEW_DSC, 'groups_view[]', $full_list);
            $groups_news_can_submit_checkbox = new XoopsFormCheckBox(_AM_biblioteca_PERM_SUBMIT_DSC, 'groups_submit[]', $full_list);
            $groups_news_can_download_checkbox = new XoopsFormCheckBox(_AM_biblioteca_PERM_DOWNLOAD_DSC, 'groups_download[]', $full_list);
        }
        // pour voir
        $groups_news_can_view_checkbox->addOptionArray($group_list);
        $form->addElement($groups_news_can_view_checkbox);
        // pour editer
        $groups_news_can_submit_checkbox->addOptionArray($group_list);
        $form->addElement($groups_news_can_submit_checkbox);
        // pour télécharger
        if ($xoopsModuleConfig['permission_download'] == 1) {
            $groups_news_can_download_checkbox->addOptionArray($group_list);
            $form->addElement($groups_news_can_download_checkbox);
        }
        
        // pour passer "cid" si on modifie la catégorie
        if (!$this->isNew()) {
        	$form->addElement(new XoopsFormHidden('cat_cid', $this->getVar('cat_cid')));
            $form->addElement(new XoopsFormHidden('categorie_modified', true));
        }        
        //pour enregistrer le formulaire
        $form->addElement(new XoopsFormHidden('op', 'save_cat'));
        //boutton d'envoi du formulaire
        $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));        
    	return $form;
    }
}

class bibliotecabiblioteca_catHandler extends XoopsPersistableObjectHandler 
{
	function __construct(&$db) 
	{
		parent::__construct($db, "biblioteca_cat", 'biblioteca_cat', 'cat_cid', 'cat_title');
    }
}
?>

