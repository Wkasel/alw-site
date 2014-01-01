<?php /* Smarty version 2.6.18, created on 2014-01-01 11:24:16
         compiled from event_calendar.tpl */ ?>
<div id="event_calendar">
	<?php $_from = $this->_tpl_vars['event']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['event']):
?>
		<?php echo $this->_tpl_vars['event']->event_calendar_content; ?>

	<?php endforeach; endif; unset($_from); ?>
</div>