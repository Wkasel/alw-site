<form method="POST">
<h2>Рассылка</h2>
<span style="color:#ff0000; font-weight:bold">{$msg}</span>
<table cellpadding="0" cellspacing="0" class="inline">
	<tr>
	<td style="width:130px;">Группа пользователей</td>
	<td>
		<select name="group">
			<option value="1">Заказчики (ru)</option>
			<option value="2">Заказчики (en)</option>
			<option value="3">Фрилансеры (ru)</option>
			<option value="4">Фрилансеры (en)</option>
		</select>
	</td>
	</tr>
	<tr>
	<td colspan="2">Текст сообщения</td>
	</tr>
	<tr>
	<td colspan="2"><script type="text/javascript">
					var sBasePath = '/source/js/admin/fckeditor/';
					var oFCKeditor_ = new FCKeditor('text')
					oFCKeditor_.BasePath	= sBasePath ;
					oFCKeditor_.Height	= 350;
					oFCKeditor_.Value	= '';
					oFCKeditor_.className = 'field';
					oFCKeditor_.Create() ;
					//-->
				</script></td>
	</tr>
	<tr>
	<td colspan="2"><input type="submit" value="Отправить" name="send" /></td>
	</tr>
</table>
</form>