<?php
// $Id: menu.class.php 2 2006-12-12 06:25:16Z BitC3R0 $
// --------------------------------------------------------------
// RMSOFT Common FrameWork 1.5
// Utilidades comunes para m�dulos de Red M�xico Soft
// CopyRight � 2005 - 2006. Red M�xico Soft
// Autor: BitC3R0
// http://www.redmexico.com.mx
// http://www.xoops-mexico.net
// --------------------------------------------
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License as
// published by the Free Software Foundation; either version 2 of
// the License, or (at your option) any later version.
// // This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
// // You should have received a copy of the GNU General Public
// License along with this program; if not, write to the Free
// Software Foundation, Inc., 59 Temple Place, Suite 330, Boston,
// MA 02111-1307 USA
// --------------------------------------------------------------
// @copyright: � 2005 - 2006. BitC3R0. Red M�xico Soft
// @author: BitC3R0
// @package: RMSOFT Framework 1.5
// @version: 0.1

/**
 * Esta clase permite generar menus al estilo de XOOPS EXM
 */
class bibliotecaMenu
{
    public  $Width              = 100;
    public  $Height             = 100;
    public  $BgColor            = 'transparent';
    public  $OverBgColor        = '#FFF6C1';
    public  $BorderWidth        = 1;
    public  $BorderColor        = '#CCCCCC';
    public  $OverBorderColor    = '#FF9900';
    public  $BorderStyle        = 'solid';
    public  $OverBorderStyle    = 'solid';
    public  $Font               = 'Tahoma, Arial, Helvetica';
    public  $FontColor          = '#666666';
    public  $OverFontColor      = '#1E90FF';
    public  $FontDeco           = 'none';
    public  $OverFontDeco       = 'none';
    public  $FontSize           = 11;
    public  $FontWeight         = 'bold';
    public  $FontExtra          = 'Tahoma, Arial, Helvetica';
    public  $FontExtraColor     = '#A98952';
    public  $OverFontExtraColor = '#0033FF';
    public  $FontExtraDeco      = 'underline';
    public  $OverFontExtraDeco  = 'underline';
    public  $FontExtraSize      = 9;
    public  $FontExtraWeight    = 'normal';
    public  $TextAlign          = 'center';
    private $_items             = array();

    /**
     * @param        $id
     * @param string $link
     * @param string $icon
     * @param string $name
     * @param string $extra
     * @param string $alt
     * @return bool
     */
    public function addItem($id, $link = '', $icon = '', $name = '', $extra = '', $alt = '')
    {
        if (isset($this->_items[$id])) {
            return false;
        }
        $rtn['link']       = $link;
        $rtn['icon']       = $icon;
        $rtn['name']       = $name;
        $rtn['extra']      = $extra;
        $rtn['alt']        = $alt;
        $this->_items[$id] = $rtn;

        return true;
    }

    /**
     * @param $id
     * @param $link
     * @return bool
     */
    public function setLink($id, $link)
    {
        if (isset($this->_items[$id])) {
            $this->_items[$id]['link'] = $link;

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @param $icon
     * @return bool
     */
    public function setIcon($id, $icon)
    {
        if (isset($this->_items[$id])) {
            $this->_items[$id]['icon'] = $icon;

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @param $name
     * @return bool
     */
    public function setName($id, $name)
    {
        if (isset($this->_items[$id])) {
            $this->_items[$id]['name'] = $name;

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @param $extra
     * @return bool
     */
    public function setExtra($id, $extra)
    {
        if (isset($this->_items[$id])) {
            $this->_items[$id]['extra'] = $extra;

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @param $alt
     * @return bool
     */
    public function setAlt($id, $alt)
    {
        if (isset($this->_items[$id])) {
            $this->_items[$id]['alt'] = $alt;

            return true;
        } else {
            return false;
        }
    }

    /**
     * @param bool $ws
     * @return string
     */
    public function getCSS($ws = true)
    {
        if ($ws) {
            $csscode = "<style type=\"text/css\">\n<!--";
        }
        $csscode .= "div.rmmenuicon{
				margin: 3px;
				font-family: $this->Font;
				text-align: " . $this->TextAlign . ';
			}
			div.rmmenuicon a { 
				display: block; float: left;
				height: ' . $this->Height . 'px !important;
				height: ' . $this->Height . 'px; 
				width: ' . $this->Width . 'px !important;
				width: ' . $this->Width . 'px; 
				vertical-align: middle; 
				text-decoration : none;
				border: ' . $this->BorderWidth . "px $this->BorderStyle $this->BorderColor;
				padding: 2px 5px 1px 5px;
				margin: 3px;
				color: $this->FontColor;
			}
			div.rmmenuicon img { margin-top: 8px; margin-bottom: 8px; }
			div.rmmenuicon a span {
				font-size: " . $this->FontSize . "px;
				font-weight: $this->FontWeight;
				display: block;
			}
			div.rmmenuicon a span.uno{
				font-size: " . $this->FontExtraSize . "px;
				font-weight: $this->FontExtraWeight;
				text-decoration: $this->FontExtraDeco;
				color: $this->FontExtraColor;
			}
			div.rmmenuicon a:hover{
				background-color: $this->OverBgColor;
				border: " . $this->BorderWidth . "px $this->BorderStyle $this->OverBorderColor;
				color: $this->OverFontColor;
			}
			div.rmmenuicon a:hover span{
				text-decoration: $this->OverFontDeco;
			}
			div.rmmenuicon a:hover span.uno{
				text-decoration: $this->OverFontExtraDeco;
				color: $this->OverFontExtraColor;
			}";
        if ($ws) {
            $csscode .= "\n-->\n</style>";
        }

        return $csscode;
    }

    /**
     * @return string
     */
    public function render()
    {
        $ret = "<div class='rmmenuicon'>";
        foreach ($this->_items as $k => $v) {
            $ret .= "<a href='$v[link]' title='" . ($v['alt'] != '' ? $v['alt'] : $v['name']) . "'>" . ($v['icon'] != '' ? "<img src='$v[icon]' alt='$v[name]' /> " : '');
            if ($v['name'] != '') {
                $ret .= "<span>$v[name]</span>";
            }
            if ($v['extra'] != '') {
                $ret .= "<span class='uno'>$v[extra]</span>";
            }
            $ret .= '</a>';
        }
        $ret .= "</div><div style='clear: both;'></div>";

        return $ret;
    }

    public function display()
    {
        echo $this->render();
    }
}
