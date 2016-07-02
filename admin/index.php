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

include 'admin_header.php';
//Affichage de la partie haute de l'administration de Xoops
xoops_cp_header();
//On recupere la valeur de l'argument op dans l'URL$
if (isset($_REQUEST['op'])) {
	$op = $_REQUEST['op'];
} else {
	$op = 'liste';
}

//appel des class
//$downloadscat_Handler =& xoops_getModuleHandler('biblioteca_cat', 'biblioteca');
$downloads_Handler =& xoops_getModuleHandler('biblioteca_downloads', 'biblioteca');
$downloadsbroken_Handler =& xoops_getModuleHandler('biblioteca_broken', 'biblioteca');
$downloadsmod_Handler =& xoops_getModuleHandler('biblioteca_mod', 'biblioteca');

//appel du menu admin
if ( !is_readable(XOOPS_ROOT_PATH . "/Frameworks/art/functions.admin.php"))	{
    biblioteca_adminmenu(1, _MI_biblioteca_ADMENU1);
} else {
    include_once XOOPS_ROOT_PATH.'/Frameworks/art/functions.admin.php';
    loadModuleAdminMenu (1, _MI_biblioteca_ADMENU1);
}

// compte le nombre de téléchargements
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('status', 0, '!='));
$nb_downloads = $downloads_Handler->getCount($criteria);
// compte le nombre de téléchargements en attente de validation
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('status', 0));
$nb_downloads_waiting = $downloads_Handler->getCount($criteria);
// compte le nombre de rapport de téléchargements brisés
$nb_broken = $downloadsbroken_Handler->getCount();
// compte le nombre de demande de modifications
$nb_modified = $downloadsmod_Handler->getCount();

if (phpversion() >= 5){
    include_once XOOPS_ROOT_PATH.'/modules/'.$xoopsModule->dirname().'/class/menu.php';
    //showIndex();
    $menu = new bibliotecaMenu();
    $menu->addItem('Category', 'category.php', '../images/icon/doc.png', _MI_biblioteca_ADMENU2);
    $menu->addItem('Downloads', 'downloads.php', '../images/icon/telecharger.png', _MI_biblioteca_ADMENU3);
    $menu->addItem('Broken', 'broken.php', '../images/icon/broken.png', _MI_biblioteca_ADMENU4);
    $menu->addItem('Modified', 'modified.php', '../images/icon/modified.png', _MI_biblioteca_ADMENU5);
    $menu->addItem('Champ', 'field.php', '../images/icon/field.png', _MI_biblioteca_ADMENU6);
    $menu->addItem('About', 'about.php', '../images/icon/about.png', _MI_biblioteca_ADMENU7);
    $menu->addItem('Permissions', 'permissions.php', '../images/icon/permissions.png', _MI_biblioteca_ADMENU8);
    $menu->addItem('Update', '../../system/admin.php?fct=modulesadmin&op=update&module=biblioteca', '../images/icon/update.png', _MI_biblioteca_ADMENU9);
    $menu->addItem('Preference', '../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule ->getVar('mid') . '&amp;&confcat_id=1', '../images/icon/pref.png', _PREFERENCES);	
    echo $menu->getCSS();

    echo '<table width="100%" border="0" cellspacing="10" cellpadding="4">';
    echo '<tr><td>' . $menu->render() . '</td>';
}else{
    echo '<table width="100%" border="0" cellspacing="10" cellpadding="4">';
    echo '<tr><td><div class="errorMsg" style="text-align: left;">' . _AM_biblioteca_INDEX_ERREURPHP . '</div></td>';
}
echo '<td valign="top" width="60%">';
echo '<fieldset><legend class="CPmediumTitle">' . _MI_biblioteca_ADMENU3 . '</legend><br/>';
printf(_AM_biblioteca_INDEX_DOWNLOADS,$nb_downloads);
echo '<br /><br />';
printf(_AM_biblioteca_INDEX_DOWNLOADSWAITING,$nb_downloads_waiting);
echo '<br/></fieldset><br /><br />';

echo '<fieldset><legend class="CPmediumTitle">' . _MI_biblioteca_ADMENU4 . '</legend><br/>';
printf(_AM_biblioteca_INDEX_BROKEN,$nb_broken);
echo '<br/></fieldset><br /><br />';

echo '<fieldset><legend class="CPmediumTitle">' . _MI_biblioteca_ADMENU5 . '</legend><br/>';
printf(_AM_biblioteca_INDEX_MODIFIED,$nb_modified);
echo '<br/></fieldset><br /><br />';


echo '</td></tr>';
echo '</table>';

// message d'erreur si la copie du dossier dans uploads n'a pas marché à l'installation
$url_folder = XOOPS_ROOT_PATH . '/uploads/biblioteca/';
if (!is_dir($url_folder)){
    echo '<div class="errorMsg" style="text-align: left;">' . sprintf(_AM_biblioteca_INDEX_ERREURFOLDER, XOOPS_ROOT_PATH) . '</div>'; 
}

//système pour indiquer si l'on utilise la dernière version
moduleLastVersionInfo( $GLOBALS['xoopsModule']->getVar('version'), $xoopsModule->dirname() );

//Mise à jour
function moduleLastVersionInfo($version, $module_name) 
{
	//Version du module installé
    $raw = '';
	$version_en_cours = substr($version,0,1).'.'.substr($version,1,1);
	$site_xml = "http://jequiehost.com/desenvolvimento/JH_Modules_Version.xml";
    if(ini_get('allow_url_fopen')) {
        $fp = @fopen($site_xml,"r");
        if (!$fp){
            echo '<fieldset><legend style="font-weight:bold; color:#990000;">' . _AM_biblioteca_INDEX_UPDATE_INFO . '</legend>';
            echo "<span style=\"color:red;\">" . _AM_biblioteca_INDEX_VERSION_FICHIER_KO . "</span>";
            echo '</fieldset><br /><br />';
        }else{
            while(!feof($fp)) $raw .= @fgets($fp, 4096);
            fclose($fp);
            if( @eregi("<module>(.*)</module>", $raw, $rawelements ) ) 
            {
                $elements = explode("<module>", $rawelements[0]);
                $maximum = count($elements);
                for( $i=1; $i<$maximum; $i++ ) 
                {
                    @eregi( "<name>(.*)</name>",$elements[$i], $name );
                    @eregi( "<version>(.*)</version>",$elements[$i], $version );
                    @eregi( "<xoopsVersionNeeded>(.*)</xoopsVersionNeeded>",$elements[$i], $xoopsVersionNeeded );
                    @eregi( "<versionChangelog>(.*)</versionChangelog>",$elements[$i], $versionChangelog );			
                    if( $name[1] == $module_name )
                    {
                        $infos_module[0] = $name[1];
                        $infos_module[1] = $version[1];
                        $infos_module[2] = $xoopsVersionNeeded[1];
                        $infos_module[3] = utf8_encode($versionChangelog[1]);
                    } 
                }		
            }
            echo '<fieldset><legend style="font-weight:bold; color:#990000;">' . _AM_biblioteca_INDEX_UPDATE_INFO . '</legend>';
            if( $version_en_cours == $infos_module[1] ) {
                echo "<span style=\"color:green; \">" . sprintf(_AM_biblioteca_INDEX_VERSION_OK, $infos_module[1]) . "</span>";
            } else {
                echo "<span style=\"color:red;\">" . sprintf(_AM_biblioteca_INDEX_VERSION_NOT_OK, $infos_module[1]) . "</span>";
                echo '<br /><br />' . _AM_biblioteca_INDEX_CHANGELOG . '<br />' . $infos_module[3];
            }
            echo '</fieldset><br /><br />';
        }
    }else{
        echo '<fieldset><legend style="font-weight:bold; color:#990000;">' . _AM_biblioteca_INDEX_UPDATE_INFO . '</legend>';
        echo "<span style=\"color:red;\">" . _AM_biblioteca_INDEX_VERSION_ALLOWURLFOPEN . "</span>";
        echo '</fieldset><br /><br />';
    }
}

echo '<div align="center"><a href="http://www.jequiehost.com" target="_blank"><img src="../images/biblioteca.png" alt="Jequié Host" title="Jequié Host"></a></div>';
//Affichage de la partie basse de l'administration de Xoops
xoops_cp_footer();
?>