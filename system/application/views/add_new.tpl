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

function isOther() {
	if ($('#jc').val() == 'other') {
		$('#other_text').css('display', 'inline'); 
	} else {
		$('#other_text').val('');
		$('#other_text').css('display', 'none');
	}
}

function readitback(){
	$("#notes_here").show();
	$(".note_detail").hide();
}

function removeNode(id){
	if($('#carriers div').length == 1){
		$('#carriers').css("display", "none");
	}
	$('#'+id).remove();
}

function addTrackNum() {
	var rand = Math.ceil(Math.random()*10000);
	if($('#carriers div').length == 0){
		$('#carriers').css("display", "block");
	}
	$('#carriers').append('<div id="node_' + rand + '" style="position:relative;"><label>TRACKING NUMBER:</label><input type="text" name="job_info[]" value="" /><img onclick="removeNode(\'node_' + rand + '\');" alt="Add track number" style="position:absolute; top:9px; right:-26px;cursor:pointer;" src="/source/images/delete-icon.png"></div>');
}

num = 0;
function addAtt() {
	num++;
	$('#atts').append('<div id="add_at" style="padding:5px 0 0 0;"><div style="position:relative; background:url(/source/images/browse.gif) no-repeat 30px 6px;">File <input style="color:#fff; width:300px; border:none; opacity:0;" type="file" name="at_' + num + '" onchange="$(this).next().val($(this).val());" /><input style="position:absolute; top:8px; left:30px; width:147px; padding:1px 0;" type="text" /></div></div>');
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

function tonext(){
	$("#full_text").width($("#full_text .div").length * 421);
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
	$("#notes_here").hide();
	$(".note_detail").show();
	var index = $("#div_note_"+id).index();
	index++;
	var pos = (index*421)-421;
	pos *= -1;
	$(".note_detail .par").css({left:pos});
}

jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
    return this;
}

add_counter = 0
arr = new Array;
function addNote() {
	add_counter++;
	var text = $('#note_area').val();
	if (text.length > 45) {
		var short_text = text.substring(0, 45) + '...';
	} else {
		var short_text = text;
	}
	var new_code = '<div id="note_'+add_counter+'" class="note clearfix"><div class="date">' + date + '</div><div class="text"><a style="margin-right:10px;" onclick="readit('+add_counter+'); return false;" href="#">' + short_text + '</a><a onclick="if (confirm(\'Do you really want to delete it?\')) removeNote('+add_counter+'); return false;" href="#"><img alt="" src="/source/images/delete-icon.png" style="display: inline;"></a></div></div>';
	$('#notes_here').append(new_code);
	$('#note_area').val('');
	$('#add_note').hide();
	$('#full_text').append('<div id="div_note_' + add_counter + '" class="div clearfix"><div class="date" style="float:left;">' + date + '</div><div class="text" style="float:right; padding:10px 10px 0 0;">' + text + '</div></div>');
	arr[add_counter] = text;
}

function removeNote(id) {
	$('#note_'+id).remove();
	$('#div_note_'+id).remove();
	arr[add_counter] = '';
}

function addNotes() {
	$('#notes').val(arr.join('___'));
}
{/literal}
date = '{$current_date}';
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
							<br />
						</form>
						<br />
						<br />
						<br />
						<br />
						<div class="clearfix">
							<div class="add_new_project">
								<p class="h bor">add new project</p>
								<form action="/area/add_new/{$new_id}/" id="edit_form" method="post" enctype="multipart/form-data">
								<input type="hidden" name="notes" id="notes" value="" />
									<div>
										<label>OFFICE:</label>
										<select style="width:210px;" name="job_rep">
											{foreach from=$reps item=node}
												<option value="{$node->office_desc}">{$node->office_desc|truncate:35}</option>
											{/foreach}
										</select>
									</div>
									<div><label>JOB NAME:</label><input type="text" name="job_name" value="" /></div>
									<div><label>SO NUMBER:</label><input type="text" name="job_so" value="" /></div>
									<div><label>PO NUMBER:</label><input type="text" name="job_po" value="" /></div>
									<div><label>DATE PAPERWORK RECEIVED:</label><input type="text" id="start_date" name="job_start_date" value="" /></div>
									<div><label>EST. SHIP DATE:</label><input type="text" name="job_end_date" id="end_date" value="" /></div>
									<div class="clearfix" style="position:relative;">
										<label>TRACKING NUMBER:</label>
										<input type="text" name="job_info[]" value="" style="float:left;" />
										<img onclick="addTrackNum();" alt="Add track number" style="cursor:pointer; position:absolute; top:8px; right:-30px;" src="/source/images/plus.jpg"></label>
									</div>
									<div id="carriers" style="display:none; padding:0;"></div>
									<div>
										<label>CARRIER:</label>
										<select style="width:210px;" name="job_carrier" id="jc" onchange="isOther();">
											<option value="Daylight">Daylight</option>
											<option value="FedEx Freight">FedEx Freight</option>
											<option value="FedEx National">FedEx National</option>
											<option value="FedEx Ground">FedEx Ground</option>
											<option value="UPS">UPS</option>
											<option value="other">other</option>
										</select> 
										<input type="input" name="other_text" id="other_text" style="width: 107px; position:absolute; top:3px; right:-129px; display:none;" />
									</div>
								
								<br /><br /><br />
								<div class="attach">
									<div class="h bor clearfix">
										<p class="p1">ATTACHMENTS</p>
										<p class="p2">ADD NEW ATTACHMENT <img src="/source/images/plus.jpg" alt="" onclick="addAtt();" /></p>
									</div>
									<div class="files">
									<div id="atts"></div>
									</div>
								</div>
							</div>
							<div class="notes">
								<div class="h bor clearfix">
									<p class="p1">NOTES</p>
									<p class="p2">ADD NEW NOTE <img src="/source/images/plus.jpg" onclick="readitback(); $('#add_note').slideDown();" alt="" /></p>
								</div>
								
								<div id="notes_list" class="note_detail">
										<div class="par clearfix" id="full_text" style="width:{$width}px;"></div>
										<div class="next_prev">
											<a id="toprev" href="#" onclick="toprev(); return false;"><img src="/source/images/prev.jpg" alt="" /> <span>prev</span></a>
											|
											<a onclick="readitback(); return false;" href="#">close</a>
											|
											<a id="tonext" href="#" onclick="tonext(); return false;"><span>next</span> <img src="/source/images/next.jpg" alt="" /></a>
										</div>
								</div>
								<span id="notes_here"></span>
								<div id="add_note" style="display:none;">
									<br />
									<textarea style="width:419px; height:100px; border:1px dotted #ccc;" id="note_area" name="note"></textarea> 
									<p style="text-align:right;"><input type="button" value="Add" onclick="addNote();" />&nbsp;<input type="button" onclick="$('#add_note').slideUp(); $('#note_area').val('');" value="Cancel" /></p>
								</div>
							</div>
						
									
								
						</div>
						<br /><br />
						<div class="btns">
							
							<a href="#" onclick="runBar(); addNotes(); $('#edit_form').submit(); return false;" class="btn">Add</a>
							<a href="/area/main/" class="btn">Cancel</a>
						</div>
					</div>
					</form>
				</div> <!-- end rep content page -->
			</div>
		</div>
	</div>
</div>
