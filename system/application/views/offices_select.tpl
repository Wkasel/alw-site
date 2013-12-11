<select name="job_rep" id="job_select">
{foreach from=$reps item=node}
	<option value="{$node->office_desc}" {if $node->office_desc eq $selected}selected="selected"{/if}>{$node->office_desc|truncate:28}</option>
{/foreach}
</select>