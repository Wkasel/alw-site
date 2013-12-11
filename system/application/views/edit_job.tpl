<script type="text/javascript" src="/source/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="/source/js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="/source/js/jquery.timers.js"></script>
<link href="/source/css/ui/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
{literal}
$(function(){
	
	var datess = $('#date_from, #date_to, #start_date, #end_date').datepicker({
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

function readitback(){
	$(".notes_list").show();
	$(".note_detail").hide();
}

function isOther() {
	if ($('#jc').val() == 'other') {
		$('#other_text').css('display', 'inline'); 
	} else {
		$('#other_text').val('');
		$('#other_text').css('display', 'none');
	}
}

function addTrackNum(value) {
	if (typeof(value) == 'undefined') {
		value = '';
	}
	if($('#carriers div').length == 0){
		$('#carriers').css("display", "block");
	}
	var rand = Math.ceil(Math.random()*10000);
	$('#carriers').append('<div style="position:relative;" id="node_' + rand + '"><label>TRACKING NUMBER:</label><input type="text" name="job_info[]" value="' + value + '" /><img onclick="removeNode(\'node_' + rand + '\');" alt="Add track number" style="position:absolute; top:9px; right:-26px;cursor:pointer;" src="/source/images/delete-icon.png"></div>');
}

function removeNode(id) {
	if($('#carriers div').length == 1){
		$('#carriers').css("display", "none");
	}
	$('#'+id).remove();
}

function runBar() {
	$('#dim').show();
	$('#center_message').center();
	$("#dim").everyTime(1000, function(i) {
		show = i;
		if (show > 99) {
			show = 99;
		}
		$('#percent').html((i));
	});
}

jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
    return this;
}
{/literal}

{foreach from=$job->job_info item=node}
addTrackNum('{$node}');
{/foreach}
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
						<form action="/area/main/" method="post">
			<div>
				<input type="text" value="{$name}" name="search" class="inp" style="width:230px;"> <span style="font-size:19px;">OR</span> <input type="radio" name="cond" {if $cond eq 'or'}checked="checked"{/if} value="or" />
				 <span style="font-size:19px;">AND</span> <input type="radio" name="cond" value="and" {if $cond eq 'and'}checked="checked"{/if} />
					<input id="date_from" type="text" value="{$from|default:'Date from'}" name="from" class="inp" style="width: 85px; color: rgb(146, 146, 146);" />
					<input id="date_to" type="text" value="{$to|default:'Date to'}" name="to" class="inp" style="width: 85px; color: rgb(146, 146, 146);" />
					&nbsp;<input type="image" src="/source/images/find.jpg">
			</div>
			<br /></form>
						<br />
						<br />
						<br />
						<br />
						<div class="clearfix">
							<div class="add_new_project">
								<p class="h bor">edit project</p>
								<form action="" id="edit_form" method="post" enctype="multipart/form-data">
									<br /><br />
								<div style="width:600px;"><label>OFFICE:</label>
									<select style="width:210px;" name="job_rep">
										{foreach from=$reps item=node}
										<option value="{$node->office_desc}" {if $node->office_desc eq $job->job_rep}selected="selected"{/if}>{$node->office_desc|truncate:35}</option>
										{/foreach}
									</select>
								</div>	
								<div><label>JOB NAME:</label><input type="text" name="job_name" value="{$job->job_name}" /></div>
								<div><label>SO NUMBER:</label><input type="text" name="job_so" value="{$job->job_so}" /></div>
								<div><label>PO NUMBER:</label><input type="text" name="job_po" value="{$job->job_po}" /></div>
								<div><label>DATE PAPERWORK RECEIVED:</label><input type="text" id="start_date" name="job_start_date" value="{$job->start}" /></div>
								<div><label>EST. SHIP DATE:</label><input type="text" name="job_end_date" id="end_date" value="{$job->end}" /></div>
								<div class="clearfix" style="position:relative;">
									<label>TRACKING NUMBER:</label>
									<input style="float:left;" type="text" name="job_info[]" value="{$job->job_info_first}" />
									<img onclick="addTrackNum();" alt="Add track number" style="cursor:pointer; position:absolute; top:8px; right:-30px;" src="/source/images/plus.jpg"></label>
								</div>
								<div id="carriers" style="display:none; padding:0;"></div>
								<div>
									<label>CARRIER:</label>
									<select style="width:210px;" name="job_carrier" id="jc" onchange="isOther();">
										<option value="Daylight"{if $job->job_carrier == 'Daylight'} selected="selected"{/if}>Daylight</option>
										<option value="FedEx Freight"{if $job->job_carrier == 'FedEx Freight'} selected="selected"{/if}>FedEx Freight</option>
										<option value="FedEx National"{if $job->job_carrier == 'FedEx National'} selected="selected"{/if}>FedEx National</option>
										<option value="FedEx Ground"{if $job->job_carrier == 'FedEx Ground'} selected="selected"{/if}>FedEx Ground</option>
										<option value="UPS"{if $job->job_carrier == 'UPS'} selected="selected"{/if}>UPS</option>
										<option value="other"{if $job->custom} selected="selected"{/if}>other</option>
									</select>
									<input type="input" name="other_text" value="{if $job->custom}{$job->job_carrier}{/if}" id="other_text" style="display:{if $job->custom}block{else}none{/if}; width: 107px; width: 107px; position:absolute; top:3px; right:-129px;" />
								</div>
								
								<br /><br /><br />
								<div class="attach">
									<div class="h bor clearfix">
										<p class="p1">ATTACHMENTS</p>
										<p class="p2">ADD NEW ATTACHMENT <img src="/source/images/plus.jpg" alt="" onclick="$('#add_at').slideDown(300);" /></p>
									</div>
									<div class="files">
									{foreach from=$at item=node}
									<div class="file clearfix">
											<div class="type"><img src="/source/images/file_type/pdf.jpg" alt="" />
											<a href="/source/files/main_files/{$node->file}" target="_blank">{$node->file}</a> <a onclick="if (confirm('Do you really want to delete it?')) runAjax('/area/delete_attachment/{$job->job_id}/{$node->id}/edit_job/');  return false;" href="#"><img src="/source/images/delete-icon.png" alt="" /></a></div>
											<div class="date">{$node->correct_date}</div>
										</div>
									{/foreach}
									<div id="add_at" style="display:none; padding:5px 0 0 0;">
										
										<div style="position:relative; background:url(/source/images/browse.gif) no-repeat 30px 6px; float:left;">File <input onchange="$(this).next().val($(this).val());" style="color:#fff; width:231px; border:none; opacity:0;" type="file" name="at" /><input style="position:absolute; top:8px; left:30px; width:147px; padding:1px 0;" type="text" /><input type="submit" onclick="runBar();" value="Upload" style="width:90px; height:23px;" /></div> 
									
									</div>
									</div>
								</div>
							</div>
							<div class="notes">
								<div class="h bor clearfix">
									<p class="p1">NOTES</p>
									<p class="p2">ADD NEW NOTE <img src="/source/images/plus.jpg" onclick="readitback(); $('#add_note').slideDown();" alt="" /></p>
								</div>
								<span class="notes_list">
								{foreach from=$notes item=node}
								<div class="note clearfix">
									<div class="date">
										{$node->correct_date}
									</div>
									<div class="text"><a href="#" onclick="readit({$node->note_id}); return false;">{$node->note_text|truncate:55}</a>
									<a href="#" onclick="if (confirm('Do you really want to delete it?')) runAjax('/area/delete_note/{$node->note_id}/'); return false;"><img style="display:inline;" src="/source/images/delete-icon.png" alt=""></a>
									</div>
								</div>
								{/foreach}
								<div id="add_note" style="display:none;">
									
									<br />
									<textarea style="width:419px; height:100px; border:1px dotted #ccc;" id="note_area" name="note"></textarea> 
									<p style="text-align:right;"><input type="submit" onclick="runBar();" value="Add" /><input type="button" onclick="$('#add_note').slideUp(); $('#note_area').val('');" value="Cancel" /></p>
									
								</div>
								</span>
							</div>
							{if $notes}
									<div id="notes_list" class="note_detail">
										<div class="par clearfix" style="width:{$width}px;">
											{foreach from=$notes item=node}
											<div id="div_note_{$node->note_id}" class="div">
												<div class="date">{$node->correct_date}</div>
												<div class="text">{$node->note_text}</div>
											</div>
											{/foreach}
										</div>
										<div class="next_prev">
											<a id="toprev" href="#" onclick="toprev(); return false;"><img src="/source/images/prev.jpg" alt="" /> <span>prev</span></a>
											|
											<a onclick="readitback(); return false;" href="#">close</a>
											|
											<a id="tonext" href="#" onclick="tonext(); return false;"><span>next</span> <img src="/source/images/next.jpg" alt="" /></a>
										</div>
										<script type="text/javascript">
											{literal}
											function tonext(){
												var pos = $(".note_detail .par").position();
												var width = $(".note_detail .par").width();
												var stop = (width-421)*-1;
												if(pos.left != stop){
													$(".note_detail .par").animate({left:pos.left-421}, 500);
												}
											}
											
											function toprev(){
												var pos = $(".note_detail .par").position();
												var width = $(".note_detail .par").width();
												if(pos.left != 0){
													$(".note_detail .par").animate({left:pos.left+421}, 500);
												}
											}
											function readit(id){
												$(".notes_list").hide();
												$(".note_detail").show();
												var index = $("#div_note_"+id).index();
												index++
												var pos = (index*421)-421;
												pos *= -1;
												$(".note_detail .par").css({left:pos});
											}
											
											{/literal}
										</script>
									</div>
								{/if}
						</div>
						<br /><br />
						<div class="btns">
							<a href="#" onclick="runBar(); $('#edit_form').attr('action', '?go=main'); $('#edit_form').submit(); return false;" class="btn">Save</a>
							<a href="/area/delete_job/{$job->job_id}/" onclick="return confirm('Do you really want to delete it?');" class="btn">Delete</a>
							<a href="/area/main/" class="btn">Cancel</a>
						</div>
					</div>
					</form>
				</div> <!-- end rep content page -->
			</div>
		</div>
	</div>
	<script type="text/javascript">
	{foreach from=$job->job_info item=node}
	addTrackNum('{$node}');
	{/foreach}
	</script>