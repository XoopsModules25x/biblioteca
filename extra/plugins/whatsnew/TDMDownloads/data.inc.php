<?php
// $Id: data.inc.php,v 1.3 2005/10/22 08:37:48 ohwada Exp $

// 2005-10-01 K.OHWADA
// category, counter

// 2004/08/20 K.OHWADA
// atom feed

//================================================================
// What's New Module
// get aritciles from module
// for mydownloads 1.10 <http://www.xoops.org/>
// 2004.01.03 K.OHWADA
//================================================================

/**
 * @param int $limit
 * @param int $offset
 * @return array
 */
function biblioteca_new($limit = 0, $offset = 0)
{
    global $xoopsDB;

    $myts =& MyTextSanitizer::getInstance();

    $URL_MOD = XOOPS_URL . '/modules/biblioteca';
    $sql     = 'SELECT lid, title, date, cid, submitter, hits, description FROM ' . $xoopsDB->prefix('biblioteca_downloads') . ' WHERE status>0 ORDER BY date';

    $result = $xoopsDB->query($sql, $limit, $offset);

    $i   = 0;
    $ret = array();

    while ($row = $xoopsDB->fetchArray($result)) {
        $lid                 = $row['lid'];
        $ret[$i]['link']     = $URL_MOD . '/singlefile.php?lid=' . $lid;
        $ret[$i]['cat_link'] = $URL_MOD . '/viewcat.php?cid=' . $row['cid'];

        $ret[$i]['title'] = $row['title'];
        $ret[$i]['time']  = $row['date'];

        // atom feed
        $ret[$i]['id']          = $lid;
        $ret[$i]['description'] = $myts->makeTareaData4Show($row['description'], 0);    //no html

        // category
        //$ret[$i]['cat_name'] = $row['ctitle'];

        // counter
        $ret[$i]['hits'] = $row['hits'];

        // this module dont show user name
        $ret[$i]['uid'] = $row['submitter'];

        $i++;
    }

    return $ret;
}

/**
 * @return int
 */
function biblioteca_num()
{
    global $xoopsDB;

    $sql   = 'SELECT count(*) FROM ' . $xoopsDB->prefix('biblioteca_downloads') . ' WHERE status>0 ORDER BY lid';
    $array = $xoopsDB->fetchRow($xoopsDB->query($sql));
    $num   = $array[0];
    if (empty($num)) {
        $num = 0;
    }

    return $num;
}

/**
 * @param int $limit
 * @param int $offset
 * @return array
 */
function biblioteca_data($limit = 0, $offset = 0)
{
    global $xoopsDB;

    $sql    = 'SELECT lid, title, date FROM ' . $xoopsDB->prefix('biblioteca_downloads') . ' WHERE status>0 ORDER BY lid';
    $result = $xoopsDB->query($sql, $limit, $offset);

    $i   = 0;
    $ret = array();

    while ($myrow = $xoopsDB->fetchArray($result)) {
        $id               = $myrow['lid'];
        $ret[$i]['id']    = $id;
        $ret[$i]['link']  = XOOPS_URL . '/modules/biblioteca/singlefile.php?lid=' . $id . '';
        $ret[$i]['title'] = $myrow['title'];
        $ret[$i]['time']  = $myrow['date'];
        $i++;
    }

    return $ret;
}
