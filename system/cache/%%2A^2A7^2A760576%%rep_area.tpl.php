<?php /* Smarty version 2.6.18, created on 2014-01-01 12:19:51
         compiled from rep_area.tpl */ ?>
	<script type="text/javascript" src="/source/js/accord.js"></script>

<script type="text/javascript">
<?php echo '
$(function(){
		$(\'.accord > ul\').accordion();
	});
	
'; ?>

</script>
<div class="rep_content_page clearfix"> <!-- rep content page -->
	<div class="left_side"> <!-- left side of rep content -->
		<div class="content_name">Rep Content</div>
		<div class="accord">
			<ul>
				<li> <span><a href="/content/rep_area/job_status/">Order Status</a></span></li>
				<li> <span><a href="/content/rep_area/email/">Registrations</a></span></li>
				<li> <span><a href="/content/rep_area/calc/">Pricing (Calculators)</a></span></li>
				<?php $_from = $this->_tpl_vars['nav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
				<li <?php if ($this->_tpl_vars['article']->ra_cat == $this->_tpl_vars['node']->reps_cats_id): ?> class="selected_class"<?php endif; ?>> <span><?php echo $this->_tpl_vars['node']->rc_name; ?>
</span>
					<ul>
						<?php $_from = $this->_tpl_vars['node']->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subnode']):
?>
							<li><a href="/content/rep_area/article/<?php echo $this->_tpl_vars['subnode']->reps_articles_id; ?>
/"<?php if ($this->_tpl_vars['subnode']->reps_articles_id == $this->_tpl_vars['art_id']): ?> class="selected"<?php endif; ?>><?php echo $this->_tpl_vars['subnode']->ra_name; ?>
</a></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
				</li>
				<?php endforeach; endif; unset($_from); ?>
			</ul>

		</div>
	</div> <!-- end left side of rep content -->
	<div class="right_side"> <!-- right side of rep content -->
		<div style="font-family:Verdana; font-size:13px; color:#000; padding:0 10px 10px 0;"><?php echo $this->_tpl_vars['article']->ra_desc; ?>
</div>
	</div> <!-- end right side of rep content -->
</div> 

<script type="text/javascript">
<?php echo '
$(\'.selected_class > ul\').accordion();
'; ?>

</script>