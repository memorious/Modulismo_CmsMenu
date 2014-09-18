Modulismo_CmsMenu
=================

Small Magento Module that let's us create a simple cms page hierarchy in community, which doesn't have the EE Cms_Hierarchy module
Once this module is installed, simply change your theme's "topmenu.html"
from:

	<?php $_menu = $this->getHtml('level-top') ?>

	<?php if($_menu): ?>
	    <nav id="nav">
	        <ol class="nav-primary">
	            <?php echo $_menu ?>
	        </ol>
	    </nav>
	<?php endif ?>

to:

	<?php $_menu = $this->getHtml('level-top') ?>
	<?php $_cms_menu = Mage::helper('cmsmenu')->prepareCmsMenu(); ?>
	<?php if($_menu || $_cms_menu ): ?>
	    <nav id="nav">
	        <ol class="nav-primary">
	            <?php echo $_menu ?>
	            <?php echo $_cms_menu; ?>
	        </ol>
	    </nav>
	<?php endif ?>