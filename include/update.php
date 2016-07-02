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
function xoops_module_update_biblioteca()
{
    $db  = XoopsDatabaseFactory::getDatabaseConnection();
    $sql = 'ALTER TABLE `' . $db->prefix('biblioteca_cat') . '` CHANGE `cid` `cat_cid` INT( 5 ) UNSIGNED NOT NULL AUTO_INCREMENT ;';
    $db->query($sql);
    $sql = 'ALTER TABLE `' . $db->prefix('biblioteca_cat') . "` CHANGE `pid` `cat_pid` INT( 5 ) UNSIGNED NOT NULL DEFAULT '0' ;";
    $db->query($sql);
    $sql = 'ALTER TABLE `' . $db->prefix('biblioteca_cat') . '` CHANGE `title` `cat_title` VARCHAR( 255 ) NOT NULL ;';
    $db->query($sql);
    $sql = 'ALTER TABLE `' . $db->prefix('biblioteca_cat') . '` CHANGE `imgurl` `cat_imgurl` VARCHAR( 255 ) NOT NULL ;';
    $db->query($sql);
    $sql = 'ALTER TABLE `' . $db->prefix('biblioteca_cat') . '` CHANGE `description_main` `cat_description_main` TEXT NOT NULL ;';
    $db->query($sql);
    $sql = 'ALTER TABLE `' . $db->prefix('biblioteca_cat') . "` CHANGE `weight` `cat_weight` INT( 11 ) NOT NULL DEFAULT '0' ;";
    $db->query($sql);
    $sql = 'ALTER TABLE `' . $db->prefix('biblioteca_downloads') . '` ADD `paypal` VARCHAR( 255 ) NOT NULL;';
    $db->query($sql);
    $sql = 'ALTER TABLE `' . $db->prefix('biblioteca_downloads') . "` CHANGE `size` `size` VARCHAR( 15 ) NOT NULL DEFAULT '';";
    $db->query($sql);
    $sql = 'ALTER TABLE `' . $db->prefix('biblioteca_mod') . "` CHANGE `size` `size` VARCHAR( 15 ) NOT NULL DEFAULT '';";
    $db->query($sql);

    return true;
}
