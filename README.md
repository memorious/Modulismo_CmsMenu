Modulismo_CmsMenu
=================

Small Magento Module that lets us create a simple cms page hierarchy in community, which doesn't have the EE Cms_Hierarchy module
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

Every CMS page admin section should have a new "Custom" fieldset in the "Content" tab that will let you create the simple heirarchy.
	See here: http://screencast.com/t/JWTLfp4r

Your navbar should now display the hierarchy you create in the admin.
	See here: http://screencast.com/t/o5WjEpenR