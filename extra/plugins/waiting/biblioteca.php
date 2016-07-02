<?php
/*************************************************************************/
# Waiting Contents Extensible                                            #
# Plugin for module biblioteca                                         #
#                                                                        #
# Author                                                                 #
# Danordesign     -   flying.tux@gmail.com                               #
#                                                                        #
# Last modified on 19.10.2009                                            #
/*************************************************************************/
function b_waiting_biblioteca()
{
	$xoopsDB =& Database::getInstance();
	$ret = array() ;

	// biblioteca waiting
	$block = array();
	$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("biblioteca_downloads")." WHERE status=0");
	if ( $result ) {
		$block['adminlink'] = XOOPS_URL."/modules/biblioteca/admin/downloads.php?op=liste&statut_display=0";
		list($block['pendingnum']) = $xoopsDB->fetchRow($result);
		$block['lang_linkname'] = _PI_WAITING_WAITINGS ;
	}
	$ret[] = $block ;

	// biblioteca broken
	$block = array();
	$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("biblioteca_broken"));
	if ( $result ) {
		$block['adminlink'] = XOOPS_URL."/modules/biblioteca/admin/broken.php";
		list($block['pendingnum']) = $xoopsDB->fetchRow($result);
		$block['lang_linkname'] = _PI_WAITING_BROKENS ;
	}
	$ret[] = $block ;

	// biblioteca modreq
	$block = array();
	$result = $xoopsDB->query("SELECT COUNT(*) FROM ".$xoopsDB->prefix("biblioteca_mod"));
	if ( $result ) {
		$block['adminlink'] = XOOPS_URL."/modules/biblioteca/admin/modified.php";
		list($block['pendingnum']) = $xoopsDB->fetchRow($result);
		$block['lang_linkname'] = _PI_WAITING_MODREQS ;
	}
	$ret[] = $block ;
	
	return $ret;
}

?>
