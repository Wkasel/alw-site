<div class="inline" id="back">
		<a href="javascript: history.go(-1);"><img src="/source/images/admin/back.gif" width="21" height="21" alt="" /></a>
		<span>Упавление опросами</span>

	</div>
	<h2>Упавление опросами</h2>
	

<table cellpadding="0" cellspacing="0" class="inline">
	<tfoot>
		<tr>
			<td align="right"><a href="/poll_admin/add_item/""><img src="/source/images/admin/add.gif" width="20" height="20" alt="" /></a></td>

			<td colspan="{$headers|@count}">
				<div><a href="/poll_admin/add_item/">Добавить запись</a></div>
			</td>
		</tr>
	</tfoot>
	<tbody class="tbody overed">
	<tr>
	<td width="10%">Действия</td><td>Название</td><td>Работает до</td>
	</tr>
	{foreach from=$polls item=row name=rows_list}
	<tr style="background-color: #{if $smarty.foreach.rows_list.iteration%2}FFF{else}f8f8f8{/if};">
		<td>
			<a href="/poll_admin/edit_item/{$row->poll_id}/"><img src="/source/images/admin/edit.gif" width="20" height="20" alt="Edit" /></a>
			<a href="/poll_admin/delete_item/{$row->poll_id}" onclick="javascript:return delItem({$row->poll_id});"><img width="20" height="20" alt="Delete" src="/source/images/admin/del.gif"/></a>
		</td>
		<td>{$row->poll_name}</td>
		<td>{$row->poll_duedate}</td>
	</tr>
	{/foreach}
	</tbody>
</table>
</form>
