{literal}
<script type="text/javascript">
function is_submitted(event) {
	if(event.keyCode==13) {
		document.getElementById('filter_form').submit();
	}
};
</script>
{/literal}

<div class="inline" id="back">
		<a href="javascript: history.go(-1);"><img src="/source/images/{$my_mode}/back.gif" width="21" height="21" alt="" /></a>
		<span>{$title} </span>

	</div>
	<h2>{$title}</h2>
	<form action="/{$my_mode}/index/{$table}/" method="post" id="filter_form" enctype="multipart/form-data">
 	<input type="hidden" name="apply_filter_x" value="true" />
 
<p style="text-align: right;">Nodes per page: 
	{if $per_page eq 30}<b>30</b>{else}<a href="/{$my_mode}/index/{$table}/set_per_page/30">30</a>{/if} | 
	{if $per_page eq 2}<b>60</b>{else}<a href="/{$my_mode}/index/{$table}/set_per_page/60">60</a>{/if} | 
	{if $per_page eq 90}<b>90</b>{else}<a href="/{$my_mode}/index/{$table}/set_per_page/90">90</a>{/if} |
	{if $per_page eq 150}<b>150</b>{else}<a href="/{$my_mode}/index/{$table}/set_per_page/150">150</a>{/if} |
	{if $per_page eq 200}<b>200</b>{else}<a href="/{$my_mode}/index/{$table}/set_per_page/200">200</a>{/if}
</p>
<b style="float:left;">Total nodes: {$global_total}</b>
{if $total > 1}
	<p style="text-align: right;">
		<a href="/{$my_mode}/index/{$table}/0">First</a>&nbsp;
	<a href="/{$my_mode}/index/{$table}/{if $current-1 >= 0}{$current-1}{else}{$current}{/if}">&lt;</a>&nbsp;
	{assign var="no_dots" value="yes"}
	{section name=pages loop=$total step=1}
		{if $smarty.section.pages.iteration > 10 && $smarty.section.pages.iteration > $current+10  && $smarty.section.pages.iteration+10 < $total}
			{if $no_dots eq "yes"}...{/if}
			{assign var="no_dots" value="no"}
		{else}
			{if $smarty.section.pages.iteration+10 >$current && $smarty.section.pages.iteration-10 < $total}
				{if $smarty.section.pages.iteration-1 eq $current}
					<b>{$smarty.section.pages.iteration}</b>&nbsp;
				{else}
					<a href="/{$my_mode}/index/{$table}/{$smarty.section.pages.iteration-1}">{$smarty.section.pages.iteration}</a>&nbsp;
				{/if}
			{/if}
		{/if}
	{/section}
	<a href="/{$my_mode}/index/{$table}/{if $current+2 <= $total}{$current+1}{else}{$current}{/if}">&gt;</a>&nbsp;</p>
{/if}	
<table cellpadding="0" cellspacing="0" class="inline">
	<thead>
  {if $save}
		<tr>
			<td align="left">
        <input type="button" value="Save" name="edit_object">
			</td>
      <td  colspan="{$headers|@count}">&nbsp;</td>
		</tr>
    {/if}	
		<tr class="thead">
			<td style="width: 75px">&nbsp;</td>
			{foreach from=$headers item=node} 
			<td{if $node.name eq $sort_by} id="order_{$sort_type}"{/if} {if !empty($node.width)}width="{$node.width}" {/if}>
				<a href="/{$my_mode}/index/{$table}/make_sort/{$node.name}/{if $sort_by eq $node.name}{if $sort_type eq 'desc'}asc{else}desc{/if}{else}asc{/if}/{$current}/">{$node.value}</a>
			</td>		
			{/foreach}		
		</tr>
		<tr>	
			<td>
				<input type="image" src="/source/images/admin/f-on.gif" style="width:20px; height:20px" alt="Apply filter" name="apply_filter" />
				<input type="image" onclick="deleteFilter(); this.form.submit();" src="/source/images/admin/f-off.gif" style="width:20px; height:20px" alt="Discard filter" name="discard_filter" value="yes" />

			</td>
			{foreach from=$header_names item=node}
			<td>
				<input type="text" name="{$node}" onKeyDown="is_submitted(event)" class="field" style="width: 100%" value="{if isset($filter_values.$node)}{$filter_values.$node}{/if}" />
			</td>	
			{/foreach}	
		</tr>
	</thead>
	</form>
	<form action="/{$my_mode}/index/{$table}/delete_nodes/" method="POST">
  {if !$nofoot}
	<tfoot>
		<tr>
			<td align="right"><input type="submit" value="Del" style="border:1px solid #000; margin-right:15px;" name="delete" /><a href="/{$my_mode}/index/{$table}/add_item/"><img src="/source/images/admin/add.gif" width="20" height="20" alt="" /></a></td>

			<td colspan="{$headers|@count}">
				<div><a href="/{$my_mode}/index/{$table}/add_item/">Add node</a></div>
			</td>
		</tr>
	</tfoot>
  {/if}
  {if $save}
	<tfoot>
		<tr>
			<td align="left">
        <input type="button" value="Save" name="edit_object" style="width: 100%;">
			</td>
      <td  colspan="{$headers|@count}">&nbsp;</td>
		</tr>
	</tfoot>
  {/if}
	<tbody class="tbody overed">
	
	
	{foreach from=$rows item=row name=rows_list}
	<tr style="background-color: #{if $smarty.foreach.rows_list.iteration%2}FFF{else}f8f8f8{/if};">
		<td>
			<input type="checkbox" style="margin-top:5px; margin-right:5px;"  name="delete[]" value="{$row->table_id}" />
			<a href="/{$my_mode}/index/{$alias_talbe}/edit_item/{$row->table_id}/{$current}/"><img src="/source/images/admin/edit.gif" width="20" height="20" alt="Edit" /></a>
			{if !$nodel}<a href="/{$my_mode}/index/{$alias_talbe}/delete_item/{$row->table_id}/{$current}/" onclick="javascript:return delItem({$row->table_id});"><img width="20" height="20" alt="Delete" src="/source/images/admin/del.gif"/></a>{/if}
			{if $sortable}<a href="/{$my_mode}/index/{$alias_talbe}/move_up/{$row->table_id}/{$current}/"><img src="/source/images/admin/move_up.gif" /></a>&nbsp;&nbsp;
			<a href="/{$my_mode}/index/{$alias_talbe}/move_down/{$row->table_id}/{$current}/"><img src="/source/images/admin/move_down.gif" /></a>{/if}
		</td>
		{foreach from=$row item=row_field key=column name=f}	
			{if $column != 'table_id'}
				<td>{if in_array($column,$input_field)}<input name="available_inventory[]" value="{$row_field}" style="width:100%">{else}{$row_field}{/if}</td>
			{/if}
		{/foreach}	
	</tr>
	{/foreach}
	</tbody>
</table>
</form>
{if $total > 1}
	<p style="text-align: right;"> 
		<a href="/{$my_mode}/index/{$table}/0">First</a>&nbsp;
	<a href="/{$my_mode}/index/{$table}/{if $current-1 >= 0}{$current-1}{else}{$current}{/if}">&lt;</a>&nbsp;
	{assign var="no_dots" value="yes"}
	{section name=pages loop=$total step=1}
		{if $smarty.section.pages.iteration > 10 && $smarty.section.pages.iteration > $current+10  && $smarty.section.pages.iteration+10 < $total}
			{if $no_dots eq "yes"}...{/if}
			{assign var="no_dots" value="no"}
		{else}
			{if $smarty.section.pages.iteration+10 >$current && $smarty.section.pages.iteration-10 < $total}
				{if $smarty.section.pages.iteration-1 eq $current}
					<b>{$smarty.section.pages.iteration}</b>&nbsp;
				{else}
					<a href="/{$my_mode}/index/{$table}/{$smarty.section.pages.iteration-1}">{$smarty.section.pages.iteration}</a>&nbsp;
				{/if}
			{/if}
		{/if}
	{/section}
	<a href="/{$my_mode}/index/{$table}/{if $current+2 <= $total}{$current+1}{else}{$current}{/if}">&gt;</a>&nbsp;</p>
{/if}	

