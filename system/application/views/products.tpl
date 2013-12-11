<script type="text/javascript">
	{literal}
		$(function(){
			$("#featured_products_slider").slider({w:426, h:339});
			$("#custom_slider").slider({w:426, h:339});
		});
	{/literal}
</script>
<div class="prod_phot"> <!-- products photo -->
							<ul class="clearfix">
							{foreach from=$cats item=node}
								<li>
									<a href="/content/cat/{$node->pc_name}/">
										<img src="/source/images/cats/{$node->pc_image}" alt="{$node->pc_name}" />
										<span class="clearfix">
											<img src="/source/images/arrow.png" alt="" />
											{$node->pc_name|upper}
										</span>
										<img class="span_bg2" src="/source/images/prod_span_bg2.gif" alt="" />
									</a>
								</li>
							 {/foreach}
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
										{foreach from=$featured item=node2}
										<img onclick="location.href='/content/featured/{$node2->featured_id}/'" src="/source/images/site_images/{$node2->p_image1}" alt="" />
										{/foreach}
									</div>
									<div class="checker clearix">
										<div class="btns">
											<ul class="clearix">
												{foreach from=$featured name=links item=node2}
												<li><a href="#"></a></li>
												{/foreach}
											</ul>
										</div>
										<div class="name">
											<span>{$featured.0->nane}</span>
										</div>
									</div>
									<ul class="names">
										{foreach from=$featured item=node}
										<li>{$node->nane}</li>
										{/foreach}
									</ul>
								</div>
							</div>
							<div class="prod proj">
								<div class="h">CUSTOM PROJECTS</div>
								<div id="custom_slider" class="slider">
								<div class="prev">
									{foreach from=$custom item=node2}
										<img onclick="location.href='/content/project/{$node2->project_id}/'" src="/source/images/site_images/{$node2->p_image1}" alt="" />
									{/foreach}
								</div>
								<div class="checker clearix">
									<div class="btns">
										<ul class="clearix">
											{foreach from=$custom name=links item=node2}
											<li><a href="#"></a></li>
											{/foreach}
										</ul>
									</div>
									<div class="name">
										<span>{$custom.0->name}</span>
									</div>
								</div>
								<ul class="names">
									{foreach from=$custom name=links item=node2}
									<li>{$node2->p_name}</li>
									{/foreach}
								</ul>
							</div>
							</div>
						</div> <!-- end preview products -->

					</div>
				</div> 