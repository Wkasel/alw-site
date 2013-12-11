<h3>Граббинг</h3>
{if $msg != ''}<span style="color:#FF0000; font-size:25">Grabbed {$msg} urls</span>{/if}
<form action="" method="POST">
<table cellpadding="0" cellspacing="0">
<tr>
<td>Раздел</td>
<td>
<select name="type">
{foreach from=$cats item=cat}
<option value="{$cat->cat_id}" {if $cat->cat_name_url eq 'latest'}selected="selected"{/if}>{$cat->cat_name}</option>
{/foreach}
</select>
</td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="Забрать" name="grab" /></td>
</tr>
</table>
</form>