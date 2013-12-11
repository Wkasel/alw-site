<link href="/source/css/ui/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/source/js/accord.js"></script>
<script type="text/javascript" src="/source/js/jquery.ui.core.js"></script>
<script type="text/javascript">
{literal}
		$(function(){
		$('.accord > ul').accordion();
		
});

function goOut() {
	value = $('#calc_form').val();
	window.location = '/static/' + value;
}
		
{/literal}
</script>
<div class="rep_content_page clearfix"> <!-- rep content page -->
							<div class="left_side"> <!-- left side of rep content -->
		<div class="content_name">Rep Content</div>
		<div class="accord">
			<ul>
				<li><span><a href="/content/rep_area/job_status/">Order Status</a></span></li>
				<li> <span><a href="/content/rep_area/email/">Spec Registration</a></span></li>
				<li> <span><a href="/content/rep_area/calc/" class="active">Pricing (Calculators)</a></span></li>
				{foreach from=$nav item=node}
				<li {if $article->ra_cat eq $node->reps_cats_id} class="selected_class"{/if}> <span>{$node->rc_name}</span>
					<ul>
						{foreach from=$node->items item=subnode}
							<li><a href="/content/rep_area/article/{$subnode->reps_articles_id}/"{if $subnode->reps_articles_id eq $art_id} class="selected"{/if}>{$subnode->ra_name}</a></li>
						{/foreach}
					</ul>
				</li>
				{/foreach}
			</ul>

		</div>
	</div> <!-- end left side of rep content -->
	<div class="right_side"> <!-- right side of rep content -->
		
		<div class="find_res" style="margin-left:10px;">
		<h3>Select Product Category Below:</h3>
			<form name="form1" class="dsR80 dsR778">
								<select onchange="goOut();" size="1" name="select1" class="dsR725" id="calc_form">
								  <option value="PRICING_CALCULATORS/LPONE2013/LPONE2013.htm">Lightplane One(Recessed/Suspended/Wall(LP1/LP ONE)</option>
								  <option value="PRICING_CALCULATORS/LINEAR_LIGHTPLANE_CALCULATOR 2012.htm">Lightplane Linear 2&quot; Suspended/Wall/Ceiling (LPL/WLP)</option>
								  <option value="PRICING_CALCULATORS/LIGHTPLANE_LINEAR_3_5INS_SURFACE__2012/LIGHTPLANE_LINEAR_3_5INS_SURFACE__2012.htm">Lightplane Linear 3.5&quot; Suspended/Wall/Ceiling(LPL3.5/WPL3.5)</option>
								  <option value="PRICING_CALCULATORS/LINEAR_LIGHTPLANE_6INS_CALCULATOR_2012.htm">Lightplane Linear 6&quot; SERIES(LPL6)</option>     
                                                                     
                                  <option value="PRICING_CALCULATORS/TRIPLANE_CALCULATOR_2013/TRIPLANE_CALCULATOR_2013.htm">Triplane (TRP)</option>
                                  <option value="PRICING_CALCULATORS/HBEAM2013v1/HBEAM2013v1.htm">H Beam(HBS/HBW)</option>
                                  <option value="PRICING_CALCULATORS/HBEAM3.5_2013v2/HBEAM3.5 2013v2.htm">H Beam 3.5inch (HB3.5S/HB3.5W)</option> 
                                  <option value="PRICING_CALCULATORS/LPLUUv1/LPLUUv1.htm">Lightplane Up and Under (LPLUU)</option>
                                  <option value="PRICING_CALCULATORS/WALL_GRAZER_CALCULATOR_2010.htm">Lightplane Wall Grazer (LPWG)</option> 
                                  <option value="PRICING_CALCULATORS/LIGHTPLANE_ROUND_SUSP_CALCULATOR_2010.htm">Lightplane Round - Suspended (LPR)</option>
<option value="PRICING_CALCULATORS/LIGHTPLANE_ROUND_WALL_CALCULATOR_2010.htm">Lightplane Round - Wall (LPR)</option>

									<option value="PRICING_CALCULATORS/LINEAR_LADDER_CALCULATOR_2012.htm">Ladder (LDC/LDW)</option>
									<option value="PRICING_CALCULATORS/FIVEBOW_CALCULATOR_2010.htm">Five/Eight Bow (FB)</option>

									<option value="PRICING_CALCULATORS/LIGHTBAR_CALCULATOR_2012.htm">LP Lightbar (LPLB)</option>
                                  <option value="PRICING_CALCULATORS/LIGHTPLANE_9_CALCULATOR_2013/LIGHTPLANE_9_CALCULATOR_2013.htm">Lightplane 9 (LP9)</option>
                                   <option value="PRICING_CALCULATORS/LIGHTPLANE_9_HYWIRE_CALCULATOR_2010.htm">Lightplane 9 - Hywire(LP9-HY))</option>
	
        						    <option value="PRICING_CALCULATORS/LP11_CALCULATOR_2012/LP11_CALCULATOR_2012.htm">Lightplane 11 (LP11)</option>
                                    
								  <option value="PRICING_CALCULATORS/LP15_CALCULATOR_2010.htm">Lightplane 15 (LP15)</option>
                                    
<option value="PRICING_CALCULATORS/LPCPcalc.htm">Ceiling Panel System (LPCS)</option>
									<option value="PRICING_CALCULATORS/CAS_FIXTURE_CALCULATOR_2009.htm">CAS (CAS)</option>
									<option value="PRICING_CALCULATORS/LP_MONOPOINTS_2010.htm">LP Mono (LPM)</option>

                                    <option value="PRICING_CALCULATORS/COMMALITE_CALCULATOR_2012.htm">Commalite (CML)</option>
                                    
<option value="PRICING_CALCULATORS/CP_SYSTEM_CALCULATOR_2010.htm">CP PENDANT/CEILING System</option>
							

<option value="PRICING_CALCULATORS/WSCP_SYSTEM_CALCULATOR_2010.htm">CP WALL System (WSCP)</option>
									<option value="PRICING_CALCULATORS/KELLY_CALCULATOR_2012.htm">Kelly Pendants (KP)</option>
									<option value="PRICING_CALCULATORS/LIGHTPLANE_11_RECESSED_2010.htm">Lightplane 11 Recessed (LPR11)</option>
									<option value="PRICING_CALCULATORS/LUCERNA_ROUND_REFLECTOR_2009_CALCULATOR.htm">Lucerna (LUC)</option>
                                    <option value="PRICING_CALCULATORS/LPONE2013_313.htm">Lightplane One(Recessed/Suspended/Wall(LP1/LP ONE)</option>
									<option value="PRICING_CALCULATORS/LINEAR_LIGHTPLANE_RECESSED_2INS_CALCULATOR_2012.htm">Lightplane Linear Recessed 2&quot; Profile(LPLR)</option>
									<option value="PRICING_CALCULATORS/RCSMini_files/RCSMini.htm">RCS Mini (RCS-Mini)</option>
                                    <option value="PRICING_CALCULATORS/LYTESPOTfinalv4wMP/LYTESPOTfinalv4wMP.htm">Recessed Lytespot (RCS)</option> 
                                    <option value="PRICING_CALCULATORS/LPLR3.5_Calculator_4-13/LPLR3.5_Calculator_4-13.htm">Lightplane Linear Recessed 3.5&quot; Profile (LPLR3.5&quot;)</option>
                                     <option value="PRICING_CALCULATORS/LPLR5_2013-bugfix/LPLR5_2013-bugfix.htm">Lightplane Linear Recessed 5" Profile (LPLR5)</option>
									<option value="PRICING_CALCULATORS/LINEAR_LIGHTPLANE_RECESSED_6INS_CALCULATOR_2010.htm">Lightplane Linear Recessed 6&quot; Profile (LPLR6T/LPLR6/LPLR6RL)</option>
                                    
                                   <option value="PRICING_CALCULATORS/LPLWWTREDO/LPLWWTREDO.htm">Lightplane Linear Wall Wash (LPLWWT)</option> 
                                 
									
									
<option value="2009_Pricing_Calculators/PLATES_CALCULATOR_2009.htm">Plates(PL)</option>
                                    <option value="PRICING_CALCULATORS/SIMPLEfORM_ESTIMATOR.htm">SimpleForm (SF)</option>
                                    <option value="PRICING_CALCULATORS/REGENCY-GROOVE_CALCULATOR_2009.htm">Regency and Groove (REG/ GRV)</option>
                                                </select> <input type="button" onclick="goOut();" value="Go"><br>
								
							</form>
		</div>
	</div> <!-- end right side of rep content -->
</div>