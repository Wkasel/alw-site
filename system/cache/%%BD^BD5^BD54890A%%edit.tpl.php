<?php /* Smarty version 2.6.18, created on 2013-12-16 00:49:31
         compiled from admin/edit.tpl */ ?>
<div class="inline" id="back">
		<a href="/admin/index/<?php echo $this->_tpl_vars['table']; ?>
/"><img src="/source/images/<?php echo $this->_tpl_vars['my_mode']; ?>
/back.gif" width="21" height="21" alt="" /></a>
		<span><?php echo $this->_tpl_vars['title']; ?>
 :: Save node</span>

	</div>
	<h2><?php echo $this->_tpl_vars['title']; ?>
 :: Save node </h2>
	<?php if (isset ( $this->_tpl_vars['errors'] )): ?><div id="error"><?php echo $this->_tpl_vars['errors']; ?>
</div><?php endif; ?>
	<form action="" method="post" enctype="multipart/form-data" id="test">
	<table cellpadding="0" cellspacing="0" class="inline">
	<thead>
		<tr class="thead">
			<td colspan="2"><?php if ($this->_tpl_vars['ship_icon']): ?><img src="/source/images/admin/quick.gif" "alt="TBD" /><?php else: ?><b>Save node</b> <?php endif; ?></td>
		</tr>
	</thead>
	<tbody>
	<br /><input type="submit" name="edit_object" value="Save node" /> &nbsp; <input type="button" onclick="javascript:history.back();" value="Cancel" /><br /><br />
	<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['field']):
?>
	<?php if ($this->_tpl_vars['field']['type'] != 'expression' && $this->_tpl_vars['field']['type'] != 'id'): ?>
		<tr>
			<?php if ($this->_tpl_vars['field']['type'] == 'input'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td><input type="text" value="<?php echo $this->_tpl_vars['filled'][$this->_tpl_vars['key']]; ?>
" class="fields" name="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['field']['disabled']): ?>DISABLED<?php endif; ?> <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?> /></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'password'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td><input type="password" value="" class="fields" name="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['field']['disabled']): ?>DISABLED<?php endif; ?> <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?> /></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'textarea'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td><textarea name="<?php echo $this->_tpl_vars['key']; ?>
" class="fields" <?php if ($this->_tpl_vars['field']['disabled']): ?>DISABLED<?php endif; ?> <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['filled'][$this->_tpl_vars['key']]; ?>
</textarea></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'editor'): ?>
				
				<td ><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td><textarea name="<?php echo $this->_tpl_vars['key']; ?>
"  id="<?php echo $this->_tpl_vars['key']; ?>
 class="fields" <?php if ($this->_tpl_vars['field']['disabled']): ?>DISABLED<?php endif; ?> <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['filled'][$this->_tpl_vars['key']]; ?>
</textarea></td>
				<script type="text/javascript">
				//<![CDATA[
				CKEDITOR.replace('<?php echo $this->_tpl_vars['key']; ?>
');
				//]]>
				</script>
				</td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'checkbox'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td><input type="hidden" name="<?php echo $this->_tpl_vars['key']; ?>
" value="off" /><input type="checkbox" name="<?php echo $this->_tpl_vars['key']; ?>
" class="fields" <?php if ($this->_tpl_vars['field']['disabled']): ?>DISABLED<?php endif; ?> <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['validate']): ?><?php if ($this->_tpl_vars['filled'][$this->_tpl_vars['key']] == 'on'): ?>checked="checked"<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['filled'][$this->_tpl_vars['key']] == 1): ?>checked="checked"<?php endif; ?><?php endif; ?> /></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'select' && $this->_tpl_vars['field']['from']['mode'] == 'from_table'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td>
					<select class="fields" name="<?php echo $this->_tpl_vars['key']; ?>
" <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?>>
						<?php $_from = $this->_tpl_vars['additional'][$this->_tpl_vars['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['select_node']):
?>
						<option value="<?php echo $this->_tpl_vars['select_node']['0']; ?>
" <?php if ($this->_tpl_vars['select_node']['0'] == $this->_tpl_vars['filled'][$this->_tpl_vars['key']]): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['select_node']['1']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'select' && $this->_tpl_vars['field']['from']['mode'] == 'simple_list'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td>
					<select class="fields" name="<?php echo $this->_tpl_vars['key']; ?>
" <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?>>
						<?php $_from = $this->_tpl_vars['field']['from']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value_id'] => $this->_tpl_vars['select_node']):
?>
						<option value="<?php echo $this->_tpl_vars['value_id']; ?>
" <?php if ($this->_tpl_vars['value_id'] == $this->_tpl_vars['filled'][$this->_tpl_vars['key']]): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['select_node']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'image' || $this->_tpl_vars['field']['type'] == 'file'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td><input class="fields" type="file" name="<?php echo $this->_tpl_vars['key']; ?>
" <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?> /><?php if ($this->_tpl_vars['field']['type'] == 'file'): ?><a href="<?php echo $this->_tpl_vars['files'][$this->_tpl_vars['key']]; ?>
" target="_blank"/><?php echo $this->_tpl_vars['files'][$this->_tpl_vars['key']]; ?>
</a><?php endif; ?> <?php if ($this->_tpl_vars['images'][$this->_tpl_vars['key']]): ?><img src="<?php echo $this->_tpl_vars['images'][$this->_tpl_vars['key']]; ?>
?rand=<?php echo $this->_tpl_vars['rand']; ?>
" /><?php endif; ?><?php if (isset ( $this->_tpl_vars['field']['delete_link'] )): ?><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/index/<?php echo $this->_tpl_vars['table']; ?>
/delete_file/?data=<?php echo $this->_tpl_vars['field']['delete_link']; ?>
"><img width="20" height="20" alt="Delete" src="/source/images/admin/del.gif"/></a><?php endif; ?></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'radio'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td>
				<?php $_from = $this->_tpl_vars['field']['alias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['radio_key'] => $this->_tpl_vars['radio_sec']):
?>
				<input class="fields" type="radio" name="<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['radio_key']; ?>
" <?php if ($this->_tpl_vars['field']['disabled']): ?>DISABLED<?php endif; ?> <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['filled'][$this->_tpl_vars['key']] == $this->_tpl_vars['radio_key']): ?>checked="checked"<?php endif; ?> /><?php echo $this->_tpl_vars['radio_sec']; ?>

				<?php endforeach; endif; unset($_from); ?>
				</td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'date'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td>
				<input class="fields" type="text" name="<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['filled'][$this->_tpl_vars['key']]; ?>
" id="<?php echo $this->_tpl_vars['key']; ?>
" /><button type="reset" id="<?php echo $this->_tpl_vars['key']; ?>
_button">...</button>
				<?php echo '
				<script type="text/javascript">
				    Calendar.setup({
				        inputField     :    "'; ?>
<?php echo $this->_tpl_vars['key']; ?>
<?php echo '",      // id of the input field
				        ifFormat       :    "'; ?>
<?php echo $this->_tpl_vars['field']['format']; ?>
<?php echo '",       // format of the input field
				        showsTime      :    true,            // will display a time selector
				        button         :    "'; ?>
<?php echo $this->_tpl_vars['key']; ?>
_button<?php echo '",   // trigger for the calendar (button ID)
				        singleClick    :    true,           // double-click mode
				        step           :    1                // show all years in drop-down boxes (instead of every other year as default)
				    });
				</script>
				'; ?>
	
				</td>
			<?php endif; ?>
		</tr>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
	</table>
	<?php if ($this->_tpl_vars['allow_edit']): ?>
	<?php if (! empty ( $this->_tpl_vars['child_table'] )): ?>
		<script type="text/javascript">
		<?php echo '
		function addChild(type, time) {
			setTimeout(function() {  
				$.ajax({
					type: "POST",
					url: "/admin/index/" + type + "/add_item/__nimple",
					data: "simple=true",
					success: function(content) {
						$(\'#child_holder_\' + type).append(content);
					}
				});
			}, time*500);
		}
		
		function getChild(type, id, time) {
			setTimeout(function() {  
				$.ajax({
					type: "POST",
					url: "/admin/index/" + type + "/edit_item/" + id + "/__simple",
					data: "simple=true",
					success: function(content) {
						$(\'#child_holder_\' + type).append(content);
					}
				});
			}, time*500);
		}
		
		function deleteNode(type, id) {
			$(\'#\' + type + \'_\' + id).remove();
			$.ajax({
				type: "POST",
				url: "/admin/index/" + type + "/delete_item/" + id + "/__simple",
				data: "simple=true",
				success: function(content) {}
			});
		}
		'; ?>

		</script>
		<?php $this->assign('i', '0'); ?>
		<?php $_from = $this->_tpl_vars['child_table']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['node']):
?>
			
			<?php if (! empty ( $this->_tpl_vars['child_nodes'][$this->_tpl_vars['key']] )): ?>
				<script type="text/javascript">
				<?php $_from = $this->_tpl_vars['child_nodes'][$this->_tpl_vars['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nds'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nds']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['nds']['iteration']++;
?>
					<?php $this->assign('name', ($this->_tpl_vars['i']++)); ?>
					getChild("<?php echo $this->_tpl_vars['key']; ?>
", <?php echo $this->_tpl_vars['row']->id; ?>
, <?php echo $this->_tpl_vars['i']; ?>
);
				<?php endforeach; endif; unset($_from); ?>
				</script>
			<?php endif; ?>
			<div><h3>Add <?php echo $this->_tpl_vars['node']['alias']; ?>
</h3></div>
			<div id="child_holder_<?php echo $this->_tpl_vars['key']; ?>
"></div>
			<div><input type="button" name="add_more" style="margin-top:-20px" value="Add one more <?php echo $this->_tpl_vars['node']['alias']; ?>
" onclick="addChild('<?php echo $this->_tpl_vars['key']; ?>
');" /></div>
			<br /><br />
			<script type="text/javascript">
				addChild('<?php echo $this->_tpl_vars['key']; ?>
', <?php echo $this->_tpl_vars['i']+1; ?>
);
			</script>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	<input type="submit" name="edit_object" value="Save node" /> &nbsp; <input type="button" onclick="javascript:history.back();" value="Cancel" />
	<?php endif; ?>
	</form>