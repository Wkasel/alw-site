$(function(){
//Header inputs
	$(".sear4").focus(function(){
		if($(this).val() == "Search") $(this).val("");
	});
	$(".sear4").blur(function(){
		if($(this).val() == "") $(this).val("Search");
	});
	$(".nav .name").focus(function(){
		if($(this).val() == "User") $(this).val("");
	});
	$(".nav .name").blur(function(){
		if($(this).val() == "") $(this).val("User");
	});
	$(".nav .passshow").focus(function(){
		if($(this).val() == "Password"){
			$(this).hide();
			$(".nav .passhide").show().focus();
		} 
	});
	$(".nav .passhide").blur(function(){
		if($(this).val() == ""){
			$(this).hide();
			$(".nav .passshow").show().val("Password");
		}
	});
	
//Edit Table
	$("table.editable td").dblclick(function(){
		//get this data
		_this = this;
		parent = $(_this).parent();
		id = $("td.id",parent).text();
		field = $(_this).attr("class");
		edit_data = $(_this).text();
		if(field == "job_po") {
			return false;
		}
		if(field == "job_start_date"){
			$(_this).html("<input id='from' type='text' value='"+edit_data+"' />");
			var dates = $('#from, #to').datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				buttonImageOnly: true,
				onSelect: function() {
					data = $(this).val();
					$.ajax({
						url:"/area/change_table/",
						type:"post",
						data:"id="+id+"&field="+field+"&data="+data,
						success:function() {
							$(_this).html(data);
						}
					});
				}
			});
			$("#from").blur(function(){
				//var select_value = window.my_value;
				//$(_this).html(select_value);
			});
		}else if(field == "job_end_date"){
			$(_this).html("<input id='to' type='text' value='"+edit_data+"' />");
			var dates = $('#from, #to').datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				buttonImageOnly: true,
				onSelect: function() {
					data = $(this).val();
					$.ajax({
						url:"/area/change_table/",
						type:"post",
						data:"id="+id+"&field="+field+"&data="+data,
						success:function(){
							$(_this).html(data);
						}
					});
				}
			});
			$("#to").blur(function(){
				//var select_value = $("#to").val();
				//$(_this).html(select_value);
			});
		} else if (field == "job_rep") {
			$.ajax({
				type: "POST",
				url: "/area/get_select/",
				data: "selected=" + $(_this).text(),
				success: function(msg){
					if (msg != false) {
						$(_this).html(msg);
						$("#job_select").focus();
						$("#job_select").change(function() {
							var select_value = $("#job_select").val();
							$(_this).html(select_value);
							$.ajax({
								url:"/area/change_table/",
								type:"post",
								data:"id="+id+"&field="+field+"&data=" + select_value,
								success:function(){
									
								}
							});
						});
						$("#job_select").blur(function() {
							var select_value = $("#job_select").val();
							$(_this).html(select_value);
							$.ajax({
								url:"/area/change_table/",
								type:"post",
								data:"id="+id+"&field="+field+"&data=" + select_value,
								success:function(){
									
								}
							});
						});
					}
				}
				});
			
		} else{
			$(_this).html("<input type='text' value='"+edit_data+"' />");
		}
		
		$("input", _this).focus();
		$("input", this).keypress(function(e){
			if(e.keyCode == 13){
				data = $(this).val();
				$.ajax({
					url:"/area/change_table/",
					type:"post",
					data:"id="+id+"&field="+field+"&data="+data,
					success:function(){
						$(_this).html(data);
					}
				});
			}
		});
		if(!$("input", this).attr("id")){
			$("input", this).blur(function(){
				data = $(this).val();
				$.ajax({
					url:"/area/change_table/",
					type:"post",
					data:"id="+id+"&field="+field+"&data="+data,
					success:function(){
						$(_this).html(data);
					}
				});
			});
		}
	});
})


function auth() {
	$.ajax({
	type: "POST",
	url: "/content/auth/",
	data: "login=" + $('#login')[0].value + "&password=" + $('#password')[0].value,
	success: function(msg){
		if (msg != false) {
			if (msg == 'success') {
				window.location = '/content/rep_area/job_status/'; 
			} else {
				window.alert(msg);
			}
			return false;
		}
	}
	});
	return false;
}

function areaLogin() {
	$.ajax({
	type: "POST",
	url: "/area/auth/",
	data: "login=" + $('#login')[0].value + "&password=" + $('#password')[0].value,
	success: function(msg){
		if (msg != false) {
			if (msg == 'success') {
				window.location = '/area/main/';
			} else {
				window.alert(msg);
			}
			return false;
		}
	}
	});
	return false;
}

function runAjax(url) {
	$.ajax({
	type: "POST",
	url: url,
	data: "run=true",
	success: function(msg){
		$('#edit_form').submit();
		}
	});
	return false;
}

