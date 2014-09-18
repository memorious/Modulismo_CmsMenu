<?php

class Modulismo_CmsMenu_Helper_Data extends Mage_Core_Helper_Abstract{

	public function prepareCmsMenu(){
		$cms_model = Mage::getModel('cms/page');
		$html = '';
                $store_id = Mage::helper('core')->getStoreId();
		$entire_cms_collection = $cms_model->getCollection()->addStoreFilter($store_id)
                                                                    ->addFieldToSelect('title')
                                                                    ->addFieldToSelect('page_id')
                                                                    ->addFieldToSelect('identifier')
                                                                    ->addFieldToSelect('include_in_menu')
                                                                    ->addFieldToSelect('menu_level')
                                                                    ->addFieldToSelect('parent_node')
                                                                    ->addFieldToFilter('include_in_menu', array('eq' => 1));
		
		$first_level_collection = $entire_cms_collection->getItemsByColumnValue('menu_level','1');
		$nav_counter = 3;
		$subnav_counter = 1;
		$subsubnav_counter = 1;
		foreach($first_level_collection as $first_level){
			$second_level_collection = $entire_cms_collection->getItemsByColumnValue('parent_node', (int) $first_level->getPageId());
			$first_has_children_flag = false;
			if(count($second_level_collection)){
				$first_has_children_flag = true;
				$first_has_children = 'has-children';
			}
			$html .= '<li class="level0 nav-' . $nav_counter . ' first parent"><a href="' . Mage::getBaseUrl() . $first_level->getIdentifier() .'" class="level0 ' . ($first_has_children_flag ? $first_has_children : '') . '">' . $first_level->getTitle() . '</a>';
			
			if($first_has_children_flag){
				$html .= '<ul class="level0">';
			}
			foreach($second_level_collection as $second_level){
				
				$third_level_collection = $entire_cms_collection->getItemsByColumnValue('parent_node', (int) $second_level->getPageId());
				$second_has_children_flag = false;
				if(count($third_level_collection)){
					$second_has_children_flag = true;
					$second_has_children = 'has-children';
				}
				$html .= '<li class="level1 nav-' . $nav_counter . '-' . $subnav_counter . '"><a class="level1 ' . ($second_has_children_flag ? $second_has_children : '')  . '" href="' . Mage::getBaseUrl() . $second_level->getIdentifier() . '">' . $second_level->getTitle() . '</a></li>';
				
				if($second_has_children_flag){
					$html .= '<ul class="level1">';
				}
				foreach($third_level_collection as $third_level){
					$html .= '<li class="level2 nav-' . $nav_counter . '-' . $subnav_counter . '-' . $subsubnav_counter . '"><a class="level2" href="' . Mage::getBaseUrl() . $third_level->getIdentifier() . '">' . $third_level->getTitle() . '</a></li>';
					$subsubnav_counter++;
				}
				if($second_has_children_flag){
					$html .= '</ul>';
				}
				$subnav_counter++;
			}
			if($first_has_children_flag){
				$html .= '</ul>';
			}
			$nav_counter++;
		}
		return $html;
	}
}