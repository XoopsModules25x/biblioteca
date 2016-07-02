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
include_once XOOPS_ROOT_PATH . '/class/tree.php';

class TDMObjectTree extends XoopsObjectTree {
    
    function __constrcut(){
    }    
    function _makeArrayTreeOptions( $fieldName, $key, &$ret, $prefix_orig, $prefix_curr = '' ) {
		if ( $key > 0 ) {
			$value = $this->_tree[$key]['obj']->getVar( $this->_myId );
			$ret[$value] = $prefix_curr . $this->_tree[$key]['obj']->getVar( $fieldName );
			$prefix_curr .= $prefix_orig;
            
		}
		if ( isset( $this->_tree[$key]['child'] ) && !empty( $this->_tree[$key]['child'] ) ) {
			foreach ( $this->_tree[$key]['child'] as $childkey ) {
				$this->_makeArrayTreeOptions( $fieldName, $childkey, $ret, $prefix_orig, $prefix_curr );
			}
		}
	}    
    function makeArrayTree( $fieldName, $prefix = '-', $key = 0) {
		$ret = array();
		$this->_makeArrayTreeOptions( $fieldName, $key, $ret, $prefix );
		return $ret;
	}
}
?>
