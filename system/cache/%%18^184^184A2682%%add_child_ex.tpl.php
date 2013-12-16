<?php /* Smarty version 2.6.18, created on 2013-12-16 00:49:34
         compiled from admin/add_child_ex.tpl */ ?>
<div id="<?php echo $this->_tpl_vars['uid_rand']; ?>
" style="margin-bottom:30px;">
	<table cellpadding="0" cellspacing="0" class="inline">
	<tbody>
	<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['field']):
?>
	<?php if ($this->_tpl_vars['field']['type'] != 'expression' && $this->_tpl_vars['field']['type'] != 'id'): ?>
		<tr>
			<?php if ($this->_tpl_vars['field']['type'] == 'input'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td><input type="text" value="<?php echo $this->_tpl_vars['filled'][$this->_tpl_vars['key']]; ?>
" class="fields" name="_child__<?php echo $this->_tpl_vars['table']; ?>
__<?php echo $this->_tpl_vars['uid_rand']; ?>
__<?php echo $this->_tpl_vars['key']; ?>
[]" <?php if ($this->_tpl_vars['field']['disabled']): ?>DISABLED<?php endif; ?> <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?> /></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'password'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td><input type="password" value="<?php echo $this->_tpl_vars['filled'][$this->_tpl_vars['key']]; ?>
" class="fields" name="_child__<?php echo $this->_tpl_vars['table']; ?>
__<?php echo $this->_tpl_vars['uid_rand']; ?>
__<?php echo $this->_tpl_vars['key']; ?>
[]" <?php if ($this->_tpl_vars['field']['disabled']): ?>DISABLED<?php endif; ?> <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?> /></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'textarea'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td><textarea name="_child__<?php echo $this->_tpl_vars['table']; ?>
__<?php echo $this->_tpl_vars['uid_rand']; ?>
__<?php echo $this->_tpl_vars['key']; ?>
[]" class="fields" <?php if ($this->_tpl_vars['field']['disabled']): ?>DISABLED<?php endif; ?> <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['filled'][$this->_tpl_vars['key']]; ?>
</textarea></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'editor'): ?>
				
				<td ><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td>
				<script type="text/javascript">
					var sBasePath = '/source/js/admin/fckeditor/';
					var oFCKeditor_<?php echo $this->_tpl_vars['key']; ?>
 = new FCKeditor('<?php echo $this->_tpl_vars['key']; ?>
');
					
					oFCKeditor_<?php echo $this->_tpl_vars['key']; ?>
.BasePath	= sBasePath ;
					oFCKeditor_<?php echo $this->_tpl_vars['key']; ?>
.Height	= <?php if (isset ( $this->_tpl_vars['field']['height'] )): ?><?php echo $this->_tpl_vars['field']['height']; ?>
<?php else: ?>150<?php endif; ?> ;
					oFCKeditor_<?php echo $this->_tpl_vars['key']; ?>
.Value	= '<?php echo $this->_tpl_vars['filled'][$this->_tpl_vars['key']]; ?>
';
					oFCKeditor_<?php echo $this->_tpl_vars['key']; ?>
.className = 'field';
					oFCKeditor_<?php echo $this->_tpl_vars['key']; ?>
.Create() ;
					//-->
				</script>
				</td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'checkbox'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td><input type="hidden" name="_child__<?php echo $this->_tpl_vars['table']; ?>
__<?php echo $this->_tpl_vars['uid_rand']; ?>
__<?php echo $this->_tpl_vars['key']; ?>
[]" value="off" /><input type="checkbox" name="_child__<?php echo $this->_tpl_vars['table']; ?>
__<?php echo $this->_tpl_vars['uid_rand']; ?>
__<?php echo $this->_tpl_vars['key']; ?>
[]" class="fields" <?php if ($this->_tpl_vars['field']['disabled']): ?>DISABLED<?php endif; ?> <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['validate']): ?><?php if ($this->_tpl_vars['filled'][$this->_tpl_vars['key']] == 'on'): ?>checked="checked"<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['field']['checked']): ?>checked="checked"<?php endif; ?><?php endif; ?> /></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'select' && $this->_tpl_vars['field']['from']['mode'] == 'from_table'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td>
					<select class="fields" name="_child__<?php echo $this->_tpl_vars['table']; ?>
__<?php echo $this->_tpl_vars['uid_rand']; ?>
__<?php echo $this->_tpl_vars['key']; ?>
[]" <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?>>
						<?php $_from = $this->_tpl_vars['additional'][$this->_tpl_vars['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['select_node']):
?>
						<option value="<?php echo $this->_tpl_vars['select_node']['0']; ?>
" <?php if ($this->_tpl_vars['validate']): ?><?php if ($this->_tpl_vars['select_node']['0'] == $this->_tpl_vars['filled'][$this->_tpl_vars['key']]): ?>selected="selected"<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['select_node']['0'] == $this->_tpl_vars['field']['from']['data']['selected_id'] || $this->_tpl_vars['select_node']['1'] == $this->_tpl_vars['field']['from']['data']['selected_value']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['select_node']['1']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'select' && $this->_tpl_vars['field']['from']['mode'] == 'simple_list'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td>
					<select class="fields" name="_child__<?php echo $this->_tpl_vars['table']; ?>
__<?php echo $this->_tpl_vars['uid_rand']; ?>
__<?php echo $this->_tpl_vars['key']; ?>
[]" <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?>>
						<?php $_from = $this->_tpl_vars['field']['from']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value_id'] => $this->_tpl_vars['select_node']):
?>
						<option value="<?php echo $this->_tpl_vars['value_id']; ?>
" <?php if ($this->_tpl_vars['validate']): ?><?php if ($this->_tpl_vars['value_id'] == $this->_tpl_vars['filled'][$this->_tpl_vars['key']]): ?>selected="selected"<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['value_id'] == $this->_tpl_vars['field']['from']['selected_id'] || $this->_tpl_vars['select_node'] == $this->_tpl_vars['field']['from']['selected_value']): ?>selected="selected"<?php endif; ?><?php endif; ?>><?php echo $this->_tpl_vars['select_node']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'image' || $this->_tpl_vars['field']['type'] == 'file'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td><input class="fields" type="file" name="_child__<?php echo $this->_tpl_vars['table']; ?>
__<?php echo $this->_tpl_vars['uid_rand']; ?>
__<?php echo $this->_tpl_vars['key']; ?>
[]" <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?> /></td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'radio'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td>
				<?php $_from = $this->_tpl_vars['field']['alias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['radio_key'] => $this->_tpl_vars['radio_sec']):
?>
				<input class="fields" type="radio" name="_child__<?php echo $this->_tpl_vars['table']; ?>
__<?php echo $this->_tpl_vars['uid_rand']; ?>
__<?php echo $this->_tpl_vars['key']; ?>
[]" value="<?php echo $this->_tpl_vars['radio_key']; ?>
" <?php if ($this->_tpl_vars['field']['disabled']): ?>DISABLED<?php endif; ?> <?php if (isset ( $this->_tpl_vars['field']['style'] )): ?>style="<?php echo $this->_tpl_vars['field']['style']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['validate']): ?><?php if ($this->_tpl_vars['filled'][$this->_tpl_vars['key']] == $this->_tpl_vars['radio_key']): ?>checked="checked"<?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['field']['checked'] == $this->_tpl_vars['radio_key']): ?>checked="checked"<?php endif; ?><?php endif; ?> /><?php echo $this->_tpl_vars['radio_sec']; ?>

				<?php endforeach; endif; unset($_from); ?>
				</td>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['field']['type'] == 'date'): ?>
				<td><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
				<td>
				<input class="fields" type="text" name="_child__<?php echo $this->_tpl_vars['table']; ?>
__<?php echo $this->_tpl_vars['uid_rand']; ?>
__<?php echo $this->_tpl_vars['key']; ?>
[]" value="<?php echo $this->_tpl_vars['filled'][$this->_tpl_vars['key']]; ?>
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
	<div style="float:right;"><input type="button" name="Delete" value="Delete" onclick="$('#<?php echo $this->_tpl_vars['uid_rand']; ?>
').remove();" /></div>
</div>