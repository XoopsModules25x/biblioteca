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

function biblioteca_adminmenu ($currentoption = 0, $breadcrumb = '') {      
		
	/* Nice buttons styles */
	echo "
    	<style type='text/css'>
    	#buttontop { float:left; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }
    	#buttonbar { float:left; width:100%; background: #e7e7e7 url('" . XOOPS_URL . "/modules/biblioteca/images/deco/bg.png') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 12px; }
    	#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }
		#buttonbar li { display:inline; margin:0; padding:0; }
		#buttonbar a { float:left; background:url('" . XOOPS_URL . "/modules/biblioteca/images/deco/left_both.png') no-repeat left top; margin:0; padding:0 0 0 9px; border-bottom:1px solid #000; text-decoration:none; }
		#buttonbar a span { float:left; display:block; background:url('" . XOOPS_URL . "/modules/biblioteca/images/deco/right_both.png') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }
		/* Commented Backslash Hack hides rule from IE5-Mac \*/
		#buttonbar a span {float:none;}
		/* End IE5-Mac hack */
		#buttonbar a:hover span { color:#333; }
		#buttonbar #current a { background-position:0 -150px; border-width:0; }
		#buttonbar #current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }
		#buttonbar a:hover { background-position:0% -150px; }
		#buttonbar a:hover span { background-position:100% -150px; }
		</style>
    ";
	
	global $xoopsModule, $xoopsConfig;
	
	$tblColors = Array();
	$tblColors[0] = $tblColors[1] = $tblColors[2] = $tblColors[3] = $tblColors[4] = $tblColors[5] = $tblColors[6] = $tblColors[7] = $tblColors[8] = '';
	$tblColors[$currentoption] = 'current';
	if (file_exists(XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/language/' . $xoopsConfig['language'] . '/modinfo.php')) {
		include_once XOOPS_ROOT_PATH . '/modules/biblioteca/language/' . $xoopsConfig['language'] . '/modinfo.php';
	} else {
		include_once XOOPS_ROOT_PATH . '/modules/biblioteca/english/modinfo.php';
	}
	
	echo "<div id='buttontop'>";
	echo "<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\"><tr>";
	//echo "<td style=\"width: 45%; font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;\"><a class=\"nobutton\" href=\"../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $xoopsModule->getVar('mid') . "\">" . _AM_SF_OPTS . "</a> | <a href=\"import.php\">" . _AM_SF_IMPORT . "</a> | <a href=\"../index.php\">" . _AM_SF_GOMOD . "</a> | <a href=\"../help/index.html\" target=\"_blank\">" . _AM_SF_HELP . "</a> | <a href=\"about.php\">" . _AM_SF_ABOUT . "</a></td>";
	echo "<td style='font-size: 10px; text-align: left; color: #2F5376; padding: 0 6px; line-height: 18px;'>
	  <a class='nobutton' href='" . XOOPS_URL . "/modules/system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $xoopsModule->getVar('mid') . "'>" . _PREFERENCES . "</a> 
	| <a href='" . XOOPS_URL . "/modules/biblioteca/index.php'>" . $GLOBALS["xoopsModule"]->getVar("name") . "</a>
	</td>";
	echo "<td style='font-size: 10px; text-align: right; color: #2F5376; padding: 0 6px; line-height: 18px;'><b>" . $xoopsModule->name() . " </b> </td>";
	echo "</tr></table>";
	echo "</div>";
	
	echo "<div id='buttonbar'>";
	echo "<ul>";
       echo "<li id='" . $tblColors[0] . "'><a href=\"" . XOOPS_URL . "/modules/biblioteca/admin/index.php\"><span>" . _MI_biblioteca_ADMENU1 . "</span></a></li>";
	echo "<li id='" . $tblColors[1] . "'><a href=\"" . XOOPS_URL . "/modules/biblioteca/admin/category.php\"><span>" . _MI_biblioteca_ADMENU2 . "</span></a></li>";
	echo "<li id='" . $tblColors[2] . "'><a href=\"" . XOOPS_URL . "/modules/biblioteca/admin/downloads.php\"><span>" . _MI_biblioteca_ADMENU3 . "</span></a></li>";
"</span></a></li>";
	echo "<li id='" . $tblColors[3] . "'><a href=\"" . XOOPS_URL . "/modules/biblioteca/admin/broken.php\"><span>" . _MI_biblioteca_ADMENU4 . "</span></a></li>";
	echo "<li id='" . $tblColors[4] . "'><a href=\"" . XOOPS_URL . "/modules/biblioteca/admin/modified.php\"><span>" . _MI_biblioteca_ADMENU5 . "</span></a></li>";
	echo "<li id='" . $tblColors[5] . "'><a href=\"" . XOOPS_URL . "/modules/biblioteca/admin/champs.php\"><span>" . _MI_biblioteca_ADMENU6 . "</span></a></li>";
	echo "<li id='" . $tblColors[6] . "'><a href=\"" . XOOPS_URL . "/modules/biblioteca/admin/permissions.php\"><span>" . _MI_biblioteca_ADMENU7 . "</span></a></li>";
	echo "</ul></div>&nbsp;";
}
?>
