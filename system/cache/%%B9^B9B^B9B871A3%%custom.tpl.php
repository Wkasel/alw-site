<?php /* Smarty version 2.6.18, created on 2013-12-16 01:47:50
         compiled from custom.tpl */ ?>
<div style="color:#fff; padding: 50px;">
<?php $_from = $this->_tpl_vars['content_items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['content_item']):
?>
<p><?php echo $this->_tpl_vars['content_item']; ?>
</p>
<?php endforeach; endif; unset($_from); ?>
</div>