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
 * Class BibliotecaDownloads
 */
class BibliotecaDownloads extends XoopsObject
{
    // constructor
    /**
     * BibliotecaDownloads constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->initVar('lid', XOBJ_DTYPE_INT, null, false, 11);
        $this->initVar('cid', XOBJ_DTYPE_INT, null, false, 5);
        $this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('url', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('homepage', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('version', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('size', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('platform', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('description', XOBJ_DTYPE_TXTAREA, null, false);
        // Pour autoriser le html
        $this->initVar('dohtml', XOBJ_DTYPE_INT, 1, false);
        $this->initVar('logourl', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('submitter', XOBJ_DTYPE_INT, null, false, 11);
        $this->initVar('status', XOBJ_DTYPE_INT, null, false, 2);
        $this->initVar('date', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('hits', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('rating', XOBJ_DTYPE_OTHER, null, false, 10);
        $this->initVar('votes', XOBJ_DTYPE_INT, null, false, 11);
        $this->initVar('comments', XOBJ_DTYPE_INT, null, false, 11);
        $this->initVar('top', XOBJ_DTYPE_INT, null, false, 2);
        $this->initVar('paypal', XOBJ_DTYPE_TXTBOX, null, false);

        //pour les jointures:
        $this->initVar('cat_title', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('cat_imgurl', XOBJ_DTYPE_TXTBOX, null, false);
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
     * @param array $donnee
     * @param bool  $erreur
     * @param bool  $action
     * @return XoopsThemeForm
     */
    public function getForm($donnee = array(), $erreur = false, $action = false)
    {
        global $xoopsDB, $xoopsModule, $xoopsModuleConfig, $xoopsUser;
        if ($action === false) {
            $action = $_SERVER['REQUEST_URI'];
        }
        //permission pour uploader
        $gperm_handler = xoops_getHandler('groupperm');
        $groups        = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
        if ($xoopsUser) {
            $perm_upload = true;
            if (!$xoopsUser->isAdmin($xoopsModule->mid())) {
                $perm_upload = $gperm_handler->checkRight('biblioteca_ac', 32, $groups, $xoopsModule->getVar('mid')) ? true : false;
            }
        } else {
            $perm_upload = $gperm_handler->checkRight('biblioteca_ac', 32, $groups, $xoopsModule->getVar('mid')) ? true : false;
        }
        //nom du formulaire selon l'action (editer ou ajouter):
        $title = $this->isNew() ? sprintf(_AM_BIBLIOTECA_FORMADD) : sprintf(_AM_BIBLIOTECA_FORMEDIT);

        //cr�ation du formulaire
        $form = new XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        //titre
        $form->addElement(new XoopsFormText(_AM_BIBLIOTECA_FORMTITLE, 'title', 50, 255, $this->getVar('title')), true);
        // fichier
        $fichier = new XoopsFormElementTray(_AM_BIBLIOTECA_FORMFILE, '<br><br>');
        $url     = $this->isNew() ? 'http://' : $this->getVar('url');
        $formurl = new XoopsFormText(_AM_BIBLIOTECA_FORMURL, 'url', 75, 255, $url);
        $fichier->addElement($formurl, false);
        if ($perm_upload == true) {
            $fichier->addElement(new XoopsFormFile(_AM_BIBLIOTECA_FORMUPLOAD, 'attachedfile', $xoopsModuleConfig['maxuploadsize']), false);
        }
        $form->addElement($fichier);

        //cat�gorie
        $downloadscat_Handler = xoops_getModuleHandler('cat', 'biblioteca');
        $categories           = biblioteca_MygetItemIds('biblioteca_submit', 'biblioteca');
        $criteria             = new CriteriaCompo();
        $criteria->setSort('cat_weight ASC, cat_title');
        $criteria->setOrder('ASC');
        if ($xoopsUser) {
            if (!$xoopsUser->isAdmin($xoopsModule->mid())) {
                $criteria->add(new Criteria('cat_cid', '(' . implode(',', $categories) . ')', 'IN'));
            }
        } else {
            $criteria->add(new Criteria('cat_cid', '(' . implode(',', $categories) . ')', 'IN'));
        }
        $downloadscat_arr = $downloadscat_Handler->getall($criteria);
        if (count($downloadscat_arr) == 0) {
            redirect_header('index.php', 2, _NOPERM);
        }
        $mytree = new XoopsObjectTree($downloadscat_arr, 'cat_cid', 'cat_pid');
        $form->addElement(new XoopsFormLabel(_AM_BIBLIOTECA_FORMINCAT, $mytree->makeSelBox('cid', 'cat_title', '--', $this->getVar('cid'), true)), true);

        //affichage des champs
        $downloadsfield_Handler = xoops_getModuleHandler('field', 'biblioteca');
        $criteria               = new CriteriaCompo();
        $criteria->setSort('weight ASC, title');
        $criteria->setOrder('ASC');
        $downloads_field = $downloadsfield_Handler->getall($criteria);
        foreach (array_keys($downloads_field) as $i) {
            if ($downloads_field[$i]->getVar('status_def') == 1) {
                if ($downloads_field[$i]->getVar('fid') == 1) {
                    //page d'accueil
                    if ($downloads_field[$i]->getVar('status') == 1) {
                        $form->addElement(new XoopsFormText(_AM_BIBLIOTECA_FORMHOMEPAGE, 'homepage', 50, 255, $this->getVar('homepage')));
                    } else {
                        $form->addElement(new XoopsFormHidden('homepage', ''));
                    }
                }
                if ($downloads_field[$i]->getVar('fid') == 2) {
                    //version
                    if ($downloads_field[$i]->getVar('status') == 1) {
                        $form->addElement(new XoopsFormText(_AM_BIBLIOTECA_FORMVERSION, 'version', 10, 255, $this->getVar('version')));
                    } else {
                        $form->addElement(new XoopsFormHidden('version', ''));
                    }
                }
                if ($downloads_field[$i]->getVar('fid') == 3) {
                    //taille du fichier
                    if ($downloads_field[$i]->getVar('status') == 1) {
                        //$form->addElement(new XoopsFormText(_AM_BIBLIOTECA_FORMSIZE, 'size', 10, 255, $this->getVar('size')));
                        if ($this->isNew()) {
                            $size_value = $this->getVar('size');
                            if ($erreur == false) {
                                $type_value = '[Ko]';
                            } else {
                                $type_value = $donnee['type_size'];
                            }
                        } else {
                            $size_value_arr = explode(' ', $this->getVar('size'));
                            $size_value     = $size_value_arr[0];
                            if ($erreur == false) {
                                $type_value = $size_value_arr[1];
                            } else {
                                $type_value = $donnee['type_size'];
                            }
                        }
                        $aff_size = new XoopsFormElementTray(_AM_BIBLIOTECA_FORMSIZE, '');
                        $aff_size->addElement(new XoopsFormText('', 'size', 10, 255, $size_value));
                        $type     = new XoopsFormSelect('', 'type_size', $type_value);
                        $type_arr = array('[o]' => '[o]', '[Ko]' => '[Ko]', '[Mo]' => '[Mo]', '[Go]' => '[Go]', '[To]' => '[To]');
                        $type->addOptionArray($type_arr);
                        $aff_size->addElement($type);
                        $form->addElement($aff_size);
                    } else {
                        $form->addElement(new XoopsFormHidden('size', ''));
                        $form->addElement(new XoopsFormHidden('type_size', ''));
                    }
                }
                if ($downloads_field[$i]->getVar('fid') == 4) {
                    //plateforme
                    if ($downloads_field[$i]->getVar('status') == 1) {
                        $platformselect = new XoopsFormSelect(_AM_BIBLIOTECA_FORMPLATFORM, 'platform', explode('|', $this->getVar('platform')), 5, true);
                        $platform_array = explode('|', $xoopsModuleConfig['plateform']);
                        foreach ($platform_array as $platform) {
                            $platformselect->addOption("$platform", $platform);
                        }
                        $form->addElement($platformselect, false);
                    } else {
                        $form->addElement(new XoopsFormHidden('platform', ''));
                    }
                }
            } else {
                $contenu                    = '';
                $contenu_iddata             = '';
                $nom_champ                  = 'champ' . $downloads_field[$i]->getVar('fid');
                $downloadsfielddata_Handler = xoops_getModuleHandler('fielddata', 'biblioteca');
                $criteria                   = new CriteriaCompo();
                $criteria->add(new Criteria('lid', $this->getVar('lid')));
                $criteria->add(new Criteria('fid', $downloads_field[$i]->getVar('fid')));
                $downloadsfielddata = $downloadsfielddata_Handler->getall($criteria);
                foreach (array_keys($downloadsfielddata) as $j) {
                    if ($erreur == true) {
                        $contenu = $donnee[$nom_champ];
                    } else {
                        if (!$this->isNew()) {
                            $contenu = $downloadsfielddata[$j]->getVar('data');
                        }
                    }
                    $contenu_iddata = $downloadsfielddata[$j]->getVar('iddata');
                }
                $iddata = 'iddata' . $downloads_field[$i]->getVar('fid');
                if (!$this->isNew()) {
                    $form->addElement(new XoopsFormHidden($iddata, $contenu_iddata));
                }
                if ($downloads_field[$i]->getVar('status') == 1) {
                    $form->addElement(new XoopsFormText($downloads_field[$i]->getVar('title'), $nom_champ, 50, 255, $contenu));
                } else {
                    $form->addElement(new XoopsFormHidden($nom_champ, ''));
                }
            }
        }
        //description
        $editor_configs           = array();
        $editor_configs['name']   = 'description';
        $editor_configs['value']  = $this->getVar('description', 'e');
        $editor_configs['rows']   = 20;
        $editor_configs['cols']   = 100;
        $editor_configs['width']  = '100%';
        $editor_configs['height'] = '400px';
        $editor_configs['editor'] = $xoopsModuleConfig['editor'];
        $form->addElement(new XoopsFormEditor(_AM_BIBLIOTECA_FORMTEXTDOWNLOADS, 'description', $editor_configs), true);
        //tag        
        if (is_dir('../../tag') || is_dir('../tag')) {
            $dir_tag_ok = true;
        } else {
            $dir_tag_ok = false;
        }
        if (($xoopsModuleConfig['usetag'] == 1) and $dir_tag_ok) {
            $tagId = $this->isNew() ? 0 : $this->getVar('lid');
            if ($erreur == true) {
                $tagId = $donnee['TAG'];
            }
            require_once XOOPS_ROOT_PATH . '/modules/tag/include/formtag.php';
            $form->addElement(new XoopsFormTag('tag', 60, 255, $tagId, 0));
        }

        //image
        if ($xoopsModuleConfig['useshots']) {
            $uploaddir        = XOOPS_ROOT_PATH . '/uploads/biblioteca/images/shots/' . $this->getVar('logourl');
            $downloadscat_img = $this->getVar('logourl') ?: 'blank.gif';
            if (!is_file($uploaddir)) {
                $downloadscat_img = 'blank.gif';
            }
            $uploadirectory = '/uploads/biblioteca/images/shots';
            $imgtray        = new XoopsFormElementTray(_AM_BIBLIOTECA_FORMIMG, '<br>');
            $imgpath        = sprintf(_AM_BIBLIOTECA_FORMPATH, $uploadirectory);
            $imageselect    = new XoopsFormSelect($imgpath, 'logo_img', $downloadscat_img);
            $topics_array   = XoopsLists:: getImgListAsArray(XOOPS_ROOT_PATH . $uploadirectory);
            foreach ($topics_array as $image) {
                $imageselect->addOption("$image", $image);
            }
            $imageselect->setExtra("onchange='showImgSelected(\"image3\", \"logo_img\", \"" . $uploadirectory . "\", \"\", \"" . XOOPS_URL . "\")'");
            $imgtray->addElement($imageselect, false);
            $imgtray->addElement(new XoopsFormLabel('', "<br><img src='" . XOOPS_URL . '/' . $uploadirectory . '/' . $downloadscat_img . "' name='image3' id='image3' alt='' />"));
            $fileseltray = new XoopsFormElementTray('', '<br>');
            if ($perm_upload == true) {
                $fileseltray->addElement(new XoopsFormFile(_AM_BIBLIOTECA_FORMUPLOAD, 'attachedimage', $xoopsModuleConfig['maxuploadsize']), false);
            }
            $imgtray->addElement($fileseltray);
            $form->addElement($imgtray);
        }
        // pour changer de poster et pour ne pas mettre � jour la date:

        if ($xoopsUser) {
            if ($xoopsUser->isAdmin($xoopsModule->mid())) {
                // auteur
                if ($this->isNew()) {
                    $submitter             = !empty($xoopsUser) ? $xoopsUser->getVar('uid') : 0;
                    $donnee['date_update'] = 0;
                } else {
                    $submitter = $this->getVar('submitter');
                    $v_date    = $this->getVar('date');
                }
                if ($erreur == true) {
                    $date_update = $donnee['date_update'];
                    $v_status    = $donnee['status'];
                    $submitter   = $donnee['submitter'];
                } else {
                    $date_update = 'N';
                    $v_status    = 1;
                }
                $form->addElement(new XoopsFormSelectUser(_AM_BIBLIOTECA_FORMSUBMITTER, 'submitter', true, $submitter, 1, false), true);
                // date
                if (!$this->isNew()) {
                    $selection_date = new XoopsFormElementTray(_AM_BIBLIOTECA_FORMDATEUPDATE);
                    $date           = new XoopsFormRadio('', 'date_update', $date_update);
                    $options        = array('N' => _AM_BIBLIOTECA_FORMDATEUPDATE_NO . ' (' . formatTimestamp($v_date, 's') . ')', 'Y' => _AM_BIBLIOTECA_FORMDATEUPDATE_YES);
                    $date->addOptionArray($options);
                    $selection_date->addElement($date);
                    $selection_date->addElement(new XoopsFormTextDateSelect('', 'date', ''));
                    $form->addElement($selection_date);
                }
                $status = new XoopsFormCheckBox(_AM_BIBLIOTECA_FORMSTATUS, 'status', $v_status);
                $status->addOption(1, _AM_BIBLIOTECA_FORMSTATUS_OK);
                $form->addElement($status);
                //permissions pour t�l�charger
                if ($xoopsModuleConfig['permission_download'] == 1) {
                    $member_handler = xoops_getHandler('member');
                    $group_list     = $member_handler->getGroupList();
                    $gperm_handler  = xoops_getHandler('groupperm');
                    $full_list      = array_keys($group_list);
                    global $xoopsModule;
                    if (!$this->isNew()) {
                        $item_ids_download               = $gperm_handler->getGroupIds('biblioteca_download_item', $this->getVar('lid'), $xoopsModule->getVar('mid'));
                        $item_ids_downloa                = array_values($item_ids_download);
                        $item_news_can_download_checkbox = new XoopsFormCheckBox(_AM_BIBLIOTECA_PERM_DOWNLOAD_DSC, 'item_download[]', $item_ids_download);
                    } else {
                        $item_news_can_download_checkbox = new XoopsFormCheckBox(_AM_BIBLIOTECA_PERM_DOWNLOAD_DSC, 'item_download[]', $full_list);
                    }
                    $item_news_can_download_checkbox->addOptionArray($group_list);
                    $form->addElement($item_news_can_download_checkbox);
                }
            }
        }
        //paypal
        if ($xoopsModuleConfig['use_paypal'] == true) {
            $form->addElement(new XoopsFormText(_AM_BIBLIOTECA_FORMPAYPAL, 'paypal', 50, 255, $this->getVar('paypal')), false);
        } else {
            $form->addElement(new XoopsFormHidden('paypal', ''));
        }
        // captcha
        $form->addElement(new XoopsFormCaptcha(), true);
        // pour passer "lid" si on modifie la cat�gorie
        if (!$this->isNew()) {
            $form->addElement(new XoopsFormHidden('lid', $this->getVar('lid')));
            $form->addElement(new XoopsFormHidden('downloads_modified', true));
        }
        //pour enregistrer le formulaire
        $form->addElement(new XoopsFormHidden('op', 'save_downloads'));
        //bouton d'envoi du formulaire
        $form->addElement(new XoopsFormButton('', 'submit', _SUBMIT, 'submit'));

        return $form;
    }
}

/**
 * Class BibliotecaDownloadsHandler
 */
class BibliotecaDownloadsHandler extends XoopsPersistableObjectHandler
{
    /**
     * bibliotecabiblioteca_downloadsHandler constructor.
     * @param null|XoopsDatabase $db
     */
    public function __construct(&$db)
    {
        parent::__construct($db, 'biblioteca_downloads', 'BibliotecaDownloads', 'lid', 'title');
    }
}
