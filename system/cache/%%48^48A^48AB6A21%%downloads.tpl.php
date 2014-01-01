<?php /* Smarty version 2.6.18, created on 2014-01-01 11:24:05
         compiled from downloads.tpl */ ?>
<div class="bread"> <!-- bread crumbs -->
	<a href="/" style="">Home</a> / Downloads
</div> <!-- end bread crumbs -->
<div class="downloads clearfix" style="padding: 20px;">
  <br />
  <?php $_from = $this->_tpl_vars['downloads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['download']):
?>
  <p><?php echo $this->_tpl_vars['download']; ?>
</p>
  <?php endforeach; endif; unset($_from); ?>
</div>