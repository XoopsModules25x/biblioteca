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

include 'admin_header.php';
//Affichage de la partie haute de l'administration de Xoops
xoops_cp_header();

if (!is_readable(XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php')) {
    biblioteca_adminmenu(7, _MI_BIBLIOTECA_ADMENU7);
} else {
    include_once XOOPS_ROOT_PATH . '/Frameworks/art/functions.admin.php';
    loadModuleAdminMenu(7, _MI_BIBLIOTECA_ADMENU7);
}

$versioninfo =& $module_handler->get($xoopsModule->getVar('mid'));
echo "
	<style type=\"text/css\">
	label,text {
		display: block;
		float: left;
		margin-bottom: 2px;
	}
	label {
		text-align: right;
		width: 150px;
		padding-right: 20px;
	}
	br {
		clear: left;
	}
	</style>
";

echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . $xoopsModule->getVar('name') . '</legend>';
echo "<div style='padding: 8px;'>";
echo "<img src='" . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/' . $versioninfo->getInfo('image') . "' alt='' hspace='10' vspace='0' /></a>\n";
echo "<div style='padding: 5px;'><strong>" . $versioninfo->getInfo('name') . ' version ' . $versioninfo->getInfo('version') . "</strong></div>\n";
echo '<label>' . _AM_BIBLIOTECA_ABOUT_RELEASEDATE . ':</label><text>' . $versioninfo->getInfo('release') . '</text><br>';
echo '<label>' . _AM_BIBLIOTECA_ABOUT_AUTHOR . ':</label><text>' . $versioninfo->getInfo('author') . '</text><br>';
echo '<label>' . _AM_BIBLIOTECA_ABOUT_CREDITS . ':</label><text>' . $versioninfo->getInfo('credits') . '</text><br>';
echo '<label>' . _AM_BIBLIOTECA_ABOUT_LICENSE . ":</label><text><a href=\"" . $versioninfo->getInfo('license_file') . "\" target=\"_blank\" >" . $versioninfo->getInfo('license') . "</a></text>\n";
echo '</div>';
echo '</fieldset>';
echo "<br clear=\"all\" />";

echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_BIBLIOTECA_ABOUT_MODULEINFOS . '</legend>';
echo "<div style='padding: 8px;'>";
echo '<label>' . _AM_BIBLIOTECA_ABOUT_STATUS . ':</label><text>' . $versioninfo->getInfo('module_status') . '</text><br>';
echo '<label>' . _AM_BIBLIOTECA_ABOUT_MODULEWEBSITE . ':</label><text>' . "<a href='" . $versioninfo->getInfo('support_site_url') . "' target='_blank'>" . $versioninfo->getInfo('support_site_name') . '</a>' . '</text><br>';
echo '</div>';
echo '</fieldset>';
echo "<br clear=\"all\" />";

$xoops_url = parse_url(XOOPS_URL);
$xoops_url = str_replace('www.', '', $xoops_url['host']);
echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_BIBLIOTECA_ABOUT_FILEPROTECTION . '</legend>';
echo "<div style='padding: 8px;'>";
echo '<div>';
echo _AM_BIBLIOTECA_ABOUT_FILEPROTECTION_INFO1 . '<br><br>' . XOOPS_ROOT_PATH . '/uploads/biblioteca/downloads/' . '<br><br>' . _AM_BIBLIOTECA_ABOUT_FILEPROTECTION_INFO2 . '<br><br>';
echo 'RewriteEngine on' . '<br>' . 'RewriteCond %{HTTP_REFERER} !' . $xoops_url . "/.*$ [NC]<br>ReWriteRule \.*$ - [F]";
echo '</div>';
echo '</div>';
echo '</fieldset>';
echo "<br clear=\"all\" />";

$file = XOOPS_ROOT_PATH . '/modules/biblioteca/changelog.txt';
if (is_readable($file)) {
    echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_BIBLIOTECA_ABOUT_CHANGELOG . '</legend>';
    echo "<div style='padding: 8px;'>";
    echo '<div>' . utf8_encode(implode('<br>', file($file))) . '</div>';
    echo '</div>';
    echo '</fieldset>';
    echo "<br clear=\"all\" />";
}

xoops_cp_footer();
