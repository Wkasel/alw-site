<script type="text/javascript" src="/source/js/accord.js"></script>

<script type="text/javascript">
{literal}
$(function(){
		$('.accord > ul').accordion();
	});
	
{/literal}
</script>
<div class="rep_content_page clearfix"> <!-- rep content page -->
	<div class="left_side"> <!-- left side of rep content -->
		<div class="content_name">Rep Content</div>
		<div class="accord">
			<ul>
				<li> <span><a href="/content/rep_area/job_status/">ORDER STATUS</a></span></li>
				<li> <span><a href="/content/rep_area/email/">Registrations</a></span></li>
				<li> <span><a href="/content/rep_area/calc/">Calculators</a></span></li>
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
		<div class="" style="color:#fff; padding:0 10px 10px 0;">{$article->ra_desc}</div>
	</div> <!-- end right side of rep content -->
</div> 

<script type="text/javascript">
{literal}
$('.selected_class > ul').accordion();
{/literal}
</script>