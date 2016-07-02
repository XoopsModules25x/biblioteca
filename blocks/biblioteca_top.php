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
 
function b_biblioteca_top_show($options) {
    require_once XOOPS_ROOT_PATH."/modules/biblioteca/include/functions.php";
    //appel de la class
    $downloads_Handler =& xoops_getModuleHandler('biblioteca_downloads', 'biblioteca');
    $block = array();
	$type_block = $options[0];
	$nb_entree = $options[1];
	$lenght_title = $options[2];
    array_shift($options);
	array_shift($options);
	array_shift($options);
    $categories = biblioteca_MygetItemIds('biblioteca_view', 'biblioteca');
    $criteria = new CriteriaCompo();
    $criteria->add(new Criteria('cid', '(' . implode(',', $categories) . ')','IN'));
    if (!(count($options) == 1 && $options[0] == 0)) {
		$criteria->add(new Criteria('cid', '(' . implode(',', $options) . ')','IN'));
	}
    $criteria->add(new Criteria('status', 0, '!='));
    switch ($type_block) 
	{	// pour le bloc: dernier fichier
		case "date":
			$criteria->setSort('date');
			$criteria->setOrder('DESC');
		break;
		// pour le bloc: plus téléchargé
		case "hits":
			$criteria->setSort('hits');
			$criteria->setOrder('DESC');
		break;
		// pour le bloc: mieux noté
        case "rating":
			$criteria->setSort('rating');
			$criteria->setOrder('DESC');
		break;
        // pour le bloc: aléatoire
		case "random":
			$criteria->setSort('RAND()');
		break;
	}
    $criteria->setLimit($nb_entree);
	$downloads_arr = $downloads_Handler->getall($criteria);	
	foreach (array_keys($downloads_arr) as $i) {   
		$block[$i]['lid'] = $downloads_arr[$i]->getVar('lid');
		$block[$i]['title'] = strlen($downloads_arr[$i]->getVar('title')) > $lenght_title ? substr($downloads_arr[$i]->getVar('title'),0,($lenght_title))."..." : $downloads_arr[$i]->getVar('title');
		$block[$i]['hits'] = $downloads_arr[$i]->getVar("hits");
        $block[$i]['rating'] = number_format($downloads_arr[$i]->getVar("rating"),1);
		$block[$i]['date'] = formatTimeStamp($downloads_arr[$i]->getVar("date"),"s");
	}
	return $block;
}

function b_biblioteca_top_edit($options) {
    //appel de la class
    $downloadscat_Handler =& xoops_getModuleHandler('biblioteca_cat', 'biblioteca');
    $criteria = new CriteriaCompo();
    $criteria = new CriteriaCompo();
    $criteria->setSort('weight ASC, title');
    $criteria->setOrder('ASC');
    $downloadscat_arr = $downloadscat_Handler->getall($criteria);  
	$form = _MB_biblioteca_DISP . "&nbsp;\n";
	$form .= "<input type=\"hidden\" name=\"options[0]\" value=\"" . $options[0] . "\" />";
	$form .= "<input name=\"options[1]\" size=\"5\" maxlength=\"255\" value=\"" . $options[1] . "\" type=\"text\" />&nbsp;" . _MB_biblioteca_FILES . "<br />";
	$form .= _MB_biblioteca_CHARS . " : <input name=\"options[2]\" size=\"5\" maxlength=\"255\" value=\"" . $options[2] . "\" type=\"text\" /><br /><br />";
	array_shift($options);
	array_shift($options);
	array_shift($options);
	$form .= _MB_biblioteca_CATTODISPLAY . "<br /><select name=\"options[]\" multiple=\"multiple\" size=\"5\">";
	$form .= "<option value=\"0\" " . (array_search(0, $options) === false ? '' : 'selected="selected"') . ">" . _MB_biblioteca_ALLCAT . "</option>";
	foreach (array_keys($downloadscat_arr) as $i) {
		$form .= "<option value=\"" . $downloadscat_arr[$i]->getVar('cid') . "\" " . (array_search($downloadscat_arr[$i]->getVar('cid'), $options) === false ? '' : 'selected="selected"') . ">".$downloadscat_arr[$i]->getVar('title')."</option>";
	}
	$form .= "</select>";
	return $form;
}
?>
