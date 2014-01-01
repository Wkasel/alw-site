<?php /* Smarty version 2.6.18, created on 2014-01-01 12:11:21
         compiled from view_all.tpl */ ?>
<div class="prod_phot"> <!-- products photo -->
	
	</div> <!-- end products photo -->
	<div class="bread"> <!-- bread crumbs -->
		<span style="font-size:17px;"><a href="/content/products/" style="color:#000;">PRODUCTS</a> / <span>VIEW ALL</span></span>
	</div> <!-- end bread crumbs -->
	

	<div class="prods clearfix">
	<?php $_from = $this->_tpl_vars['objects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
	<div>
		<?php if ($this->_tpl_vars['node']->quick_ship): ?>
			<img class="q" src="/source/images/quick.gif" alt="Quick ship" />
		<?php endif; ?>
		<a href="/content/product/<?php echo $this->_tpl_vars['node']->products_id; ?>
/">
			<img src="/source/images/site_images/preview/<?php echo $this->_tpl_vars['node']->p_image1; ?>
" style="max-width:126px;" alt="<?php echo $this->_tpl_vars['node']->p_name; ?>
" />
		</a>
		<a href="/content/product/<?php echo $this->_tpl_vars['node']->products_id; ?>
/" style="font-size:12px;"><?php echo $this->_tpl_vars['node']->p_name; ?>
</a></div>
	<?php endforeach; endif; unset($_from); ?>
	</div>
</div>
</div>