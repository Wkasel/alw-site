<link href="/source/js/niceform.js" rel="stylesheet" type="text/css" />
<link href="/source/css/form.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/source/js/niceform.js"></script>
<script type="text/javascript">
{literal}
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
{/literal}
</script>
<div class="find_a_rep">
		<img alt="" src="/source/images/find_a_per_h.jpg">
		<h1>Find a Rep</h1>

		<form action="" method="post" name="find" id="rep_form">
			<div>
				<select id="country" class="styled" name="country">
					<option value="sel">SELECT A COUNTRY</option>
					<option value="usa">USA</option>
					<option value="canada">Canada</option>
					<option value="uk">United Kindom</option>
				</select>
			</div>
			<div style="display:none;">
				<select id="states" class="styled" name="state">
					<option value="all" selected="selected">SELECT A STATE</option>
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
				</select>
			</div>
			
			<div style="display:none;">
				<select id="provinces" class="styled" name="province">
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
		{if $find}
			<div class="info clearfix">
			{if count($reps) > 0}
			{foreach from=$reps item=node}
				<div>
					<h2>{$node->office_name}</h2>
					<h3>{$node->office_desc}</h3>
					<p>
						{$node->office_address}
					</p>
					<a href="{$node->office_url}">{$node->office_url}</a>
				</div>
			{/foreach}
			{else}
				<h3>No Reps in this location</h3>
			{/if}
			</div>
		{/if}
	</div>
</div>