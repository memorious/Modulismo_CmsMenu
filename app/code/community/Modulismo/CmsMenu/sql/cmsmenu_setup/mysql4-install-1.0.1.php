<?php

	/* @var $installer Mage_Catalog_Model_Resource_Setup */
    $installer = Mage::getResourceModel('catalog/setup','default_setup');
	$installer->startSetup();
	
	$connection = $installer->getConnection();
	$table = $installer->getTable('cms/page');
	$connection->addColumn($table,'include_in_menu', 'smallint(6) NOT NULL DEFAULT 2');
	$connection->addColumn($table,'menu_level', 'smallint(6) NULL DEFAULT NULL');
	$connection->addColumn($table,'parent_node', 'smallint(6) NULL DEFAULT NULL');
	$installer->endSetup();

?>