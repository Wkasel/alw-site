<div class="inline" id="back">
		<a href="javascript: history.go(-1);"><img src="/source/images/admin/back.gif" width="21" height="21" alt="" /></a>
		<span>Permissions</span>
	</div>
	<h2>Permissions</h2>
	
	<form action="/admin/edit_group/" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" class="inline">
	<thead>
		<tr class="thead">
			<td colspan="2"><b>Edit group {$group->group_name}</b></td>
		</tr>
	</thead>
	<tbody>
		<tr>
		<td colspan="2">Access</td>
		</tr>
	{foreach from=$modules item=node key=key}
		<tr>
		<td><input type="checkbox" name="modules[{$key}]" {if isset($allowed_modules.$key)}checked="checked"{/if} />{$node}</td>
		<td>Access <select name="group_access[{$key}]">
		<option value="1">Only my</option>
		<option value="2" {if $allowed_modules.$key->group_pers eq 2}selected="selected"{/if}>Global (read only)</option>
		<option value="3" {if $allowed_modules.$key->group_pers eq 3}selected="selected"{/if}>Global</option>
		
		</select></td>
		</tr>
	{/foreach}
		<tr>
		<td colspan="2">Name <input type="text" name="group_name" value="{$group->group_name}" style="width:110px;" />
		<input type="submit" name="edit" value="Edit" />&nbsp;<input type="submit" name="delete" value="Delete" /></td>
		</tr>
		</table>
		<input type="hidden" name="group_id" value="{$group->group_id}" />
		</form>
	