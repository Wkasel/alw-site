<h3>Альбомы</h3>
Страницы
{section name=pages loop=$total step=1}
	{if $smarty.section.pages.iteration-1 eq $page}
		<b>{$smarty.section.pages.iteration}</b>&nbsp;
	{else}
		<a href="/{$my_mode}/albums/{$smarty.section.pages.iteration-1}/">{$smarty.section.pages.iteration}</a>&nbsp;
	{/if}
{/section}
<table cellpadding="0" cellspacing="0" class="inline">
<tr>
<td>Исполнитель</td><td>Альбом</td><td width="5%">Редактировать</td>
</tr>
	{foreach from=$albums item=node}
		<tr>
		<td>{$node->artists_name}</td>
		<td>{$node->album}</td>
		<td><a href="/{$my_mode}/edit_album/{$node->album}/{$node->artists_id}/"><img src="/source/images/admin/edit.gif" /></a></td>
		</tr>
	{/foreach}
</table>
Страницы
{section name=pages loop=$total step=1}
	{if $smarty.section.pages.iteration-1 eq $page}
		<b>{$smarty.section.pages.iteration}</b>&nbsp;
	{else}
		<a href="/{$my_mode}/albums/{$smarty.section.pages.iteration-1}/">{$smarty.section.pages.iteration}</a>&nbsp;
	{/if}
{/section}