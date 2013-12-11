<link href="/source/css/ui/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/source/js/accord.js"></script>
<script type="text/javascript" src="/source/js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/source/js/jquery.ui.core.js"></script>
<script type="text/javascript">
{literal}
$(function(){
	var datess = $('#date_from, #date_to').datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		buttonImageOnly: true,
		onSelect: function(selectedDate){
			//var options = this.id == "date_from" ? "minDate" : "maxDate";
			var instances = $(this).data("datepicker");
			var dates = $.datepicker.parseDate(instances.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instances.settings);
			//datess.not(this).datepicker("option", options, dates);
		}
	});

	$('.accord > ul').accordion();
});

{/literal}
</script>
<div class="rep_content_page clearfix"> <!-- rep content page -->
							<div class="left_side"> <!-- left side of rep content -->
		<div class="content_name">Rep Content</div>
		<div class="accord">
			<ul>
				<li><span><a href="/content/rep_area/job_status/" class="active">ORDER STATUS</a></span></li>
				<li> <span><a href="/content/rep_area/email/">Registrations</a></span></li>
				<li> <span><a href="/content/rep_area/calc/">Calculators</a></span></li>
				{foreach from=$nav item=node}
				<li {if $article->ra_cat eq $node->reps_cats_id} class="selected_class"{/if}> <span>{$node->rc_name}</span>
					<ul>
						{foreach from=$node->items item=subnode}
							<li><a href="/content/rep_area/article/{$subnode->reps_articles_id}/"{if $subnode->reps_articles_id eq $art_id} class="selected"{/if}>{$subnode->ra_name}</a></li>
						{/foreach}
					</ul>
				</li>
				{/foreach}
			</ul>

		</div>
	</div> <!-- end left side of rep content -->
	<div class="right_side" style="margin:0 auto; width:696px; float:none; clear:both;"> <!-- right side of rep content -->
		
		<div class="find_res">
			<br />
			<br />
			<p class="h">Search by PO Number, SO Number or Job Name and/or Date</p>

			<br />
			<form method="post" action="">
				<div>
					<input type="text" value="{$name}" name="search" class="inp" style="width:230px;"> <span style="font-size:19px;">OR</span> <input type="radio" name="cond" {if $cond eq 'or'}checked="checked"{/if} value="or" />
					 <span style="font-size:19px;">AND</span> <input type="radio" name="cond" value="and" {if $cond eq 'and'}checked="checked"{/if} />
						<input id="date_from" type="text" value="{$from|default:'Date from'}" name="from" class="inp" style="width: 85px; color: rgb(146, 146, 146);" />
						<input id="date_to" type="text" value="{$to|default:'Date to'}" name="to" class="inp" style="width: 85px; color: rgb(146, 146, 146);" />
						&nbsp;<input type="image" src="/source/images/find.jpg">
				</div>
				<br>
			</form>
			<br />
			<br />
			{if isset($name)}
				{if count($s) != 0}
				<p class="h">Results</p>
				<br />
				<table class="find_res">
					<tr>
						<th>PO Number</th>
						<th>Job Name</th>
						<th>SO #</th>
	
						<th>Date Paperwork Rec'd</th>
						<th>Est. Ship Date</th>
						<th>Tracking Info</th>
						<th>Carrier name</th>
					</tr>
					{foreach from=$s name=jobs item=node}
					<tr {if $smarty.foreach.jobs.iteration %2 == 0}class="odd"{/if}>
						<td>{$node->job_po}</td>
						<td>{$node->job_name}</td>
						<td>{$node->job_so}</td>
	
						<td>{$node->start}</td>
						<td>{$node->end}</td>
						<td>{$node->job_info}</td>
						<td>{$node->job_carrier}</td>
					</tr>
					{/foreach}
				</table>
				<br />
				{else}
				<p class="h" style="text-align:center; color:red; font-size:14px; font-weight:bold;">No Results Found</p>
				<div style="margin-bottom:180px"></div>
				{/if}
			{/if}
		</div>
	</div> <!-- end right side of rep content -->
</div>