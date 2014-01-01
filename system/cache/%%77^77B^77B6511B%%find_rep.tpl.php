<?php /* Smarty version 2.6.18, created on 2014-01-01 11:15:54
         compiled from find_rep.tpl */ ?>
<script type="text/javascript" src="/source/js/nf.js"></script>
<script type="text/javascript">
<?php echo '
	$(function(){
		$("#country").change(function(){
			var val = $(this).val();
			if(val == "usa"){
				$("#provinces").parent().hide()
				$("#states").parent().show();
			}else if(val == "canada"){
				$("#states").parent().hide();
				$("#provinces").parent().show();
			}else{
				$("#rep_form").submit();
			}
		});
		$("#states").change(function(){$("#rep_form").submit();});
		$("#provinces").change(function(){$("#rep_form").submit();});
	})
'; ?>

</script>
<div class="find_a_rep">
		<br /><br />
		<h1>Find a Rep</h1>
		<br />
		<form action="#asd" method="post" name="find" id="rep_form">
			<div style="padding:0 0 10px 0;">
				<select id="country" class="styled" name="country" style="width:170px;">
					<option value="">SELECT A COUNTRY</option>
					<option value="usa">USA</option>
					<option value="canada">Canada</option>
					<option value="uk">United Kingdom</option>
				</select>
			</div>
			<div style="display:none; padding:0 0 10px 0;">
				<select id="states" class="styled" name="state">
					<option value="">SELECT A STATE</option>
					<option value="all">All States</option> 
					<option value="AL">Alabama</option> 
					<option value="AK">Alaska</option> 
					<option value="AZ">Arizona</option> 
					<option value="AR">Arkansas</option> 
					<option value="CA">California</option> 
					<option value="CO">Colorado</option> 
					<option value="CT">Connecticut</option> 
					<option value="DE">Delaware</option> 
					<option value="DC">District Of Columbia</option> 
					<option value="FL">Florida</option> 
					<option value="GA">Georgia</option> 
					<option value="HI">Hawaii</option> 
					<option value="ID">Idaho</option> 
					<option value="IL">Illinois</option> 
					<option value="IN">Indiana</option> 
					<option value="IA">Iowa</option> 
					<option value="KS">Kansas</option> 
					<option value="KY">Kentucky</option> 
					<option value="LA">Louisiana</option> 
					<option value="ME">Maine</option> 
					<option value="MD">Maryland</option> 
					<option value="MA">Massachusetts</option> 
					<option value="MI">Michigan</option> 
					<option value="MN">Minnesota</option> 
					<option value="MS">Mississippi</option> 
					<option value="MO">Missouri</option> 
					<option value="MT">Montana</option> 
					<option value="NE">Nebraska</option> 
					<option value="NV">Nevada</option> 
					<option value="NH">New Hampshire</option> 
					<option value="NJ">New Jersey</option> 
					<option value="NM">New Mexico</option> 
					<option value="NY">New York</option> 
					<option value="NC">North Carolina</option> 
					<option value="ND">North Dakota</option> 
					<option value="OH">Ohio</option> 
					<option value="OK">Oklahoma</option> 
					<option value="OR">Oregon</option> 
					<option value="PA">Pennsylvania</option> 
					<option value="RI">Rhode Island</option> 
					<option value="SC">South Carolina</option> 
					<option value="SD">South Dakota</option> 
					<option value="TN">Tennessee</option> 
					<option value="TX">Texas</option> 
					<option value="UT">Utah</option> 
					<option value="VT">Vermont</option> 
					<option value="VA">Virginia</option> 
					<option value="WA">Washington</option> 
					<option value="WV">West Virginia</option> 
					<option value="WI">Wisconsin</option> 
					<option value="WY">Wyoming</option>
					<option value="PR">Puerto Rico</option>
				</select>
			</div>
			<div style="display:none; padding:0 0 10px 0;">
				<select id="provinces" class="styled" name="province" style="width:170px;">
					<option value="all" selected="selected">SELECT A PROVINCE</option>
					<option value="all">All Provinces</option>
					<option value="Alberta">Alberta</option>
					<option value="British Columbia">British Columbia</option>
					<option value="Manitoba">Manitoba</option>
					<option value="New Brunswick">New Brunswick</option>
					<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
					<option value="Northwest Territories">Northwest Territories</option>
					<option value="Nova Scotia">Nova Scotia</option>
					<option value="Nunavut">Nunavut</option>
					<option value="Ontario">Ontario</option>
					<option value="Prince Edward Island">Prince Edward Island</option>
					<option value="Quebec">Quebec</option>
					<option value="Saskatchewan">Saskatchewan</option>
					<option value="Yukon Territory">Yukon Territory</option>
				</select>
			</div>
		</form>
		<?php if (! $this->_tpl_vars['find']): ?>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<?php endif; ?>
		<?php if ($this->_tpl_vars['find']): ?>
			<div class="info clearfix">
			<?php if (count ( $this->_tpl_vars['reps'] ) > 0): ?>
			<?php $_from = $this->_tpl_vars['reps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['asd'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['asd']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['asd']['iteration']++;
?>
				<div <?php if ($this->_foreach['asd']['iteration'] == 1): ?>id="asd"<?php endif; ?>>
					<h2><?php echo $this->_tpl_vars['node']->office_name; ?>
</h2>
					<h3><?php echo $this->_tpl_vars['node']->office_desc; ?>
</h3>
					<p>
						<?php echo $this->_tpl_vars['node']->office_address; ?>

					</p>
					<a href="<?php echo $this->_tpl_vars['node']->office_link; ?>
"><?php echo $this->_tpl_vars['node']->office_url; ?>
</a>
				</div>
			<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
				<h3 style="text-align:center; color:#9b0000;">No Reps in this location</h3>
			<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</div>