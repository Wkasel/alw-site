<?php /* Smarty version 2.6.18, created on 2014-01-01 11:46:09
         compiled from featured.tpl */ ?>
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
	<a href="/content/products/" style="color:#000;">FEATURED PRODUCTS</a> / <?php echo $this->_tpl_vars['product']->p_name; ?>

</div> <!-- end bread crumbs -->
<div class="clearfix">
	<div class="phots">
	<?php if (count ( $this->_tpl_vars['product']->reversed_images ) > 1): ?>
		<div id="slider_on_featured" class="slider">
			<div class="prev">
				<?php $_from = $this->_tpl_vars['product']->reversed_images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['images'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['images']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['images']['iteration']++;
?>
				<img src="/source/images/site_images/<?php echo $this->_tpl_vars['node']; ?>
" alt="" />
				<?php endforeach; endif; unset($_from); ?>
			</div>
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
		</div>
	<?php else: ?>
	<img src="/source/images/site_images/<?php echo $this->_tpl_vars['product']->reversed_images[0]; ?>
" style="max-width:450px;" alt="" />  
	<?php endif; ?>
	</div>
	<div class="descr clearfix">
		<h1><?php echo $this->_tpl_vars['product']->p_name; ?>
</h1>
		<h2><?php echo $this->_tpl_vars['product']->p_name_ex; ?>
</h2>
		<p><?php echo $this->_tpl_vars['product']->p_desc; ?>
</p>
		<br />
		<a class="pdf" href="/source/files/main_files/<?php echo $this->_tpl_vars['product']->p_download; ?>
" target="_blank">DOWNLOAD SPEC SHEET</a>
		<a class="btn" href="/source/files/main_files/<?php echo $this->_tpl_vars['product']->p_install; ?>
" target="_blank">INSTALLATION INSTRUCTIONS</a>
		<?php if ($this->_tpl_vars['product']->configurator != ""): ?><a class="btn" href="<?php echo $this->_tpl_vars['product']->configurator; ?>
" target="_blank">CONFIGURATOR</a><?php endif; ?>
		<form style='margin-right:5px;' action="" method="post">
			<div style="padding: 0 0 0 9px;">
				<select class="styled" name="asd" id="link" style="width:248px;">
					<option value="">PHOTOMETRY LINK</option>
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
		<a onclick="getFile('link'); return false;" href="#"><img src="/source/images/btn_download.jpg" alt="" /></a>
		<?php if (count ( $this->_tpl_vars['matrix'] ) > 0): ?>
		<br />
		<form action="" method="post" style="margin-top:3px;">
			<div style="padding:0 0 0 9px;">
				<select class="styled" name="asd" id="matrix" style="width:250px; padding-right:10px; font-size:13px; font-weight:bold;">
					<option value="">LED MATRIX</option>
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
<?php if ($this->_tpl_vars['total_nodes'] > 1): ?>
		<?php if ($this->_tpl_vars['page']+1 > $this->_tpl_vars['total_nodes']): ?>
			<?php $this->assign('next', ($this->_tpl_vars['page'])); ?>
		<?php else: ?>
			<?php $this->assign('next', ($this->_tpl_vars['page']+1)); ?>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['page']-1 > 0): ?>
			<?php $this->assign('prev', ($this->_tpl_vars['page']-1)); ?>
		<?php else: ?>
			<?php $this->assign('prev', 0); ?>
		<?php endif; ?> 
		<div style="font-weight:bold; float:right; color:#000; margin-right:32px; margin-top:90px; font-size:13px;">
			<?php if ($this->_tpl_vars['page'] > 1): ?>&nbsp;<a style="color:#000;" href="/content/featured_show/1/"><<</a>&nbsp;&nbsp;<a style="color:#000;" href="/content/featured_show/<?php echo $this->_tpl_vars['prev']; ?>
/"><</a><?php endif; ?>
			<?php $this->assign('no_dots', 'yes'); ?>
			<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)0;
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['total_nodes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
				<?php if ($this->_sections['foo']['iteration'] > 5 && $this->_sections['foo']['iteration'] > $this->_tpl_vars['page']+5 && $this->_sections['foo']['iteration']+5 < $this->_tpl_vars['total_nodes']): ?>
					<?php if ($this->_tpl_vars['no_dots'] == 'yes'): ?>...<?php endif; ?>
					<?php $this->assign('no_dots', 'no'); ?>
				<?php else: ?>	
					<?php if ($this->_sections['foo']['iteration']+5 > $this->_tpl_vars['page'] && $this->_sections['foo']['iteration']-5 < $this->_tpl_vars['total_nodes']): ?>
						<?php if ($this->_sections['foo']['iteration'] == $this->_tpl_vars['page']): ?>
							<span style="color:#FF0000"><?php echo $this->_sections['foo']['iteration']; ?>
</span>
						<?php else: ?>
							<a style="color:#000;" href="/content/featured_show/<?php echo $this->_sections['foo']['iteration']; ?>
/" title="<?php echo $this->_sections['foo']['iteration']; ?>
"><?php echo $this->_sections['foo']['iteration']; ?>
</a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endfor; endif; ?>
			<?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['total_nodes']): ?>&nbsp;<a style="color:#000;" href="/content/featured_show/<?php echo $this->_tpl_vars['next']; ?>
/">></a>&nbsp;&nbsp;
			<a style="color:#000;" href="/content/featured_show/<?php echo $this->_tpl_vars['total_nodes']; ?>
/">>></a>&nbsp;&nbsp;<?php endif; ?>
		</div>
	<?php endif; ?>
</div>