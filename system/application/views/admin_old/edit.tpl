<div class="inline" id="back">
		<a href="javascript: history.go(-1);"><img src="/source/images/{$my_mode}/back.gif" width="21" height="21" alt="" /></a>
		<span>{$title} :: Edit node</span>

	</div>
	<h2>{$title} :: Edit node </h2>
	{if isset($errors)}<div id="error">{$errors}</div>{/if}
	<form action="" method="post" enctype="multipart/form-data" id="test">
	<table cellpadding="0" cellspacing="0" class="inline">
	<thead>
		<tr class="thead">
			<td colspan="2"><b>Edit node</b></td>
		</tr>
	</thead>
	<tbody>
	{foreach from=$fields key=key item=field}
	{if $field.type neq 'expression' && $field.type neq 'id'}
		<tr>
			{if $field.type eq 'input'}
				<td>{$field.value}</td>
				<td><input type="text" value="{$filled.$key}" class="fields" name="{$key}" {if $field.disabled}DISABLED{/if} {if isset($field.style)}style="{$field.style}"{/if} /></td>
			{/if}
			{if $field.type eq 'password'}
				<td>{$field.value}</td>
				<td><input type="password" value="" class="fields" name="{$key}" {if $field.disabled}DISABLED{/if} {if isset($field.style)}style="{$field.style}"{/if} /></td>
			{/if}
			{if $field.type eq 'textarea'}
				<td>{$field.value}</td>
				<td><textarea name="{$key}" class="fields" {if $field.disabled}DISABLED{/if} {if isset($field.style)}style="{$field.style}"{/if}>{$filled.$key}</textarea></td>
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
				<td><input type="hidden" name="{$key}" value="off" /><input type="checkbox" name="{$key}" class="fields" {if $field.disabled}DISABLED{/if} {if isset($field.style)}style="{$field.style}"{/if} {if $validate}{if $filled.$key eq 'on'}checked="checked"{/if}{else}{if $filled.$key eq 1}checked="checked"{/if}{/if} /></td>
			{/if}
			{if $field.type eq 'select' && $field.from.mode eq 'from_table'}
				<td>{$field.value}</td>
				<td>
					<select class="fields" name="{$key}" {if isset($field.style)}style="{$field.style}"{/if}>
						{foreach from=$additional.$key item=select_node}
						<option value="{$select_node.0}" {if $select_node.0 eq $filled.$key}selected="selected"{/if}>{$select_node.1}</option>
						{/foreach}
					</select>
				</td>
			{/if}
			{if $field.type eq 'select' && $field.from.mode eq 'simple_list'}
				<td>{$field.value}</td>
				<td>
					<select class="fields" name="{$key}" {if isset($field.style)}style="{$field.style}"{/if}>
						{foreach from=$field.from.values key=value_id item=select_node}
						<option value="{$value_id}" {if $value_id eq $filled.$key}selected="selected"{/if}>{$select_node}</option>
						{/foreach}
					</select>
				</td>
			{/if}
			{if $field.type eq 'image' || $field.type eq 'file'}
				<td>{$field.value}</td>
				<td><input class="fields" type="file" name="{$key}" {if isset($field.style)}style="{$field.style}"{/if} />{if $field.type eq 'file'}<a href="{$files.$key}" />{$files.$key}</a>{/if} {if $images.$key}<img src="{$images.$key}?rand={$rand}" />{/if}{if isset($field.delete_link)}<a href="/{$my_mode}/index/{$table}/delete_file/?data={$field.delete_link}"><img width="20" height="20" alt="Delete" src="/source/images/admin/del.gif"/></a>{/if}</td>
			{/if}
			{if $field.type eq 'radio'}
				<td>{$field.value}</td>
				<td>
				{foreach from=$field.alias key=radio_key item=radio_sec}
				<input class="fields" type="radio" name="{$key}" value="{$radio_key}" {if $field.disabled}DISABLED{/if} {if isset($field.style)}style="{$field.style}"{/if} {if $filled.$key eq $radio_key}checked="checked"{/if} />{$radio_sec}
				{/foreach}
				</td>
			{/if}
			{if $field.type eq 'date'}
				<td>{$field.value}</td>
				<td>
				<input class="fields" type="text" name="{$key}" value="{$filled.$key}" id="{$key}" /><button type="reset" id="{$key}_button">...</button>
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
	{if $allow_edit}
	<input type="submit" name="edit_object" value="Save node" />
	{/if}
	</form>
