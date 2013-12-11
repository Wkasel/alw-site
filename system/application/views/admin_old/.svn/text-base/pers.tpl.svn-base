<div class="inline" id="back">
		<a href="javascript: history.go(-1);"><img src="/source/images/admin/back.gif" width="21" height="21" alt="" /></a>
		<span>Permissions</span>
	</div>
	<h2>Permissions</h2>
	
	<form action="/admin/add_group/" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" class="inline">
	<thead>
		<tr class="thead">
			<td colspan="2"><b>Add group</b></td>
		</tr>
	</thead>
	<tbody>
		<tr>
		<td colspan="2">Access</td>
		</tr>
	{foreach from=$modules item=node key=key}
		<tr>
		<td><input type="checkbox" name="modules[{$key}]" checked="checked" />{$node}</td>
		<td> Access <select name="group_access[{$key}]">
		<option value="1">Only my</option>
		<option value="2">Global (read only)</option>
		<option value="3">Global</option>
		
		</select></td>
		</tr>
	{/foreach}
		<tr>
		<td colspan="2">Name <input type="text" name="group_name" style="width:110px;" />
		<input type="submit" value="Add" />
		</td>
		</tr>
		</table>
		</form>
	<form action="/admin/edit_group/" method="post" enctype="multipart/form-data">
	<table cellpadding="0" cellspacing="0" class="inline">
	<thead>
		<tr class="thead">
			<td colspan="2"><b>Edit group</b></td>
		</tr>
	</thead>	
	<tbody>
		<tr>
		<td>
		<select name="group_id">
			{foreach from=$groups item=node}
				<option value="{$node->group_id}">{$node->group_name}</option>
			{/foreach}
		</select>&nbsp;<input type="submit" value="Next" /></td>
		</tr>
	</tbody>
	</table>
	</form>