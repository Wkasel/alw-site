<?php /* Smarty version 2.6.18, created on 2013-12-16 01:02:04
         compiled from products.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', 'products.tpl', 17, false),)), $this); ?>
<script type="text/javascript">
	<?php echo '
		$(function(){
			$("#featured_products_slider").slider({w:426, h:339});
			$("#custom_slider").slider({w:426, h:339});
		});
	'; ?>

</script>
<div class="prod_phot"> <!-- products photo -->
							<ul class="clearfix">
							<?php $_from = $this->_tpl_vars['cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
								<li>
									<a href="/content/cat/<?php echo $this->_tpl_vars['node']->pc_name; ?>
/">
										<img src="/source/images/cats/<?php echo $this->_tpl_vars['node']->pc_image; ?>
" alt="<?php echo $this->_tpl_vars['node']->pc_name; ?>
" />
										<span class="clearfix">
											<img src="/source/images/arrow.png" alt="" />
											<?php echo ((is_array($_tmp=$this->_tpl_vars['node']->pc_name)) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>

										</span>
										<img class="span_bg2" src="/source/images/prod_span_bg2.gif" alt="" />
									</a>
								</li>
							 <?php endforeach; endif; unset($_from); ?>
							</ul>
						</div> <!-- end products photo -->
						<div class="bread"> <!-- bread crumbs -->
							PRODUCTS / 
						</div> <!-- end bread crumbs -->
						<div class="preview clearfix"> <!-- preview products -->
							<div class="prod">
								<div class="h">FEATURED PRODUCTS</div>
								<div id="featured_products_slider" class="slider">
									<div class="prev">
										<?php $_from = $this->_tpl_vars['featured']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node2']):
?>
										<img onclick="location.href='/content/featured/<?php echo $this->_tpl_vars['node2']->featured_id; ?>
/'" src="/source/images/site_images/<?php echo $this->_tpl_vars['node2']->p_image1; ?>
" alt="" />
										<?php endforeach; endif; unset($_from); ?>
									</div>
									<div class="checker clearix">
										<div class="btns">
											<ul class="clearix">
												<?php $_from = $this->_tpl_vars['featured']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['links'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['links']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node2']):
        $this->_foreach['links']['iteration']++;
?>
												<li><a href="#"></a></li>
												<?php endforeach; endif; unset($_from); ?>
											</ul>
										</div>
										<div class="name">
											<span><?php echo $this->_tpl_vars['featured']['0']->nane; ?>
</span>
										</div>
									</div>
									<ul class="names">
										<?php $_from = $this->_tpl_vars['featured']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
										<li><?php echo $this->_tpl_vars['node']->nane; ?>
</li>
										<?php endforeach; endif; unset($_from); ?>
									</ul>
								</div>
							</div>
							<div class="prod proj">
								<div class="h">CUSTOM PROJECTS</div>
								<div id="custom_slider" class="slider">
								<div class="prev">
									<?php $_from = $this->_tpl_vars['custom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node2']):
?>
										<img onclick="location.href='/content/project/<?php echo $this->_tpl_vars['node2']->project_id; ?>
/'" src="/source/images/site_images/<?php echo $this->_tpl_vars['node2']->p_image1; ?>
" alt="" />
									<?php endforeach; endif; unset($_from); ?>
								</div>
								<div class="checker clearix">
									<div class="btns">
										<ul class="clearix">
											<?php $_from = $this->_tpl_vars['custom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['links'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['links']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node2']):
        $this->_foreach['links']['iteration']++;
?>
											<li><a href="#"></a></li>
											<?php endforeach; endif; unset($_from); ?>
										</ul>
									</div>
									<div class="name">
										<span><?php echo $this->_tpl_vars['custom']['0']->name; ?>
</span>
									</div>
								</div>
								<ul class="names">
									<?php $_from = $this->_tpl_vars['custom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['links'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['links']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node2']):
        $this->_foreach['links']['iteration']++;
?>
									<li><?php echo $this->_tpl_vars['node2']->p_name; ?>
</li>
									<?php endforeach; endif; unset($_from); ?>
								</ul>
							</div>
							</div>
						</div> <!-- end preview products -->

					</div>
				</div> 