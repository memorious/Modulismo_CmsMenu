<?php

class Modulismo_CmsMenu_Model_Cms_Menulevel extends Varien_Object
{
    const LEVEL_ONE	= 1;
    const LEVEL_TWO	= 2;
    const LEVEL_THREE	= 3;

    static public function getOptionArray()
    {
        return array(
            self::LEVEL_ONE    	=> Mage::helper('cmsmenu')->__('First Level'),
            self::LEVEL_TWO	=> Mage::helper('cmsmenu')->__('Second Level'),
            self::LEVEL_THREE	=> Mage::helper('cmsmenu')->__('Third Level')
        );
    }
}