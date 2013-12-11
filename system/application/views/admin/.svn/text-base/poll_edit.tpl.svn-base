<div class="inline" id="back">
		<a href="javascript: history.go(-1);"><img src="/source/images/admin/back.gif" width="21" height="21" alt="" /></a>
		<span>Упавление опросами :: редактировать опрос</span>

	</div>
	<h2>Упавление опросами :: редактировать опрос</h2>
	
<form action="/poll_admin/edit_item/{$data.poll.0->poll_id}/" method="POST">
<table cellpadding="0" cellspacing="0" class="inline">
	<tbody class="tbody overed">
	<tr>
		<td width="15%">Вопрос</td>
		<td><input type="text" name="poll_name" value="{$data.poll.0->poll_name}" style="width:250px;" /></td>
	</tr>
	<tr>
		<td width="15%">Действителен до</td>
		<td><input  type="text" name="poll_duedate" value="{$data.poll.0->poll_duedate}" id="poll_duedate" /><button type="reset" id="date_button">...</button>
		{literal}
		<script type="text/javascript">
		    Calendar.setup({
		        inputField     :    "poll_duedate",      // id of the input field
		        ifFormat       :    "%d.%m.%Y",       // format of the input field
		        showsTime      :    true,            // will display a time selector
		        button         :    "date_button",   // trigger for the calendar (button ID)
		        singleClick    :    true,           // double-click mode
		        step           :    1                // show all years in drop-down boxes (instead of every other year as default)
		    });
		    
		    function deleteRow(i){
    			document.getElementById('my_table').deleteRow(i);
			}
			
			function insRow(){
				var oRows = document.getElementById('my_table').getElementsByTagName('tr').length-1;
			    var x=document.getElementById('my_table').insertRow(oRows);
			    var y=x.insertCell(0);
			    var z=x.insertCell(1);
			    var v=x.insertCell(2);
			    y.innerHTML= '<input type="text" name="a_name[]" value="{/literal}{$node->a_name}{literal}" style="width:250px;" />';
			    z.innerHTML= '<input type="text" name="a_votes[]" value="{/literal}{$node->a_votes}{literal}" style="width:50px;" />';
			    v.innerHTML= '<img onclick="deleteRow(this.parentNode.parentNode.rowIndex)" width="20" height="20" alt="Delete" src="/source/images/admin/del.gif"/></a>';
			}
		</script>
		{/literal}	
		</td>
	</tr>
	<tr>
		<td width="15%">Всего голосов</td>
		<td><input type="text" name="poll_total_votes" value="{$data.poll.0->poll_total_votes}" style="width:250px;" /></td>
	</tr>
	</tbody>
</table>
<h3>Варианты ответов</h3>
<table cellpadding="0" cellspacing="0" width="40%" id="my_table" class="inline">
	<tbody class="tbody overed">
	<tr>
	<td><strong>Ответ</strong></td>
	<td><strong>Голосов</strong></td>
	<td><strong>Удалить</strong></td>
	</tr>
	{foreach from=$data.answers item=node} 
	<tr>
		<td width="30%"><input type="text" name="a_name[]" value="{$node->a_name}" style="width:250px;" /></td>
		<td width="10%"><input type="text" name="a_votes[]" value="{$node->a_votes}" style="width:50px;" /></td>
		<td><img onclick="deleteRow(this.parentNode.parentNode.rowIndex)" width="20" height="20" alt="Delete" src="/source/images/admin/del.gif"/></a></td>
	</tr>
	{/foreach}
	</tbody>
	<tfoot>
	<tr>
	<td colspan="4"><img onclick="insRow()" src="/source/images/admin/add.gif" width="20" height="20" alt="" /></td>
	</tr>
	</tfoot>
</table>
<br />
<table cellpadding="0" cellspacing="0" width="40%" class="inline">
<tr>
<td><input type="submit" name="edit" value="Изменить" /></td>
</tr>
</table>
</form>
