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
 * @copyright     http://www.jequiehost.com
 * @license       http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author        Leandro Angelo; TEAM DEV MODULE
 *
 * ****************************************************************************
 */

if (!defined('XOOPS_ROOT_PATH')) {
    die('XOOPS root path not defined');
}

$modversion['name']             = _MI_BIBLIOTECA_NAME;
$modversion['version']          = '1.0';
$modversion['description']      = _MI_BIBLIOTECA_DESC;
$modversion['credits']          = 'Jequié Host';
$modversion['author']           = 'Leandro Angelo';
$modversion['help']             = 'biblioteca.html';
$modversion['license']          = 'GPL see LICENSE';
$modversion['official']         = 1;
$modversion['image']            = 'images/logo.png';
$modversion['dirname']          = 'biblioteca';
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['onInstall']        = 'include/install.php';
$modversion['onUpdate']         = 'include/update.php';

//informations compémentaires
$modversion['release']           = '17-04-2011';
$modversion['module_status']     = 'Stable';
$modversion['support_site_url']  = 'http://www.jequiehost.com';
$modversion['support_site_name'] = 'www.jequiehost.com';

// Tables crée depuis le fichier sql
$modversion['tables'][0] = 'biblioteca_broken';
$modversion['tables'][1] = 'biblioteca_cat';
$modversion['tables'][2] = 'biblioteca_downloads';
$modversion['tables'][3] = 'biblioteca_mod';
$modversion['tables'][4] = 'biblioteca_votedata';
$modversion['tables'][5] = 'biblioteca_field';
$modversion['tables'][6] = 'biblioteca_fielddata';
$modversion['tables'][7] = 'biblioteca_modfielddata';

// Pour avoir une administration
$modversion['hasAdmin']    = 1;
$modversion['system_menu'] = 1;
$modversion['adminindex']  = 'admin/index.php';
$modversion['adminmenu']   = 'admin/menu.php';

// Pour les blocs
$modversion['blocks'][1]['file']        = 'biblioteca_top.php';
$modversion['blocks'][1]['name']        = _MI_BIBLIOTECA_BNAME1;
$modversion['blocks'][1]['description'] = _MI_BIBLIOTECA_BNAMEDSC1;
$modversion['blocks'][1]['show_func']   = 'b_BIBLIOTECA_top_show';
$modversion['blocks'][1]['edit_func']   = 'b_BIBLIOTECA_top_edit';
$modversion['blocks'][1]['options']     = 'date|10|19|0';
$modversion['blocks'][1]['template']    = 'biblioteca_block_new.html';

$modversion['blocks'][2]['file']        = 'biblioteca_top.php';
$modversion['blocks'][2]['name']        = _MI_BIBLIOTECA_BNAME2;
$modversion['blocks'][2]['description'] = _MI_BIBLIOTECA_BNAMEDSC2;
$modversion['blocks'][2]['show_func']   = 'b_BIBLIOTECA_top_show';
$modversion['blocks'][2]['edit_func']   = 'b_BIBLIOTECA_top_edit';
$modversion['blocks'][2]['options']     = 'hits|10|19|0';
$modversion['blocks'][2]['template']    = 'biblioteca_block_top.html';

$modversion['blocks'][3]['file']        = 'biblioteca_top.php';
$modversion['blocks'][3]['name']        = _MI_BIBLIOTECA_BNAME3;
$modversion['blocks'][3]['description'] = _MI_BIBLIOTECA_BNAMEDSC3;
$modversion['blocks'][3]['show_func']   = 'b_BIBLIOTECA_top_show';
$modversion['blocks'][3]['edit_func']   = 'b_BIBLIOTECA_top_edit';
$modversion['blocks'][3]['options']     = 'rating|10|19|0';
$modversion['blocks'][3]['template']    = 'biblioteca_block_rating.html';

$modversion['blocks'][4]['file']        = 'biblioteca_top.php';
$modversion['blocks'][4]['name']        = _MI_BIBLIOTECA_BNAME4;
$modversion['blocks'][4]['description'] = _MI_BIBLIOTECA_BNAMEDSC4;
$modversion['blocks'][4]['show_func']   = 'b_BIBLIOTECA_top_show';
$modversion['blocks'][4]['edit_func']   = 'b_BIBLIOTECA_top_edit';
$modversion['blocks'][4]['options']     = 'random|10|19|0';
$modversion['blocks'][4]['template']    = 'biblioteca_block_random.html';

// Menu
$modversion['hasMain']        = 1;
$modversion['sub'][1]['name'] = _MI_BIBLIOTECA_SMNAME1;
$modversion['sub'][1]['url']  = 'submit.php';
$modversion['sub'][2]['name'] = _MI_BIBLIOTECA_SMNAME2;
$modversion['sub'][2]['url']  = 'search.php';

// Recherche
$modversion['hasSearch']      = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'biblioteca_search';

// Commentaires
$modversion['hasComments']                     = 1;
$modversion['comments']['itemName']            = 'lid';
$modversion['comments']['pageName']            = 'singlefile.php';
$modversion['comments']['extraParams']         = array('cid');
$modversion['comments']['callbackFile']        = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'biblioteca_com_approve';
$modversion['comments']['callback']['update']  = 'biblioteca_com_update';

// Templates
$modversion['templates'][1]['file']        = 'biblioteca_brokenfile.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file']        = 'biblioteca_download.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file']        = 'biblioteca_index.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file']        = 'biblioteca_modfile.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file']        = 'biblioteca_ratefile.html';
$modversion['templates'][5]['description'] = '';
$modversion['templates'][6]['file']        = 'biblioteca_singlefile.html';
$modversion['templates'][6]['description'] = '';
$modversion['templates'][7]['file']        = 'biblioteca_submit.html';
$modversion['templates'][7]['description'] = '';
$modversion['templates'][8]['file']        = 'biblioteca_viewcat.html';
$modversion['templates'][8]['description'] = '';
$modversion['templates'][9]['file']        = 'biblioteca_liste.html';
$modversion['templates'][9]['description'] = '';

// Préférences
$i                                       = 1;
$modversion['config'][$i]['name']        = 'popular';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_POPULAR';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_POPULARDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 100;
$i++;
$modversion['config'][$i]['name']        = 'nbsouscat';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_SUBCATPARENT';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_SUBCATPARENTDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 5;
$i++;
$modversion['config'][$i]['name']        = 'bldate';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_BLDATE';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_BLDATEDSC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 1;
$i++;
$modversion['config'][$i]['name']        = 'blpop';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_BLPOP';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_BLPOPDSC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 1;
$i++;
$modversion['config'][$i]['name']        = 'blrating';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_BLRATING';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_BLRATINGDSC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 1;
$i++;
$modversion['config'][$i]['name']        = 'nbbl';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_NBBL';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_NBBLDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 5;
$i++;
$modversion['config'][$i]['name']        = 'longbl';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_LONGBL';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_LONGBLDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 20;
$i++;
$modversion['config'][$i]['name']        = 'usetellafriend';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_USETELLAFRIEND';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_USETELLAFRIENDDSC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 0;
$i++;
$modversion['config'][$i]['name']        = 'usetag';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_USETAG';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_USETAGDSC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 0;
$i++;
$modversion['config'][$i]['name']        = 'useshots';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_USESHOTS';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_USESHOTSDSC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 1;
$i++;
$modversion['config'][$i]['name']        = 'shotwidth';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_SHOTWIDTH';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_SHOTWIDTHDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 90;
$i++;
$modversion['config'][$i]['name']        = 'check_host';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_CHECKHOST';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_CHECKHOSTDSC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 0;
$i++;
$xoops_url                               = parse_url(XOOPS_URL);
$modversion['config'][$i]['name']        = 'referers';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_REFERERS';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_REFERERSDSC';
$modversion['config'][$i]['formtype']    = 'textarea';
$modversion['config'][$i]['valuetype']   = 'array';
$modversion['config'][$i]['default']     = array($xoops_url['host']);
$i++;
$modversion['config'][$i]['name']        = 'mimetype';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_MIMETYPE';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_MIMETYPE_DSC';
$modversion['config'][$i]['formtype']    = 'textarea';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     =
    'image/gif|image/jpeg|image/pjpeg|image/x-png|image/png|application/x-zip-compressed|application/zip|application/rar|application/pdf|application/x-gtar|application/x-tar|application/msword|application/vnd.ms-excel|application/vnd.oasis.opendocument.text|application/vnd.oasis.opendocument.spreadsheet|application/vnd.oasis.opendocument.presentation|application/vnd.oasis.opendocument.graphics|application/vnd.oasis.opendocument.chart|application/vnd.oasis.opendocument.formula|application/vnd.oasis.opendocument.database|application/vnd.oasis.opendocument.image|application/vnd.oasis.opendocument.text-master';
$i++;
$modversion['config'][$i]['name']        = 'plateform';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_PLATEFORM';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_PLATEFORM_DSC';
$modversion['config'][$i]['formtype']    = 'textarea';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'None|Xoops 2.0.x|Xoops 2.2.x|Xoops 2.3.x|Xoops 2.4.x|Other';
$i++;
$modversion['config'][$i]['name']        = 'maxuploadsize';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_MAXUPLOAD_SIZE';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_MAXUPLOAD_SIZEDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 1048576;
$i++;
include_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
$modversion['config'][$i]['name']        = 'editor';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_FORM_OPTIONS';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_FORM_OPTIONSDSC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'dhtmltextarea';
$modversion['config'][$i]['options']     = XoopsLists::getDirListAsArray(XOOPS_ROOT_PATH . '/class/xoopseditor');
$modversion['config'][$i]['category']    = 'global';
$i++;
$modversion['config'][$i]['name']        = 'toporder';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_TOPORDER';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_TOPORDERDSC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 1;
$modversion['config'][$i]['options']     =
    array('_MI_BIBLIOTECA_TOPORDER1' => 1, '_MI_BIBLIOTECA_TOPORDER2' => 2, '_MI_BIBLIOTECA_TOPORDER3' => 3, '_MI_BIBLIOTECA_TOPORDER4' => 4, '_MI_BIBLIOTECA_TOPORDER5' => 5, '_MI_BIBLIOTECA_TOPORDER6' => 6, '_MI_BIBLIOTECA_TOPORDER7' => 7, '_MI_BIBLIOTECA_TOPORDER8' => 8);
$i++;
$modversion['config'][$i]['name']        = 'newdownloads';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_NEWDLS';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_NEWDLSDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 10;
$i++;
$modversion['config'][$i]['name']        = 'searchorder';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_SEARCHORDER';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_SEARCHORDERDSC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 8;
$modversion['config'][$i]['options']     =
    array('_MI_BIBLIOTECA_TOPORDER1' => 1, '_MI_BIBLIOTECA_TOPORDER2' => 2, '_MI_BIBLIOTECA_TOPORDER3' => 3, '_MI_BIBLIOTECA_TOPORDER4' => 4, '_MI_BIBLIOTECA_TOPORDER5' => 5, '_MI_BIBLIOTECA_TOPORDER6' => 6, '_MI_BIBLIOTECA_TOPORDER7' => 7, '_MI_BIBLIOTECA_TOPORDER8' => 8);
$i++;
$modversion['config'][$i]['name']        = 'perpageliste';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_PERPAGELISTE';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_PERPAGELISTEDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 15;
$i++;
$modversion['config'][$i]['name']        = 'perpage';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_PERPAGE';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_PERPAGEDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 10;
$i++;
$modversion['config'][$i]['name']        = 'perpageadmin';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_PERPAGEADMIN';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_PERPAGEADMINDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 15;
$i++;
$modversion['config'][$i]['name']        = 'newnamedownload';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_DOWNLOAD_NAME';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_DOWNLOAD_NAMEDSC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 1;
$i++;
$modversion['config'][$i]['name']        = 'prefixdownloads';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_DOWNLOAD_PREFIX';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_DOWNLOAD_PREFIXDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'downloads_';
$i++;
$modversion['config'][$i]['name']        = 'autosummary';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_AUTO_SUMMARY';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_AUTO_SUMMARYDSC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 0;
$i++;
$modversion['config'][$i]['name']        = 'showupdated';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_SHOW_UPDATED';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_SHOW_UPDATEDDSC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 1;
$i++;
$modversion['config'][$i]['name']        = 'permission_download';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_PERMISSIONDOWNLOAD';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_PERMISSIONDOWNLOADDSC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 1;
$modversion['config'][$i]['options']     = array('_MI_BIBLIOTECA_PERMISSIONDOWNLOAD1' => 1, '_MI_BIBLIOTECA_PERMISSIONDOWNLOAD2' => 2);
$i++;
$modversion['config'][$i]['name']        = 'use_paypal';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_USEPAYPAL';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_USEPAYPALDSC';
$modversion['config'][$i]['formtype']    = 'yesno';
$modversion['config'][$i]['valuetype']   = 'int';
$modversion['config'][$i]['default']     = 0;
$i++;
$modversion['config'][$i]['name']        = 'currency_paypal';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_CURRENCYPAYPAL';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_CURRENCYPAYPALDSC';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'EUR';
$modversion['config'][$i]['options']     = array(
    'AUD' => 'AUD',
    'BRL' => 'BRL',
    'CAD' => 'CAD',
    'CHF' => 'CHF',
    'CZK' => 'CZK',
    'DKK' => 'DKK',
    'EUR' => 'EUR',
    'GBP' => 'GBP',
    'HKD' => 'HKD',
    'HUF' => 'HUF',
    'ILS' => 'ILS',
    'JPY' => 'JPY',
    'MXN' => 'MXN',
    'NOK' => 'NOK',
    'NZD' => 'NZD',
    'PHP' => 'PHP',
    'PLN' => 'PLN',
    'SEK' => 'SEK',
    'SGD' => 'SGD',
    'THB' => 'THB',
    'TWD' => 'TWD',
    'USD' => 'USD'
);
$i++;
$modversion['config'][$i]['name']        = 'image_paypal';
$modversion['config'][$i]['title']       = '_MI_BIBLIOTECA_IMAGEPAYPAL';
$modversion['config'][$i]['description'] = '_MI_BIBLIOTECA_IMAGEPAYPALDSC';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['default']     = 'https://www.paypal.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif';

// Notifications
$modversion['hasNotification']             = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'biblioteca_notify_iteminfo';

$modversion['notification']['category'][1]['name']           = 'global';
$modversion['notification']['category'][1]['title']          = _MI_BIBLIOTECA_GLOBAL_NOTIFY;
$modversion['notification']['category'][1]['description']    = _MI_BIBLIOTECA_GLOBAL_NOTIFYDSC;
$modversion['notification']['category'][1]['subscribe_from'] = array('index.php', 'viewcat.php', 'singlefile.php');

$modversion['notification']['category'][2]['name']           = 'category';
$modversion['notification']['category'][2]['title']          = _MI_BIBLIOTECA_CATEGORY_NOTIFY;
$modversion['notification']['category'][2]['description']    = _MI_BIBLIOTECA_CATEGORY_NOTIFYDSC;
$modversion['notification']['category'][2]['subscribe_from'] = array('viewcat.php', 'singlefile.php');
$modversion['notification']['category'][2]['item_name']      = 'cid';
$modversion['notification']['category'][2]['allow_bookmark'] = 1;

$modversion['notification']['category'][3]['name']           = 'file';
$modversion['notification']['category'][3]['title']          = _MI_BIBLIOTECA_FILE_NOTIFY;
$modversion['notification']['category'][3]['description']    = _MI_BIBLIOTECA_FILE_NOTIFYDSC;
$modversion['notification']['category'][3]['subscribe_from'] = 'singlefile.php';
$modversion['notification']['category'][3]['item_name']      = 'lid';
$modversion['notification']['category'][3]['allow_bookmark'] = 1;

$modversion['notification']['event'][1]['name']          = 'new_category';
$modversion['notification']['event'][1]['category']      = 'global';
$modversion['notification']['event'][1]['title']         = _MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFY;
$modversion['notification']['event'][1]['caption']       = _MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFYCAP;
$modversion['notification']['event'][1]['description']   = _MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFYDSC;
$modversion['notification']['event'][1]['mail_template'] = 'global_newcategory_notify';
$modversion['notification']['event'][1]['mail_subject']  = _MI_BIBLIOTECA_GLOBAL_NEWCATEGORY_NOTIFYSBJ;

$modversion['notification']['event'][2]['name']          = 'file_modify';
$modversion['notification']['event'][2]['category']      = 'global';
$modversion['notification']['event'][2]['admin_only']    = 1;
$modversion['notification']['event'][2]['title']         = _MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFY;
$modversion['notification']['event'][2]['caption']       = _MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFYCAP;
$modversion['notification']['event'][2]['description']   = _MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFYDSC;
$modversion['notification']['event'][2]['mail_template'] = 'global_filemodify_notify';
$modversion['notification']['event'][2]['mail_subject']  = _MI_BIBLIOTECA_GLOBAL_FILEMODIFY_NOTIFYSBJ;

$modversion['notification']['event'][3]['name']          = 'file_broken';
$modversion['notification']['event'][3]['category']      = 'global';
$modversion['notification']['event'][3]['admin_only']    = 1;
$modversion['notification']['event'][3]['title']         = _MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFY;
$modversion['notification']['event'][3]['caption']       = _MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFYCAP;
$modversion['notification']['event'][3]['description']   = _MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFYDSC;
$modversion['notification']['event'][3]['mail_template'] = 'global_filebroken_notify';
$modversion['notification']['event'][3]['mail_subject']  = _MI_BIBLIOTECA_GLOBAL_FILEBROKEN_NOTIFYSBJ;

$modversion['notification']['event'][4]['name']          = 'file_submit';
$modversion['notification']['event'][4]['category']      = 'global';
$modversion['notification']['event'][4]['admin_only']    = 1;
$modversion['notification']['event'][4]['title']         = _MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFY;
$modversion['notification']['event'][4]['caption']       = _MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFYCAP;
$modversion['notification']['event'][4]['description']   = _MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFYDSC;
$modversion['notification']['event'][4]['mail_template'] = 'global_filesubmit_notify';
$modversion['notification']['event'][4]['mail_subject']  = _MI_BIBLIOTECA_GLOBAL_FILESUBMIT_NOTIFYSBJ;

$modversion['notification']['event'][5]['name']          = 'new_file';
$modversion['notification']['event'][5]['category']      = 'global';
$modversion['notification']['event'][5]['title']         = _MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFY;
$modversion['notification']['event'][5]['caption']       = _MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFYCAP;
$modversion['notification']['event'][5]['description']   = _MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFYDSC;
$modversion['notification']['event'][5]['mail_template'] = 'global_newfile_notify';
$modversion['notification']['event'][5]['mail_subject']  = _MI_BIBLIOTECA_GLOBAL_NEWFILE_NOTIFYSBJ;

$modversion['notification']['event'][6]['name']          = 'file_submit';
$modversion['notification']['event'][6]['category']      = 'category';
$modversion['notification']['event'][6]['admin_only']    = 1;
$modversion['notification']['event'][6]['title']         = _MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFY;
$modversion['notification']['event'][6]['caption']       = _MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFYCAP;
$modversion['notification']['event'][6]['description']   = _MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFYDSC;
$modversion['notification']['event'][6]['mail_template'] = 'category_filesubmit_notify';
$modversion['notification']['event'][6]['mail_subject']  = _MI_BIBLIOTECA_CATEGORY_FILESUBMIT_NOTIFYSBJ;

$modversion['notification']['event'][7]['name']          = 'new_file';
$modversion['notification']['event'][7]['category']      = 'category';
$modversion['notification']['event'][7]['title']         = _MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFY;
$modversion['notification']['event'][7]['caption']       = _MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFYCAP;
$modversion['notification']['event'][7]['description']   = _MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFYDSC;
$modversion['notification']['event'][7]['mail_template'] = 'category_newfile_notify';
$modversion['notification']['event'][7]['mail_subject']  = _MI_BIBLIOTECA_CATEGORY_NEWFILE_NOTIFYSBJ;

$modversion['notification']['event'][8]['name']          = 'approve';
$modversion['notification']['event'][8]['category']      = 'file';
$modversion['notification']['event'][8]['invisible']     = 1;
$modversion['notification']['event'][8]['title']         = _MI_BIBLIOTECA_FILE_APPROVE_NOTIFY;
$modversion['notification']['event'][8]['caption']       = _MI_BIBLIOTECA_FILE_APPROVE_NOTIFYCAP;
$modversion['notification']['event'][8]['description']   = _MI_BIBLIOTECA_FILE_APPROVE_NOTIFYDSC;
$modversion['notification']['event'][8]['mail_template'] = 'file_approve_notify';
$modversion['notification']['event'][8]['mail_subject']  = _MI_BIBLIOTECA_FILE_APPROVE_NOTIFYSBJ;
