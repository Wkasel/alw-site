{if count($errors) > 0}
	<table cellpadding="0" cellspacing="0">
	<tr>
		<td style="padding:10px;">
			<b style="color:#FF0000">Произошли следующие ошибки:</b><br />
			{foreach from=$errors item=node}
			{if $node.type eq 'MIN_LENGTH'}
			Значение поля  <b>{$node.name}</b> слишком мало<br />
			{elseif $node.type eq 'MIN_LENGTH'}
			Значение поля  <b>{$node.name}</b> слишком велико<br />
			{elseif $node.type eq 'EMAIL'}
			Вы ввели некорректный email адрес в поле <b>{$node.name}</b><br />
			{elseif $node.type eq 'REGEX'}
			Значение поля  <b>{$node.name}</b> не соответсвует шаблону<br />
			{elseif $node.type eq 'NO_FILE'}
			Вы не загрузили файл в поле <b>{$node.name}</b><br />
			{elseif $node.type eq 'EXTENTION'}
			Вы загрузили файл с запрещенным расширением в поле <b>{$node.name}</b><br />
			{/if}
			{/foreach}
		</td>
	</tr>
	</table><br />
{/if}
