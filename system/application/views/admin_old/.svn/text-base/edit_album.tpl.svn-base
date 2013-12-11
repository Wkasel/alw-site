<h3>Альбом {$album}</h3>
<form action="" method="POST" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" class="inline">
<tr>
<td width="5%"><b>Удалить</b></td><td><b>Песня</b></td>
</tr>
{foreach from=$songs item=node}
	<tr>
		<td><input type="checkbox" name="delete[]" value="{$node->songs_id}" /></td>
		<td><input type="text" name="s_name[{$node->songs_id}]" size="50" value="{$node->s_name}" /></td>
	</tr>
{/foreach}
	<tr>
	<td>Фото</td>
	<td><input type="file" name="cover" /><img style="margin-left:50px;" src="/source/images/albums/{$cover}.jpg" /></td>
	</tr>
	<tr>
	<td colspan="2"><input type="submit" value="Дальше" name="edit" /></td>
	</tr>
</table>
<input type="hidden" name="album_name" value="{$cover}.jpg" />
</form>