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
 * @param $permtype
 * @param $dirname
 * @return mixed
 */

function biblioteca_MygetItemIds($permtype, $dirname)
{
    global $xoopsUser;
    static $permissions = array();
    if (is_array($permissions) && array_key_exists($permtype, $permissions)) {
        return $permissions[$permtype];
    }
    $module_handler = xoops_getHandler('module');
    $tdmModule      =& $module_handler->getByDirname($dirname);
    $groups         = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
    $gperm_handler  = xoops_getHandler('groupperm');
    $categories     = $gperm_handler->getItemIds($permtype, $groups, $tdmModule->getVar('mid'));

    return $categories;
}

/**
 * retourne le nombre de t�l�chargements dans le cat�gories enfants d'une cat�gorie
 * @param $mytree
 * @param $categories
 * @param $entries
 * @param $cid
 * @return int
 */

function biblioteca_NumbersOfEntries($mytree, $categories, $entries, $cid)
{
    $count     = 0;
    $child_arr = array();
    if (in_array($cid, $categories)) {
        $child = $mytree->getAllChild($cid);
        foreach (array_keys($entries) as $i) {
            if ($entries[$i]->getVar('cid') == $cid) {
                $count++;
            }
            foreach (array_keys($child) as $j) {
                if ($entries[$i]->getVar('cid') == $j) {
                    $count++;
                }
            }
        }
    }

    return $count;
}

/**
 * retourne une image "nouveau" ou "mise � jour"
 * @param $time
 * @param $status
 * @return string
 */

function biblioteca_Thumbnail($time, $status)
{
    global $xoopsModuleConfig;
    $count     = 7;
    $new       = '';
    $startdate = (time() - (86400 * $count));
    if ($xoopsModuleConfig['showupdated'] == 1) {
        if ($startdate < $time) {
            if ($status == 1) {
                $new = '&nbsp;<img src="' . XOOPS_URL . '/modules/biblioteca/images/newred.gif" alt="' . _MD_BIBLIOTECA_INDEX_NEWTHISWEEK . '" title="' . _MD_BIBLIOTECA_INDEX_NEWTHISWEEK . '"/>';
            } elseif ($status == 2) {
                $new = '&nbsp;<img src="' . XOOPS_URL . '/modules/biblioteca/images/update.gif" alt="' . _MD_BIBLIOTECA_INDEX_UPTHISWEEK . '" title="' . _MD_BIBLIOTECA_INDEX_UPTHISWEEK . '"/>';
            }
        }
    }

    return $new;
}

/**
 * retourne une image "populaire"
 * @param $hits
 * @return string
 */

function biblioteca_Popular($hits)
{
    global $xoopsModuleConfig;
    if ($hits >= $xoopsModuleConfig['popular']) {
        return '&nbsp;<img src ="' . XOOPS_URL . '/modules/biblioteca/images/pop.gif" alt="' . _MD_BIBLIOTECA_INDEX_POPULAR . '" title="' . _MD_BIBLIOTECA_INDEX_POPULAR . '"/>';
    }

    return '';
}

/**
 * @param $size
 * @return string
 */
function trans_size($size)
{
    if ($size > 0) {
        $mb = 1024 * 1024;
        if ($size > $mb) {
            $mysize = sprintf('%01.2f', $size / $mb) . ' MB';
        } elseif ($size >= 1024) {
            $mysize = sprintf('%01.2f', $size / 1024) . ' KB';
        } else {
            $mysize = sprintf(_AM_BIBLIOTECA_NUMBYTES, $size);
        }

        return $mysize;
    } else {
        return '';
    }
}

/**
 * @param        $global
 * @param        $key
 * @param string $default
 * @param string $type
 * @return mixed|string
 */
function biblioteca_CleanVars(&$global, $key, $default = '', $type = 'int')
{
    switch ($type) {
        case 'string':
            $ret = isset($global[$key]) ? filter_var($global[$key], FILTER_SANITIZE_MAGIC_QUOTES) : $default;
            break;
        case 'int':
        default:
            $ret = isset($global[$key]) ? filter_var($global[$key], FILTER_SANITIZE_NUMBER_INT) : $default;
            break;
    }
    if ($ret === false) {
        return $default;
    }

    return $ret;
}

/**
 * @param        $mytree
 * @param        $key
 * @param        $category_array
 * @param        $title
 * @param string $prefix
 * @return string
 */
function biblioteca_PathTree($mytree, $key, $category_array, $title, $prefix = '')
{
    $category_parent = $mytree->getAllParent($key);
    $category_parent = array_reverse($category_parent);
    $Path            = '';
    foreach (array_keys($category_parent) as $j) {
        $Path .= $category_parent[$j]->getVar($title) . $prefix;
    }
    $first_category = '';
    if (array_key_exists($key, $category_array)) {
        $first_category = $category_array[$key]->getVar($title);
    }
    $Path .= $first_category;

    return $Path;
}

/**
 * @param        $mytree
 * @param        $key
 * @param        $category_array
 * @param        $title
 * @param string $prefix
 * @param bool   $link
 * @param string $order
 * @param bool   $lasturl
 * @return string
 */
function biblioteca_PathTreeUrl($mytree, $key, $category_array, $title, $prefix = '', $link = false, $order = 'ASC', $lasturl = false)
{
    global $xoopsModule;
    $category_parent = $mytree->getAllParent($key);
    if ($order === 'ASC') {
        $category_parent = array_reverse($category_parent);
        if ($link == true) {
            $Path = '<a href="index.php">' . $xoopsModule->name() . '</a>' . $prefix;
        } else {
            $Path = $xoopsModule->name() . $prefix;
        }
    } else {
        $first_category = '';
        if (array_key_exists($key, $category_array)) {
            $first_category = $category_array[$key]->getVar($title);
        }
        $Path = $first_category . $prefix;
    }
    foreach (array_keys($category_parent) as $j) {
        if ($link == true) {
            $Path .= '<a href="viewcat.php?cid=' . $category_parent[$j]->getVar('cat_cid') . '">' . $category_parent[$j]->getVar($title) . '</a>' . $prefix;
        } else {
            $Path .= $category_parent[$j]->getVar($title) . $prefix;
        }
    }
    if ($order === 'ASC') {
        if (array_key_exists($key, $category_array)) {
            if ($lasturl == true) {
                $first_category = '<a href="viewcat.php?cid=' . $category_array[$key]->getVar('cat_cid') . '">' . $category_array[$key]->getVar($title) . '</a>';
            } else {
                $first_category = $category_array[$key]->getVar($title);
            }
        } else {
            $first_category = '';
        }
        $Path .= $first_category;
    } else {
        if ($link == true) {
            $Path .= '<a href="index.php">' . $xoopsModule->name() . '</a>';
        } else {
            $Path .= $xoopsModule->name();
        }
    }

    return $Path;
}
