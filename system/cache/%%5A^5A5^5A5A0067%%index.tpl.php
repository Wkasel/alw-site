<?php /* Smarty version 2.6.18, created on 2013-12-16 00:43:31
         compiled from admin/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strpos', 'admin/index.tpl', 53, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<title>Admin area</title>
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="/source/css/admin/style.css" />
<link href="/source/js/admin/ckeditor/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/source/js/admin/ckeditor/ckeditor.js"></script>
<script src="/source/js/admin/ckeditor/sample.js" type="text/javascript"></script>


<script type="text/javascript" src="/source/js/admin/admin-functions.js"></script>
<script type="text/javascript" src="/source/js/admin/jq.js"></script>

<script type="text/javascript" src="/source/js/admin/calendar/zapatec.js"></script>
<script type="text/javascript" src="/source/js/admin/calendar/calendar.js"></script>
<script type="text/javascript" src="/source/js/admin/calendar/calendar-setup.js"></script>
<script type="text/javascript" src="/source/js/admin/calendar/calendar-en.js"></script>
<?php if (isset ( $this->_tpl_vars['tree'] )): ?>
<script type="text/javascript" src="/source/js/admin/ajax.js"></script>
<script type="text/javascript" src="/source/js/admin/context-menu.js"></script>
<script type="text/javascript" src="/source/js/admin/drag-drop-folder-tree.js"></script>
<link rel="stylesheet" href="/source/css/admin/drag-drop-folder-tree.css" type="text/css"></link>
<link rel="stylesheet" href="/source/css/admin/context-menu.css" type="text/css"></link>
<?php endif; ?>
</head>


<body id="users">

<table cellpadding="0" cellspacing="0" id="page"  >
<tr id="header">
	<td><a href="http://<?php echo $this->_tpl_vars['site_name']; ?>
">http://<?php echo $this->_tpl_vars['site_name']; ?>
</a></td>
		<td>
		<span>Atomic panel</span>
		<div>
			Logged as <?php echo $this->_tpl_vars['user_name']; ?>
 <a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/logout">Logout</a>

		</div>
	</td>
	</tr>
<tr>
	<td id="menu">
		<img src="/source/images/<?php echo $this->_tpl_vars['my_mode']; ?>
/m_top.gif" width="183" height="10" alt="" />
		<dl>
		<?php if ($this->_tpl_vars['user_name'] == 'admin'): ?>
			<dd  <?php if ($this->_tpl_vars['current'] == 'pers'): ?>id="activeItem"<?php endif; ?>><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/permissions/">Permissions</a></dd>
		<?php endif; ?>
			<?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<?php if (((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'skip_') : strpos($_tmp, 'skip_')) === false): ?>
				<?php if (((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('strpos', true, $_tmp, 'skip_') : strpos($_tmp, 'skip_')) !== false): ?><dd style="background-image:none; background-color:#FFF; border-right: 1px #CCC;"><b><?php echo $this->_tpl_vars['value']; ?>
</b></dd>
				<?php else: ?>
				<dd  <?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['current']): ?>id="activeItem"<?php endif; ?>><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
<?php if ($this->_tpl_vars['key'] != 'tree'): ?>/index<?php endif; ?>/<?php echo $this->_tpl_vars['key']; ?>
/"><?php echo $this->_tpl_vars['value']; ?>
</a></dd>
				<?php endif; ?>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
				<dd><a href="/<?php echo $this->_tpl_vars['my_mode']; ?>
/logout/">Logout</a></dd>
		</dl>
		<img src="/source/images/<?php echo $this->_tpl_vars['my_mode']; ?>
/m_bot.gif" width="183" height="10" alt="" />
	</td>
<td rowspan="2" id="content">
<?php echo $this->_tpl_vars['content']; ?>

</td>
	</tr>
	<tr>
		<td id="copy">&nbsp;</td>
	</tr>
</table>
</body>
</html>