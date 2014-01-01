<?php /* Smarty version 2.6.18, created on 2014-01-01 11:52:11
         compiled from product.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', 'product.tpl', 16, false),)), $this); ?>
<script language="javascript" type="text/javascript" src="/source/js/nf.js"></script>
<script type="text/javascript">
<?php echo '
function getFile(select_name) {
	var file = $(\'#\'+ select_name + \' option:selected\').val();
	if (file) {
		window.location = \'/content/get_file/?file=\' + file;
	}
}
	$(function(){
		$("#slider_on_prod").slider({w:450,h:451});
	})
'; ?>

</script>
<div class="bread"> <!-- bread crumbs -->
	<a href="/content/products/" style="color:#000; font-size:17px;">PRODUCTS</a> / <span><a href="/content/cat/<?php echo $this->_tpl_vars['cat']->pc_name; ?>
/" style="color:#000;  font-size:17px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['cat']->pc_name)) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></span> / <span style="font-size:17px;"><?php echo $this->_tpl_vars['product']->p_name; ?>
</span>
</div> <!-- end bread crumbs -->
<div class="clearfix">
	<div class="phots">
		<div id="slider_on_prod" class="slider">
			<div class="prev">
				<?php $_from = $this->_tpl_vars['product']->reversed_images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['images'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['images']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['images']['iteration']++;
?>
				<img src="/source/images/site_images/<?php echo $this->_tpl_vars['node']; ?>
" />
				<?php endforeach; endif; unset($_from); ?>
			</div>
			<?php if (count ( $this->_tpl_vars['product']->reversed_images ) != 1): ?>
			<div class="checker clearix">
				<div class="btns">
					<ul class="clearix">
						<?php $_from = $this->_tpl_vars['product']->reversed_images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['images'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['images']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['images']['iteration']++;
?>
						<li><a href="#"></a></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="descr clearfix">
		<h1><?php echo $this->_tpl_vars['product']->p_name_ex; ?>
</h1>
		<h2><?php echo $this->_tpl_vars['product']->p_name; ?>
</h2>
		<?php if ($this->_tpl_vars['product']->quick_ship): ?>
      <p>Available Inventory: <?php echo $this->_tpl_vars['product']->available_inventory; ?>
</p>
      <br />
		<?php endif; ?>
		<p><?php echo $this->_tpl_vars['product']->p_desc; ?>
</p>
		<br />
		<a class="pdf" href="/source/files/main_files/<?php echo $this->_tpl_vars['product']->p_download; ?>
" target="_blank">DOWNLOAD SPEC SHEET</a>
		<a class="btn" href="/source/files/main_files/<?php echo $this->_tpl_vars['product']->p_install; ?>
" target="_blank">INSTALLATION INSTRUCTIONS</a>
		<?php if ($this->_tpl_vars['product']->configurator != ""): ?><a class="btn" href="<?php echo $this->_tpl_vars['product']->configurator; ?>
" target="_blank">CONFIGURATOR</a><?php endif; ?>
		<form action="" method="post">
			<div style="padding:0 0 0 9px;">
				<select class="styled" name="asd" id="link" style="width:350px; font-size:13px; font-weight:bold;">
					<option value="">BIM/Photometry Downloads</option>
					<?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
					<option value="<?php echo $this->_tpl_vars['node']->file_name; ?>
"><?php echo $this->_tpl_vars['node']->file_desc; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</div>
		</form>
		<a class="arr" onclick="getFile('link'); return false;" href="#"><img src="/source/images/btn_download.jpg" alt="" /></a>
		<?php if (count ( $this->_tpl_vars['matrix'] ) > 0): ?>
		<br />
		<form action="" method="post" style="margin-top:3px;">
			<div style="padding:0 0 0 9px;">
				<select class="styled" name="asd" id="matrix" style="width:350px; font-size:13px; font-weight:bold;">
					<option value="">LED MATRIX</option>
					<?php $_from = $this->_tpl_vars['common_matrix']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
					<option value="<?php echo $this->_tpl_vars['node']->file_name; ?>
"><?php echo $this->_tpl_vars['node']->file_desc; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
					<?php $_from = $this->_tpl_vars['matrix']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
					<option value="<?php echo $this->_tpl_vars['node']->file_name; ?>
"><?php echo $this->_tpl_vars['node']->file_desc; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</div>
		</form>
		<a class="arr" onclick="getFile('matrix'); return false;" href="#"><img src="/source/images/btn_download.jpg" alt="" /></a>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['product']->quick_ship): ?>
			<div class="clearfix" style="clear:both;">
				<div style="float:left;"><a class="pdf" href="/source/files/main_files/<?php echo $this->_tpl_vars['product']->quick_ship_pdf; ?>
" target="_blank">QUICK SHIP SPEC SHEET</a></div>
			</div>
		<?php endif; ?>
	</div>
</div>