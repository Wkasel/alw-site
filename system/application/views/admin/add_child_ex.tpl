<div id="{$uid_rand}" style="margin-bottom:30px;">
	<table cellpadding="0" cellspacing="0" class="inline">
	<tbody>
	{foreach from=$fields key=key item=field}
	{if $field.type neq 'expression' && $field.type neq 'id'}
		<tr>
			{if $field.type eq 'input'}
				<td>{$field.value}</td>
				<td><input type="text" value="{$filled.$key}" class="fields" name="_child__{$table}__{$uid_rand}__{$key}[]" {if $field.disabled}DISABLED{/if} {if isset($field.style)}style="{$field.style}"{/if} /></td>
			{/if}
			{if $field.type eq 'password'}
				<td>{$field.value}</td>
				<td><input type="password" value="{$filled.$key}" class="fields" name="_child__{$table}__{$uid_rand}__{$key}[]" {if $field.disabled}DISABLED{/if} {if isset($field.style)}style="{$field.style}"{/if} /></td>
			{/if}
			{if $field.type eq 'textarea'}
				<td>{$field.value}</td>
				<td><textarea name="_child__{$table}__{$uid_rand}__{$key}[]" class="fields" {if $field.disabled}DISABLED{/if} {if isset($field.style)}style="{$field.style}"{/if}>{$filled.$key}</textarea></td>
			{/if}
			{if $field.type eq 'editor'}
				
				<td >{$field.value}</td>
				<td>
				<script type="text/javascript">
					var sBasePath = '/source/js/admin/fckeditor/';
					var oFCKeditor_{$key} = new FCKeditor('{$key}');
					
					oFCKeditor_{$key}.BasePath	= sBasePath ;
					oFCKeditor_{$key}.Height	= {if isset($field.height)}{$field.height}{else}150{/if} ;
					oFCKeditor_{$key}.Value	= '{$filled.$key}';
					oFCKeditor_{$key}.className = 'field';
					oFCKeditor_{$key}.Create() ;
					//-->
				</script>
				</td>
			{/if}
			{if $field.type eq 'checkbox'}
				<td>{$field.value}</td>
				<td><input type="hidden" name="_child__{$table}__{$uid_rand}__{$key}[]" value="off" /><input type="checkbox" name="_child__{$table}__{$uid_rand}__{$key}[]" class="fields" {if $field.disabled}DISABLED{/if} {if isset($field.style)}style="{$field.style}"{/if} {if $validate}{if $filled.$key eq 'on'}checked="checked"{/if}{else}{if $field.checked}checked="checked"{/if}{/if} /></td>
			{/if}
			{if $field.type eq 'select' && $field.from.mode eq 'from_table'}
				<td>{$field.value}</td>
				<td>
					<select class="fields" name="_child__{$table}__{$uid_rand}__{$key}[]" {if isset($field.style)}style="{$field.style}"{/if}>
						{foreach from=$additional.$key item=select_node}
						<option value="{$select_node.0}" {if $validate}{if $select_node.0 eq $filled.$key}selected="selected"{/if}{else}{if $select_node.0 eq $field.from.data.selected_id || $select_node.1 eq $field.from.data.selected_value}selected="selected"{/if}{/if}>{$select_node.1}</option>
						{/foreach}
					</select>
				</td>
			{/if}
			{if $field.type eq 'select' && $field.from.mode eq 'simple_list'}
				<td>{$field.value}</td>
				<td>
					<select class="fields" name="_child__{$table}__{$uid_rand}__{$key}[]" {if isset($field.style)}style="{$field.style}"{/if}>
						{foreach from=$field.from.values key=value_id item=select_node}
						<option value="{$value_id}" {if $validate}{if $value_id eq $filled.$key}selected="selected"{/if}{else}{if $value_id eq $field.from.selected_id || $select_node eq $field.from.selected_value}selected="selected"{/if}{/if}>{$select_node}</option>
						{/foreach}
					</select>
				</td>
			{/if}
			{if $field.type eq 'image' || $field.type eq 'file'}
				<td>{$field.value}</td>
				<td><input class="fields" type="file" name="_child__{$table}__{$uid_rand}__{$key}[]" {if isset($field.style)}style="{$field.style}"{/if} /></td>
			{/if}
			{if $field.type eq 'radio'}
				<td>{$field.value}</td>
				<td>
				{foreach from=$field.alias key=radio_key item=radio_sec}
				<input class="fields" type="radio" name="_child__{$table}__{$uid_rand}__{$key}[]" value="{$radio_key}" {if $field.disabled}DISABLED{/if} {if isset($field.style)}style="{$field.style}"{/if} {if $validate}{if $filled.$key eq $radio_key}checked="checked"{/if}{else}{if $field.checked eq $radio_key}checked="checked"{/if}{/if} />{$radio_sec}
				{/foreach}
				</td>
			{/if}
			{if $field.type eq 'date'}
				<td>{$field.value}</td>
				<td>
				<input class="fields" type="text" name="_child__{$table}__{$uid_rand}__{$key}[]" value="{$filled.$key}" id="{$key}" /><button type="reset" id="{$key}_button">...</button>
				{literal}
				<script type="text/javascript">
				    Calendar.setup({
				        inputField     :    "{/literal}{$key}{literal}",      // id of the input field
				        ifFormat       :    "{/literal}{$field.format}{literal}",       // format of the input field
				        showsTime      :    true,            // will display a time selector
				        button         :    "{/literal}{$key}_button{literal}",   // trigger for the calendar (button ID)
				        singleClick    :    true,           // double-click mode
				        step           :    1                // show all years in drop-down boxes (instead of every other year as default)
				    });
				</script>
				{/literal}	
				</td>
			{/if}
		</tr>
		{/if}
	{/foreach}
	</tbody>
	</table>
	<div style="float:right;"><input type="button" name="Delete" value="Delete" onclick="$('#{$uid_rand}').remove();" /></div>
</div>