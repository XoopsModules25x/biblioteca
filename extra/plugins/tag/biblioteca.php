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
 * @param $items
 * @return bool
 */

function biblioteca_tag_iteminfo(&$items)
{
    if (empty($items) || !is_array($items)) {
        return false;
    }

    $items_id = array();
    foreach (array_keys($items) as $cat_id) {
        foreach (array_keys($items[$cat_id]) as $item_id) {
            $items_id[] = (int)$item_id;
        }
    }

    $item_handler = xoops_getModuleHandler('downloads', 'biblioteca');
    $items_obj    = $item_handler->getObjects(new Criteria('lid', '(' . implode(', ', $items_id) . ')', 'IN'), true);

    foreach (array_keys($items) as $cat_id) {
        foreach (array_keys($items[$cat_id]) as $item_id) {
            if (isset($items_obj[$item_id])) {
                $item_obj                 =& $items_obj[$item_id];
                $items[$cat_id][$item_id] = array(
                    'title'   => $item_obj->getVar('title'),
                    'uid'     => $item_obj->getVar('submitter'),
                    'link'    => "singlefile.php?cid={$item_obj->getVar('cid')}&lid={$item_id}",
                    'time'    => $item_obj->getVar('date'),
                    'tags'    => '',
                    'content' => ''
                );
            }
        }
    }
    unset($items_obj);
}

/**
 * @param $mid
 */
function biblioteca_tag_synchronization($mid)
{
    $item_handler = xoops_getModuleHandler('downloads', 'biblioteca');
    $link_handler = xoops_getModuleHandler('link', 'tag');

    /* clear tag-item links */
    if (version_compare(mysql_get_server_info(), '4.1.0', 'ge')):
        $sql = "    DELETE FROM {$link_handler->table}" . '    WHERE ' . "        tag_modid = {$mid}" . '        AND ' . '        ( tag_itemid NOT IN ' . "            ( SELECT DISTINCT {$item_handler->keyName} " . "                FROM {$item_handler->table} "
               . "                WHERE {$item_handler->table}.status > 0" . '            ) ' . '        )';
    else:
        $sql = "    DELETE {$link_handler->table} FROM {$link_handler->table}" . "    LEFT JOIN {$item_handler->table} AS aa ON {$link_handler->table}.tag_itemid = aa.{$item_handler->keyName} " . '    WHERE ' . "        tag_modid = {$mid}" . '        AND '
               . "        ( aa.{$item_handler->keyName} IS NULL" . '            OR aa.status < 1' . '        )';
    endif;
    if (!$result = $link_handler->db->queryF($sql)) {
        //xoops_error($link_handler->db->error());
    }
}
