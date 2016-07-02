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

error_reporting(0);
include 'header.php';

$lid = biblioteca_CleanVars($_REQUEST, 'lid', 0, 'int');
$cid = biblioteca_CleanVars($_REQUEST, 'cid', 0, 'int');
// redirection si le t�l�chargement n'existe pas
$view_downloads = $downloads_Handler->get($lid);
if (count($view_downloads) == 0) {
    redirect_header('index.php', 3, _MD_BIBLIOTECA_SINGLEFILE_NONEXISTENT);
    exit();
}
//redirection si pas de permission (cat)
$categories = biblioteca_MygetItemIds('biblioteca_view', 'biblioteca');
if (!in_array($view_downloads->getVar('cid'), $categories)) {
    redirect_header(XOOPS_URL, 2, _NOPERM);
    exit();
}

//redirection si pas de permission (t�l�charger)
if ($xoopsModuleConfig['permission_download'] == 1) {
    $categories = biblioteca_MygetItemIds('biblioteca_download', 'biblioteca');
    if (!in_array($view_downloads->getVar('cid'), $categories)) {
        redirect_header(XOOPS_URL, 2, _MD_BIBLIOTECA_SINGLEFILE_NOPERMDOWNLOAD);
        exit();
    }
} else {
    $item = biblioteca_MygetItemIds('biblioteca_download_item', 'biblioteca');
    if (!in_array($view_downloads->getVar('lid'), $item)) {
        redirect_header(XOOPS_URL, 2, _MD_BIBLIOTECA_SINGLEFILE_NOPERMDOWNLOAD);
        exit();
    }
}

@$xoopsLogger->activated = false;
error_reporting(0);
if ($xoopsModuleConfig['check_host']) {
    $goodhost     = 0;
    $referer      = parse_url(xoops_getenv('HTTP_REFERER'));
    $referer_host = $referer['host'];
    foreach ($xoopsModuleConfig['referers'] as $ref) {
        if (!empty($ref) && preg_match('/' . $ref . '/i', $referer_host)) {
            $goodhost = '1';
            break;
        }
    }
    if (!$goodhost) {
        redirect_header(XOOPS_URL . "/modules/biblioteca/singlefile.php?cid=$cid&amp;lid=$lid", 30, _MD_BIBLIOTECA_NOPERMISETOLINK);
        exit();
    }
}

// ajout +1 pour les hits
$sql = sprintf('UPDATE %s SET hits = hits+1 WHERE lid = %u AND status > 0', $xoopsDB->prefix('biblioteca_downloads'), $lid);
$xoopsDB->queryF($sql);

$url = $view_downloads->getVar('url');
if (!preg_match("/^ed2k*:\/\//i", $url)) {
    header("Location: $url");
}
echo "<html><head><meta http-equiv=\"Refresh\" content=\"0; URL=" . $url . "\"></meta></head><body></body></html>";
exit();
