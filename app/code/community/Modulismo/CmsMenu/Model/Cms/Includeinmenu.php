<?php

class Modulismo_CmsMenu_Model_Cms_Includeinmenu extends Varien_Object
{
    const STATUS_YES	= 1;
    const STATUS_NO		= 2;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_YES    => Mage::helper('cmsmenu')->__('yes'),
            self::STATUS_NO     => Mage::helper('cmsmenu')->__('no')
        );
    }
}