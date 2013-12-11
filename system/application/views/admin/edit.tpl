<div class="inline" id="back">
		<a href="/admin/index/{$table}/"><img src="/source/images/{$my_mode}/back.gif" width="21" height="21" alt="" /></a>
		<span>{$title} :: Save node</span>

	</div>
	<h2>{$title} :: Save node </h2>
	{if isset($errors)}<div id="error">{$errors}</div>{/if}
	<form action="" method="post" enctype="multipart/form-data" id="test">
	<table cellpadding="0" cellspacing="0" class="inline">
	<thead>
		<tr class="thead">
			<td colspan="2">{if $ship_icon}<img src="/source/images/admin/quick.gif" "alt="TBD" />{else}<b>Save node</b> {/if}</td>
		</tr>
	</thead>
	<tbody>
	<br /><input type="submit" name="edit_object" value="Save node" /> &nbsp; <input type="button" onclick="javascript:history.back();" value="Cancel" /><br /><br />
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
				<td><textarea name="{$key}"  id="{$key} class="fields" {if $field.disabled}DISABLED{/if} {if isset($field.style)}style="{$field.style}"{/if}>{$filled.$key}</textarea></td>
				<script type="text/javascript">
				//<![CDATA[
				CKEDITOR.replace('{$key}');
				//]]>
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
				<td><input class="fields" type="file" name="{$key}" {if isset($field.style)}style="{$field.style}"{/if} />{if $field.type eq 'file'}<a href="{$files.$key}" target="_blank"/>{$files.$key}</a>{/if} {if $images.$key}<img src="{$images.$key}?rand={$rand}" />{/if}{if isset($field.delete_link)}<a href="/{$my_mode}/index/{$table}/delete_file/?data={$field.delete_link}"><img width="20" height="20" alt="Delete" src="/source/images/admin/del.gif"/></a>{/if}</td>
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
	{if !empty($child_table)}
		<script type="text/javascript">
		{literal}
		function addChild(type, time) {
			setTimeout(function() {  
				$.ajax({
					type: "POST",
					url: "/admin/index/" + type + "/add_item/__nimple",
					data: "simple=true",
					success: function(content) {
						$('#child_holder_' + type).append(content);
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
						$('#child_holder_' + type).append(content);
					}
				});
			}, time*500);
		}
		
		function deleteNode(type, id) {
			$('#' + type + '_' + id).remove();
			$.ajax({
				type: "POST",
				url: "/admin/index/" + type + "/delete_item/" + id + "/__simple",
				data: "simple=true",
				success: function(content) {}
			});
		}
		{/literal}
		</script>
		{assign var="i" value="0"}
		{foreach from=$child_table item=node key=key}
			
			{if !empty($child_nodes.$key)}
				<script type="text/javascript">
				{foreach from=$child_nodes.$key item=row name=nds}
					{assign var="name" value=`$i++`}
					getChild("{$key}", {$row->id}, {$i});
				{/foreach}
				</script>
			{/if}
			<div><h3>Add {$node.alias}</h3></div>
			<div id="child_holder_{$key}"></div>
			<div><input type="button" name="add_more" style="margin-top:-20px" value="Add one more {$node.alias}" onclick="addChild('{$key}');" /></div>
			<br /><br />
			<script type="text/javascript">
				addChild('{$key}', {$i+1});
			</script>
		{/foreach}
	{/if}
	<input type="submit" name="edit_object" value="Save node" /> &nbsp; <input type="button" onclick="javascript:history.back();" value="Cancel" />
	{/if}
	</form>
