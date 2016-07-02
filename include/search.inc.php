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
 * @param $queryarray
 * @param $andor
 * @param $limit
 * @param $offset
 * @param $userid
 * @return array
 */

function biblioteca_search($queryarray, $andor, $limit, $offset, $userid)
{
    global $xoopsDB;

    $sql = 'SELECT lid, cid, title, description, submitter, date FROM ' . $xoopsDB->prefix('biblioteca_downloads') . ' WHERE status != 0';

    if ($userid != 0) {
        $sql .= ' AND submitter=' . (int)$userid . ' ';
    }
    require_once XOOPS_ROOT_PATH . '/modules/biblioteca/include/functions.php';
    $categories = biblioteca_MygetItemIds('biblioteca_view', 'biblioteca');
    if (is_array($categories) && count($categories) > 0) {
        $sql .= ' AND cid IN (' . implode(',', $categories) . ') ';
    } else {
        return null;
    }

    if (is_array($queryarray) && $count = count($queryarray)) {
        $sql .= " AND ((title LIKE '%$queryarray[0]%' OR description LIKE '%$queryarray[0]%')";

        for ($i = 1; $i < $count; $i++) {
            $sql .= " $andor ";
            $sql .= "(title LIKE '%$queryarray[$i]%' OR description LIKE '%$queryarray[$i]%')";
        }
        $sql .= ')';
    }

    $sql .= ' ORDER BY date DESC';
    $result = $xoopsDB->query($sql, $limit, $offset);
    $ret    = array();
    $i      = 0;
    while ($myrow = $xoopsDB->fetchArray($result)) {
        $ret[$i]['image'] = 'images/deco/biblioteca_search.png';
        $ret[$i]['link']  = 'singlefile.php?cid=' . $myrow['cid'] . '&lid=' . $myrow['lid'] . '';
        $ret[$i]['title'] = $myrow['title'];
        $ret[$i]['time']  = $myrow['date'];
        $ret[$i]['uid']   = $myrow['submitter'];
        $i++;
    }

    return $ret;
}
