<?php
 
class Modulismo_CmsMenu_Model_Cms_Observer
{
    public function addCmsFields(Varien_Event_Observer $observer)
    {

        $model = Mage::registry('cms_page');
        $form = $observer->getForm();
        $fieldset = $form->addFieldset('franjuvis_content_fieldset', array('legend'=>Mage::helper('cmsmenu')->__('Custom'),'class'=>'fieldset-wide'));
        
        $include_in_menu_options = Mage::getSingleton('cmsmenu/cms_includeinmenu')->getOptionArray();
        $fieldset->addField('include_in_menu', 'select', array(
            'name'      => 'include_in_menu',
            'label'     => Mage::helper('cmsmenu')->__('Include In Navigation Menu'),
            'title'     => Mage::helper('cmsmenu')->__('Include In Navigation Menu'),
            'disabled'  => false,
			'values'	=> $include_in_menu_options,
        	'value' 	=> $model->getIncludeInMenu(),
        ));
        
        $menu_level_options = Mage::getSingleton('cmsmenu/cms_menulevel')->getOptionArray();
        $fetcher = Mage::helper("adminhtml")->getUrl("cmsmenu/adminhtml_cmsmenu/typefetcher/");
        $fieldset->addField('menu_level', 'select', array(
        		'name'      => 'menu_level',
        		'label'     => Mage::helper('cmsmenu')->__('Navigation Menu Level'),
        		'title'     => Mage::helper('cmsmenu')->__('Navigation Menu Level'),
        		'disabled'  => false,
        		'onchange'  => 'typeFetcher(\'' . $fetcher . '\')',
        		'values'	=> $menu_level_options,
        		'value' 	=> $model->getMenuLevel()
        ));
        
        $fieldset->addField('parent_node', 'select', array(
        		'name'      => 'parent_node',
        		'label'     => Mage::helper('cmsmenu')->__('Parent Node'),
        		'title'     => Mage::helper('cmsmenu')->__('Parent Node'),
        		'disabled'  => false,
        		'value'		=> $model->getParentNode()
        ));
 
    }
}