<?php /* Smarty version 2.6.18, created on 2014-01-01 12:18:27
         compiled from search.tpl */ ?>

	<div class="bread"> <!-- bread crumbs -->
		<a href="/content/products/" style="color:#000;">PRODUCTS</a> / <span>Search results for "<?php echo $this->_tpl_vars['keyword']; ?>
"</span>
	</div> <!-- end bread crumbs -->
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
		<div style="font-weight:bold; float:right; color:#000; margin-right:32px; margin-top:-10px;">
			<?php if ($this->_tpl_vars['page'] > 1): ?>&nbsp;<a style="color:#000;" href="/content/search/1/?keyword=<?php echo $this->_tpl_vars['keyword']; ?>
"><<</a>&nbsp;&nbsp;<a style="color:#000;" href="/content/search/<?php echo $this->_tpl_vars['prev']; ?>
/?keyword=<?php echo $this->_tpl_vars['keyword']; ?>
"><</a><?php endif; ?>
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
							<a style="color:#000;" href="/content/search/<?php echo $this->_sections['foo']['iteration']; ?>
/?keyword=<?php echo $this->_tpl_vars['keyword']; ?>
" title="<?php echo $this->_sections['foo']['iteration']; ?>
"><?php echo $this->_sections['foo']['iteration']; ?>
</a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endfor; endif; ?>
			<?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['total_nodes']): ?>&nbsp;<a style="color:#000;" href="/content/search/<?php echo $this->_tpl_vars['next']; ?>
/?keyword=<?php echo $this->_tpl_vars['keyword']; ?>
">></a>&nbsp;&nbsp;
			<a style="color:#000;" href="/content/search/<?php echo $this->_tpl_vars['total_nodes']; ?>
/?keyword=<?php echo $this->_tpl_vars['keyword']; ?>
">>></a>&nbsp;&nbsp;<?php endif; ?>
		</div>
	<?php endif; ?>
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
/"><?php echo $this->_tpl_vars['node']->p_name; ?>
</a></div>
	<?php endforeach; endif; unset($_from); ?>
	<?php if (count ( $this->_tpl_vars['objects'] ) == 0): ?>
	<h3 style="color:#000;">No Results Found</h3>
	<?php endif; ?>
	</div>
</div>
</div>