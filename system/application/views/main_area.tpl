<script type="text/javascript" src="/source/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="/source/js/jquery.ui.datepicker.js"></script>
<link href="/source/css/ui/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
{literal}
$(document).ready(function() {
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
});
{/literal}
</script>

	<div class="red_shadow_area"> <!-- red shadow area -->
		<div class="inner">
		<div class="in-inner">
			<div class="nav clearfix"> <!-- navigation -->
				<ul class="clearfix">
					<li><a href="/">main site</a></li>
					<li><a href="/area/logout/">log out</a></li>
				</ul>

			</div> <!-- end navigation -->
			<div class="rep_content_page clearfix"> <!-- rep content page -->
				<div class="find_res back_end">
					<br />
					<br />
					<p class="h">Search by PO Number, SO Number or Job Name and/or Date</p>
					<br />

					<form action="" method="post">
						<div>
							<input type="text" value="{$name}" name="search" class="inp" style="width:230px;"> <span style="font-size:19px;">OR</span> <input type="radio" name="cond" {if $cond eq 'or'}checked="checked"{/if} value="or" />
							 <span style="font-size:19px;">AND</span> <input type="radio" name="cond" value="and" {if $cond eq 'and'}checked="checked"{/if} />
								<input id="date_from" type="text" value="{$from|default:'Date from'}" name="from" class="inp" style="width: 85px; color: rgb(146, 146, 146);" />
								<input id="date_to" type="text" value="{$to|default:'Date to'}" name="to" class="inp" style="width: 85px; color: rgb(146, 146, 146);" />
								&nbsp;<input type="image" src="/source/images/find.jpg">
						</div>
						<br /></form>
						<div><input type="image" onclick="window.location = '/area/add_new/';" src="/source/images/add_new.jpg" /></div>

					
					{if count($s) == 0}
					<br /><br />
					<h2>No Results Found</h2>
					{else}
					<br />
					<br />
					<br />
					<br />
					<p class="h">RECENT PROJECTS</p>
					<br />
					<table class="editable">

						<tr>
							<th class="id">id</th>
							<th class="po_number">PO Number</th>
							<th class="job_name">Job Name</th>
							<th class="so">SO #</th>
							<th class="date_per">Date Paperwork Rec’d</th>

							<th class="est_date">Est. Ship Date</th>
							<th class="track_info">Tracking Info</th>
							<th class="track_info">Carrier Name</th>
							<th class="track_info">Office</th>
						</tr>
						
						{foreach from=$s name=jobs item=node}
						<tr class="id"{if $smarty.foreach.jobs.iteration %2 == 0} class="odd"{/if}>
							<td class="id">{$node->job_id}</td>
							<td class="job_po"><a style="color:#fff; text-decoration:underline;" href="/area/edit_job/{$node->job_id}">{if empty($node->job_po)}empty PO{else}{$node->job_po}{/if}</a></td>
							<td class="job_name">{$node->job_name}</td>
							<td class="job_so">{$node->job_so}</td>
							<td class="job_start_date">{$node->start}</td>
							<td class="job_end_date">{$node->end}</td>
							<td class="job_info">{$node->job_info}</td>
							<td class="job_carrier">{$node->job_carrier}</td>
							<td class="job_rep">{$node->job_rep}</td>
						</tr>
						{/foreach}
					</table>
					<br />
					<a href="/area/excel/" style="color:#fff;">Download excel</a>
				{/if}
				</div>
			</div> <!-- end rep content page -->
		</div>
		</div>

	</div> <!-- end red shadow area -->


