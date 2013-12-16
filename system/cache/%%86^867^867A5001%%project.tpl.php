<?php /* Smarty version 2.6.18, created on 2013-12-16 01:44:12
         compiled from project.tpl */ ?>
<link href="/source/css/form.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="/source/js/niceform.js"></script>
<script type="text/javascript">
<?php echo '
function getFile() {
	var file = $(\'select[@name=links] option:selected\').val();
	if (file) {
		window.location = \'/content/get_file/?file=\' + file;
	}
}
$(function(){
	$("#project_slider").slider({w:451,h:450});
});
'; ?>

</script>
<div class="bread"> <!-- bread crumbs -->
	<a href="/content/products/" style="color:#FFF;">CUSTOM PROJECTS</a> / <?php echo $this->_tpl_vars['product']->p_name; ?>

</div> <!-- end bread crumbs -->
<div class="clearfix">
	<div class="phots">

		<div id="project_slider" class="slider">
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
	</div>
	<div class="descr clearfix">
		<h1><?php echo $this->_tpl_vars['product']->p_name; ?>
</h1>
		<h2><?php echo $this->_tpl_vars['product']->p_name_ex; ?>
</h2>
		<p>
		<b>Series:</b> <?php echo $this->_tpl_vars['product']->p_series; ?>
<br />
		<b>Specifier:</b> <?php echo $this->_tpl_vars['product']->p_spec; ?>
<br />
		<b>Location:</b> <?php echo $this->_tpl_vars['product']->p_location; ?>
</p>
		<br />
		<?php echo $this->_tpl_vars['product']->p_desc; ?>

		<br />
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
		<div style="font-weight:bold; float:right; color:#fff; margin-right:32px; margin-top:260px; font-size:13px;">
			<?php if ($this->_tpl_vars['page'] > 1): ?>&nbsp;<a style="color:#FFF;" href="/content/project_show/1/"><<</a>&nbsp;&nbsp;<a style="color:#FFF;" href="/content/project_show/<?php echo $this->_tpl_vars['prev']; ?>
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
							<a style="color:#FFF;" href="/content/project_show/<?php echo $this->_sections['foo']['iteration']; ?>
/" title="<?php echo $this->_sections['foo']['iteration']; ?>
"><?php echo $this->_sections['foo']['iteration']; ?>
</a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endfor; endif; ?>
			<?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['total_nodes']): ?>&nbsp;<a style="color:#FFF;" href="/content/project_show/<?php echo $this->_tpl_vars['next']; ?>
/">></a>&nbsp;&nbsp;
			<a style="color:#FFF;" href="/content/project_show/<?php echo $this->_tpl_vars['total_nodes']; ?>
/">>></a>&nbsp;&nbsp;<?php endif; ?>
		</div>
	<?php endif; ?>
</div>