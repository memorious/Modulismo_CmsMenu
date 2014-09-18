<?php

class Modulismo_CmsMenu_Adminhtml_CmsmenuController extends Mage_Adminhtml_Controller_action
{
    
    public function typefetcherAction(){
        $level = $this->getRequest()->getParam('level');
        $response = null;
        $pages = Mage::getModel('cms/page')->getCollection()->addFieldToFilter('include_in_menu', array('eq' => 1))
        													->addFieldToFilter('menu_level', array('eq' =>  ((int)$level - 1), 'neq'	=> null));
        
        foreach($pages as $page){
        	$response .= "<option value=\"" . $page->getId() . "\">" . $page->getTitle() . "</option>";
        }
        $this->getResponse()->setBody($response);
    }
    
}