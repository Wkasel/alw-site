<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<title>Admin area</title>
<link rel="stylesheet" type="text/css" href="/source/css/admin/style.css" />
<script type="text/javascript" src="/source/js/admin/fckeditor/fckeditor.js"></script>
<script type="text/javascript" src="/source/js/admin/admin-functions.js"></script>
<script type="text/javascript" src="/source/js/admin/jquery-1.3.2.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="/source/css/admin/calendar/aqua.css" title="aqua" />
<link rel="stylesheet" href="/source/css/admin/calendar/calendar-win2k-cold-1.css" />
<script type="text/javascript" src="/source/js/admin/calendar/zapatec.js"></script>
<script type="text/javascript" src="/source/js/admin/calendar/calendar.js"></script>
<script type="text/javascript" src="/source/js/admin/calendar/calendar-setup.js"></script>
<script type="text/javascript" src="/source/js/admin/calendar/calendar-en.js"></script>
{if isset($tree)}
<script type="text/javascript" src="/source/js/admin/ajax.js"></script>
<script type="text/javascript" src="/source/js/admin/context-menu.js"></script>
<script type="text/javascript" src="/source/js/admin/drag-drop-folder-tree.js"></script>
<link rel="stylesheet" href="/source/css/admin/drag-drop-folder-tree.css" type="text/css"></link>
<link rel="stylesheet" href="/source/css/admin/context-menu.css" type="text/css"></link>
{/if}
</head>


<body id="users">

<table cellpadding="0" cellspacing="0" id="page"  >
<tr id="header">
	<td><a href="http://{$site_name}">http://{$site_name}</a></td>
		<td>
		<span>Atomic panel</span>
		<div>
			Logged as {$user_name} <a href="/{$my_mode}/logout">Logout</a>

		</div>
	</td>
	</tr>
<tr>
	<td id="menu">
		<img src="/source/images/{$my_mode}/m_top.gif" width="183" height="10" alt="" />
		<dl>
		{if $user_name eq 'admin'}
			<dd  {if $current eq 'pers'}id="activeItem"{/if}><a href="/{$my_mode}/permissions/">Permissions</a></dd>
		{/if}
			{foreach from=$menu key=key item=value}
			{if $key|strpos:"skip_" !== false}<dd style="background-image:none; background-color:#FFF; border-right: 1px #CCC;"><b>{$value}</b></dd>
			{else}
			<dd  {if $key eq $current}id="activeItem"{/if}><a href="/{$my_mode}{if $key neq 'tree'}/index{/if}/{$key}/">{$value}</a></dd>
			{/if}
			{/foreach}
			<dd><a href="/{$my_mode}/logout/">Logout</a></dd>
		</dl>
		<img src="/source/images/{$my_mode}/m_bot.gif" width="183" height="10" alt="" />
	</td>
<td rowspan="2" id="content">
{$content}
</td>
	</tr>
	<tr>
		<td id="copy">&nbsp;</td>
	</tr>
</table>
</body>
</html>