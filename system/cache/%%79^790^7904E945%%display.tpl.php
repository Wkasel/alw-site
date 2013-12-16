<?php /* Smarty version 2.6.18, created on 2013-12-16 00:43:31
         compiled from admin/display.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'admin/display.tpl', 60, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
function is_submitted(event) {
	if(event.keyCode==13) {
		document.getElementById(\'filter_form\').submit();
	}
};
function saveInventory() {
    document.getElementById(\'form_delete\').action = "/admin/index/products/update_nodes/";
		document.getElementById(\'form_delete\').submit();
};
</script>
'; ?>


<div class="inline" id="back">
		<a href="javascript: history.go(-1);"><img src="/source/images/<?php echo $this->_tpl_vars['my_mode']; ?>
/back.gif" width="21" height="21" alt="" /></a>
		<span><?php echo $this->_tpl_vars['title']; ?>
 </span>

	</div>
	<h2><?php echo $this->_tpl_vars['title']; ?>
</h2>
	<form action="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/" method="post" id="filter_form" enctype="multipart/form-data">
 	<input type="hidden" name="apply_filter_x" value="true" />
 
<p style="text-align: right;">Nodes per page: 
	<?php if ($this->_tpl_vars['per_page'] == 30): ?><b>30</b><?php else: ?><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/set_per_page/30">30</a><?php endif; ?> | 
	<?php if ($this->_tpl_vars['per_page'] == 2): ?><b>60</b><?php else: ?><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/set_per_page/60">60</a><?php endif; ?> | 
	<?php if ($this->_tpl_vars['per_page'] == 90): ?><b>90</b><?php else: ?><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/set_per_page/90">90</a><?php endif; ?> |
	<?php if ($this->_tpl_vars['per_page'] == 150): ?><b>150</b><?php else: ?><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/set_per_page/150">150</a><?php endif; ?> |
	<?php if ($this->_tpl_vars['per_page'] == 200): ?><b>200</b><?php else: ?><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/set_per_page/200">200</a><?php endif; ?>
</p>
<b style="float:left;">Total nodes: <?php echo $this->_tpl_vars['global_total']; ?>
</b>
<?php if ($this->_tpl_vars['total'] > 1): ?>
	<p style="text-align: right;">
		<a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/0">First</a>&nbsp;
	<a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/<?php if ($this->_tpl_vars['current']-1 >= 0): ?><?php echo $this->_tpl_vars['current']-1; ?>
<?php else: ?><?php echo $this->_tpl_vars['current']; ?>
<?php endif; ?>">&lt;</a>&nbsp;
	<?php $this->assign('no_dots', 'yes'); ?>
	<?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['loop'] = is_array($_loop=$this->_tpl_vars['total']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['pages']['show'] = true;
$this->_sections['pages']['max'] = $this->_sections['pages']['loop'];
$this->_sections['pages']['start'] = $this->_sections['pages']['step'] > 0 ? 0 : $this->_sections['pages']['loop']-1;
if ($this->_sections['pages']['show']) {
    $this->_sections['pages']['total'] = min(ceil(($this->_sections['pages']['step'] > 0 ? $this->_sections['pages']['loop'] - $this->_sections['pages']['start'] : $this->_sections['pages']['start']+1)/abs($this->_sections['pages']['step'])), $this->_sections['pages']['max']);
    if ($this->_sections['pages']['total'] == 0)
        $this->_sections['pages']['show'] = false;
} else
    $this->_sections['pages']['total'] = 0;
if ($this->_sections['pages']['show']):

            for ($this->_sections['pages']['index'] = $this->_sections['pages']['start'], $this->_sections['pages']['iteration'] = 1;
                 $this->_sections['pages']['iteration'] <= $this->_sections['pages']['total'];
                 $this->_sections['pages']['index'] += $this->_sections['pages']['step'], $this->_sections['pages']['iteration']++):
$this->_sections['pages']['rownum'] = $this->_sections['pages']['iteration'];
$this->_sections['pages']['index_prev'] = $this->_sections['pages']['index'] - $this->_sections['pages']['step'];
$this->_sections['pages']['index_next'] = $this->_sections['pages']['index'] + $this->_sections['pages']['step'];
$this->_sections['pages']['first']      = ($this->_sections['pages']['iteration'] == 1);
$this->_sections['pages']['last']       = ($this->_sections['pages']['iteration'] == $this->_sections['pages']['total']);
?>
		<?php if ($this->_sections['pages']['iteration'] > 10 && $this->_sections['pages']['iteration'] > $this->_tpl_vars['current']+10 && $this->_sections['pages']['iteration']+10 < $this->_tpl_vars['total']): ?>
			<?php if ($this->_tpl_vars['no_dots'] == 'yes'): ?>...<?php endif; ?>
			<?php $this->assign('no_dots', 'no'); ?>
		<?php else: ?>
			<?php if ($this->_sections['pages']['iteration']+10 > $this->_tpl_vars['current'] && $this->_sections['pages']['iteration']-10 < $this->_tpl_vars['total']): ?>
				<?php if ($this->_sections['pages']['iteration']-1 == $this->_tpl_vars['current']): ?>
					<b><?php echo $this->_sections['pages']['iteration']; ?>
</b>&nbsp;
				<?php else: ?>
					<a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/<?php echo $this->_sections['pages']['iteration']-1; ?>
"><?php echo $this->_sections['pages']['iteration']; ?>
</a>&nbsp;
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endfor; endif; ?>
	<a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/<?php if ($this->_tpl_vars['current']+2 <= $this->_tpl_vars['total']): ?><?php echo $this->_tpl_vars['current']+1; ?>
<?php else: ?><?php echo $this->_tpl_vars['current']; ?>
<?php endif; ?>">&gt;</a>&nbsp;</p>
<?php endif; ?>	
<table cellpadding="0" cellspacing="0" class="inline">
	<thead>
  <?php if ($this->_tpl_vars['save']): ?>
		<tr>
			<td align="left">
        <input type="button" value="Save" name="edit_object" onclick="saveInventory()" onclick="saveInventory()">
			</td>
      <td  colspan="<?php echo count($this->_tpl_vars['headers']); ?>
">&nbsp;</td>
		</tr>
    <?php endif; ?>	
		<tr class="thead">
			<td style="width: 75px">&nbsp;</td>
			<?php $_from = $this->_tpl_vars['headers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?> 
			<td<?php if ($this->_tpl_vars['node']['name'] == $this->_tpl_vars['sort_by']): ?> id="order_<?php echo $this->_tpl_vars['sort_type']; ?>
"<?php endif; ?> <?php if (! empty ( $this->_tpl_vars['node']['width'] )): ?>width="<?php echo $this->_tpl_vars['node']['width']; ?>
" <?php endif; ?>>
				<a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/make_sort/<?php echo $this->_tpl_vars['node']['name']; ?>
/<?php if ($this->_tpl_vars['sort_by'] == $this->_tpl_vars['node']['name']): ?><?php if ($this->_tpl_vars['sort_type'] == 'desc'): ?>asc<?php else: ?>desc<?php endif; ?><?php else: ?>asc<?php endif; ?>/<?php echo $this->_tpl_vars['current']; ?>
/"><?php echo $this->_tpl_vars['node']['value']; ?>
</a>
			</td>		
			<?php endforeach; endif; unset($_from); ?>		
		</tr>
		<tr>	
			<td>
				<input type="image" src="/source/images/admin/f-on.gif" style="width:20px; height:20px" alt="Apply filter" name="apply_filter" />
				<input type="image" onclick="deleteFilter(); this.form.submit();" src="/source/images/admin/f-off.gif" style="width:20px; height:20px" alt="Discard filter" name="discard_filter" value="yes" />

			</td>
			<?php $_from = $this->_tpl_vars['header_names']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
			<td>
				<input type="text" name="<?php echo $this->_tpl_vars['node']; ?>
" onKeyDown="is_submitted(event)" class="field" style="width: 100%" value="<?php if (isset ( $this->_tpl_vars['filter_values'][$this->_tpl_vars['node']] )): ?><?php echo $this->_tpl_vars['filter_values'][$this->_tpl_vars['node']]; ?>
<?php endif; ?>" />
			</td>	
			<?php endforeach; endif; unset($_from); ?>	
		</tr>
	</thead>
	</form>
	<form action="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/delete_nodes/" id="form_delete" method="POST">
  <?php if (! $this->_tpl_vars['nofoot']): ?>
	<tfoot>
		<tr>
			<td align="right"><input type="submit" value="Del" style="border:1px solid #000; margin-right:15px;" name="delete" /><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/add_item/"><img src="/source/images/admin/add.gif" width="20" height="20" alt="" /></a></td>

			<td colspan="<?php echo count($this->_tpl_vars['headers']); ?>
">
				<div><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/add_item/">Add node</a></div>
			</td>
		</tr>
	</tfoot>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['save']): ?>
	<tfoot>
		<tr>
			<td align="left">
        <input type="button" value="Save" name="edit_object" onclick="saveInventory()" style="width: 100%;">
			</td>
      <td  colspan="<?php echo count($this->_tpl_vars['headers']); ?>
">&nbsp;</td>
		</tr>
	</tfoot>
  <?php endif; ?>
	<tbody class="tbody overed">
	
	
	<?php $_from = $this->_tpl_vars['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rows_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rows_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['rows_list']['iteration']++;
?>
	<tr style="background-color: #<?php if ($this->_foreach['rows_list']['iteration']%2): ?>FFF<?php else: ?>f8f8f8<?php endif; ?>;">
		<td>
			<input type="checkbox" style="margin-top:5px; margin-right:5px;"  name="delete[]" value="<?php echo $this->_tpl_vars['row']->table_id; ?>
" />
			<a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['alias_talbe']; ?>
/edit_item/<?php echo $this->_tpl_vars['row']->table_id; ?>
/<?php echo $this->_tpl_vars['current']; ?>
/"><img src="/source/images/admin/edit.gif" width="20" height="20" alt="Edit" /></a>
			<?php if (! $this->_tpl_vars['nodel']): ?><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['alias_talbe']; ?>
/delete_item/<?php echo $this->_tpl_vars['row']->table_id; ?>
/<?php echo $this->_tpl_vars['current']; ?>
/" onclick="javascript:return delItem(<?php echo $this->_tpl_vars['row']->table_id; ?>
);"><img width="20" height="20" alt="Delete" src="/source/images/admin/del.gif"/></a><?php endif; ?>
			<?php if ($this->_tpl_vars['sortable']): ?><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['alias_talbe']; ?>
/move_up/<?php echo $this->_tpl_vars['row']->table_id; ?>
/<?php echo $this->_tpl_vars['current']; ?>
/"><img src="/source/images/admin/move_up.gif" /></a>&nbsp;&nbsp;
			<a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['alias_talbe']; ?>
/move_down/<?php echo $this->_tpl_vars['row']->table_id; ?>
/<?php echo $this->_tpl_vars['current']; ?>
/"><img src="/source/images/admin/move_down.gif" /></a><?php endif; ?>
		</td>
		<?php $_from = $this->_tpl_vars['row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['f'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['f']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['column'] => $this->_tpl_vars['row_field']):
        $this->_foreach['f']['iteration']++;
?>	
			<?php if ($this->_tpl_vars['column'] != 'table_id'): ?>
				<td><?php if (in_array ( $this->_tpl_vars['column'] , $this->_tpl_vars['input_field'] )): ?><input type="hidden" name="product_id[]" value="<?php echo $this->_tpl_vars['row']->table_id; ?>
"><input name="available_inventory[]" type="text" value="<?php echo $this->_tpl_vars['row_field']; ?>
" style="width:100%"><?php else: ?><?php echo $this->_tpl_vars['row_field']; ?>
<?php endif; ?></td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>	
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
</form>
<?php if ($this->_tpl_vars['total'] > 1): ?>
	<p style="text-align: right;"> 
		<a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/0">First</a>&nbsp;
	<a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/<?php if ($this->_tpl_vars['current']-1 >= 0): ?><?php echo $this->_tpl_vars['current']-1; ?>
<?php else: ?><?php echo $this->_tpl_vars['current']; ?>
<?php endif; ?>">&lt;</a>&nbsp;
	<?php $this->assign('no_dots', 'yes'); ?>
	<?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['loop'] = is_array($_loop=$this->_tpl_vars['total']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['pages']['show'] = true;
$this->_sections['pages']['max'] = $this->_sections['pages']['loop'];
$this->_sections['pages']['start'] = $this->_sections['pages']['step'] > 0 ? 0 : $this->_sections['pages']['loop']-1;
if ($this->_sections['pages']['show']) {
    $this->_sections['pages']['total'] = min(ceil(($this->_sections['pages']['step'] > 0 ? $this->_sections['pages']['loop'] - $this->_sections['pages']['start'] : $this->_sections['pages']['start']+1)/abs($this->_sections['pages']['step'])), $this->_sections['pages']['max']);
    if ($this->_sections['pages']['total'] == 0)
        $this->_sections['pages']['show'] = false;
} else
    $this->_sections['pages']['total'] = 0;
if ($this->_sections['pages']['show']):

            for ($this->_sections['pages']['index'] = $this->_sections['pages']['start'], $this->_sections['pages']['iteration'] = 1;
                 $this->_sections['pages']['iteration'] <= $this->_sections['pages']['total'];
                 $this->_sections['pages']['index'] += $this->_sections['pages']['step'], $this->_sections['pages']['iteration']++):
$this->_sections['pages']['rownum'] = $this->_sections['pages']['iteration'];
$this->_sections['pages']['index_prev'] = $this->_sections['pages']['index'] - $this->_sections['pages']['step'];
$this->_sections['pages']['index_next'] = $this->_sections['pages']['index'] + $this->_sections['pages']['step'];
$this->_sections['pages']['first']      = ($this->_sections['pages']['iteration'] == 1);
$this->_sections['pages']['last']       = ($this->_sections['pages']['iteration'] == $this->_sections['pages']['total']);
?>
		<?php if ($this->_sections['pages']['iteration'] > 10 && $this->_sections['pages']['iteration'] > $this->_tpl_vars['current']+10 && $this->_sections['pages']['iteration']+10 < $this->_tpl_vars['total']): ?>
			<?php if ($this->_tpl_vars['no_dots'] == 'yes'): ?>...<?php endif; ?>
			<?php $this->assign('no_dots', 'no'); ?>
		<?php else: ?>
			<?php if ($this->_sections['pages']['iteration']+10 > $this->_tpl_vars['current'] && $this->_sections['pages']['iteration']-10 < $this->_tpl_vars['total']): ?>
				<?php if ($this->_sections['pages']['iteration']-1 == $this->_tpl_vars['current']): ?>
					<b><?php echo $this->_sections['pages']['iteration']; ?>
</b>&nbsp;
				<?php else: ?>
					<a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/<?php echo $this->_sections['pages']['iteration']-1; ?>
"><?php echo $this->_sections['pages']['iteration']; ?>
</a>&nbsp;
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endfor; endif; ?>
	<a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/<?php if ($this->_tpl_vars['current']+2 <= $this->_tpl_vars['total']): ?><?php echo $this->_tpl_vars['current']+1; ?>
<?php else: ?><?php echo $this->_tpl_vars['current']; ?>
<?php endif; ?>">&gt;</a>&nbsp;</p>
<?php endif; ?>	
