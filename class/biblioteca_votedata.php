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

class biblioteca_votedata extends XoopsObject
{
// constructor
	function __construct()
	{
		$this->XoopsObject();
		$this->initVar("ratingid",XOBJ_DTYPE_INT,null,false,11);
        $this->initVar("lid",XOBJ_DTYPE_INT,null,false,11);
        $this->initVar("ratinguser",XOBJ_DTYPE_INT,null,false,11);
        $this->initVar("rating",XOBJ_DTYPE_OTHER,null,false,3);
        $this->initVar("ratinghostname",XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar("ratingtimestamp",XOBJ_DTYPE_INT,null,false,10);
	}
	function biblioteca_votedata()
    {
        $this->__construct();
    }
    
    function getForm($lid, $action = false)
    {
		global $xoopsDB, $xoopsModule, $xoopsModuleConfig;
		if ($action === false) {
			$action = $_SERVER['REQUEST_URI'];
		}
        if (!$this->isNew()) {
            $rating = 11;
        }else{
            $rating = $this->getVar('rating');
        }
        $form = new XoopsThemeForm(_MD_biblioteca_SINGLEFILE_RATHFILE, 'rateform', 'ratefile.php', 'post');
        $form->setExtra('enctype="multipart/form-data"');
        $rating = new XoopsFormSelect(_MD_biblioteca_RATEFILE_VOTE, 'rating', $rating);
        $options = array('11' => '--', '10' => '10', '9' => '9','8' => '8','7' => '7','6' => '6','5' => '5','4' => '4','3' => '3','2' => '2','1' => '1','0' => '0');
        $rating->addOptionArray($options);
        $form->addElement($rating, true);
        $form->addElement(new XoopsFormCaptcha(), true);        
        $form->addElement(new XoopsFormHidden('op', 'save'));
        $form->addElement(new XoopsFormHidden('lid', $lid));
        // Submit button		
        $button_tray = new XoopsFormElementTray('' ,'');
        $button_tray->addElement(new XoopsFormButton('', 'post', _MD_biblioteca_RATEFILE_RATE, 'submit'));
        $form->addElement($button_tray);
    	return $form;
    }
}

class bibliotecabiblioteca_votedataHandler extends XoopsPersistableObjectHandler 
{
	function __construct(&$db) 
	{
		parent::__construct($db, "biblioteca_votedata", 'biblioteca_votedata', 'ratingid', 'lid');
    }
}
?>
