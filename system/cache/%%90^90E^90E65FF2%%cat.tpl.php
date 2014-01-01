<?php /* Smarty version 2.6.18, created on 2014-01-01 11:50:13
         compiled from cat.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', 'cat.tpl', 10, false),)), $this); ?>
<div class="prod_phot"> <!-- products photo -->
	<ul class="clearfix">
		<?php $_from = $this->_tpl_vars['cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
		<li>
			<a<?php if ($this->_tpl_vars['current_cat'] == $this->_tpl_vars['node']->pc_name): ?> class="active"<?php endif; ?> href="/content/cat/<?php echo $this->_tpl_vars['node']->pc_name; ?>
/">
				<img src="/source/images/cats/<?php echo $this->_tpl_vars['node']->pc_image; ?>
" alt="<?php echo $this->_tpl_vars['node']->pc_name; ?>
" />
				
				<span class="clearfix">
					<img src="/source/images/arrow.png" alt="" />
					<?php echo ((is_array($_tmp=$this->_tpl_vars['node']->pc_name)) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>

				</span>
				<img class="span_bg2" src="/source/images/prod_span_bg2.gif" alt="" />
			</a>
		</li>
	 <?php endforeach; endif; unset($_from); ?>
	</ul>
	</div> <!-- end products photo -->
	<div class="bread"> <!-- bread crumbs -->
		<span style="font-size:17px;"><a href="/content/products/" style="color:#000;">PRODUCTS</a> / <span><?php echo ((is_array($_tmp=$this->_tpl_vars['cat_info']->pc_name)) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
 </span></span>
	</div> <!-- end bread crumbs -->
	
	<br />
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