<?php
/**
 *
 * @package Litmus
 * @author Guillaume <guillaume@geelweb.org>
 * @copyright Copyright (c) 2010, Guillaume Luchet
 * @license http://opensource.org/licenses/bsd-license.php BSD License
 */

/**
 *
 * @package Litmus
 */
class Litmus_Result_Image
{
    public function load($xml)
    {
        if ($xml instanceof DOMElement) {
            $dom = $xml;
        } else {
            $dom = new DOMDocument();
            $dom->loadXML($xml);
        }
        $lst = $dom->getElementsByTagName('result_image');
        $col = array();
        foreach($lst as $item) {
            $obj = new Litmus_Result_Image();
            foreach ($item->childNodes as $child) {
                $property = $child->nodeName;
                $obj->$property = $child;
            }
            array_push($col, $obj);
        }
        return $col;

    }

    public function __set($property, $value)
    {
        switch ($property) {
            case 'image_type':
            case 'full_image':
            case 'thumbnail_image':
                $this->$property = $value->nodeValue;
                break;
        }
    }
}
