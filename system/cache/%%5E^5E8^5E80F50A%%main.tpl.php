<?php /* Smarty version 2.6.18, created on 2013-12-10 18:19:35
         compiled from red_shadow/main.tpl */ ?>
<script type="text/javascript">
	<?php echo '
		$(function(){
			$("#slider_on_main").slider({w:940, h:367});
		});
	'; ?>

</script>
<div id="slider_on_main" class="slider">
	<div class="prev">
		<?php $_from = $this->_tpl_vars['iom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
			<img src="/source/images/images_on_main/<?php echo $this->_tpl_vars['node']->image; ?>
" alt="" />
		<?php endforeach; endif; unset($_from); ?>
	</div>
	<div class="checker clearix">
		<div class="btns">
			<ul class="clearix">
				<?php $_from = $this->_tpl_vars['iom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['links'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['links']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node2']):
        $this->_foreach['links']['iteration']++;
?>
				<li><a href="#"></a></li>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<div class="name">
			<span><?php echo $this->_tpl_vars['iom']['0']->desc; ?>
</span>
		</div>
	</div>
	<ul class="names">
		<?php $_from = $this->_tpl_vars['iom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['links'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['links']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node2']):
        $this->_foreach['links']['iteration']++;
?>
			<li><?php echo $this->_tpl_vars['node2']->desc; ?>
</li>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
</div>