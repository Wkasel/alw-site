<script type="text/javascript" src="/source/js/jquery.timers.js"></script>
<script type="text/javascript">
{literal}
function myBanner (){
  $(".banner1").animate({
    opacity: '1',
    }, 1)
  $(".banner6").animate({
    opacity: '0',
    left:'669px'
    }, 1)    
  $(".banner1").delay(3000).animate({
    left: '-669px',
    }, 1000,function()
    {
      $(".banner1").css('opacity','0');
      $(".banner1").css('left','50px');
    })
    
  $(".banner2").animate({
    opacity: '1',
    }, 1)  
  $(".banner2").delay(3000).animate({
     left: '70px'
    }, 1000 )
  $(".banner2").delay(3000).animate({
    left: '-669px',
    }, 1500,function()
    {
      $(".banner2").css('opacity','0');
      $(".banner2").css('left','669px');
    })    
    
  $(".banner3").animate({
    opacity: '1',
    }, 1)  
  $(".banner3").delay(7300).animate({
     left: '70px'
    }, 1000 )
  $(".banner3").delay(3000).animate({
    left: '-669px',
    }, 1500,function()
    {
      $(".banner3").css('opacity','0');
      $(".banner3").css('left','669px');
    })    
    
  $(".banner4").animate({
    opacity: '1',
    }, 1)  
  $(".banner4").delay(11600).animate({
     left: '70px'
    }, 1000 )
  $(".banner4").delay(3000).animate({
    left: '-669px',
    }, 1500,function()
    {
      $(".banner4").css('opacity','0');
      $(".banner4").css('left','669px');
    })        
        
  $(".banner5").animate({
    opacity: '1',
    }, 1)  
  $(".banner5").delay(15800).animate({
     left: '70px'
    }, 1000 )
  $(".banner5").delay(3000).animate({
    left: '-669px',
    }, 1500,function()
    {
      $(".banner5").css('opacity','0');
      $(".banner5").css('left','669px');
    })
            
  $(".banner6").delay(20000).animate({
    opacity: '1',
    }, 0)
  $(".banner6").delay(10).animate({
     left: '50px'
    }, 1000 )    
}
$(document).ready(function() {
 myBanner ()
 $(".quickship_banner").everyTime(21400, function (){
     myBanner ()
 })          
})

{/literal}
</script>
	<!-- products -->
		<div class="products clearfix">
<!--		{foreach from=$pom item=node}
		<div class="prod">
		<a href="{$node->pom_link}"{if $node->pom_new_window} target="_blank"{/if}>
			<img src="/source/images/product_on_main/{$node->image}" alt="" />
		</a>
		<br /><a href="{$node->pom_link}"{if $node->pom_new_window} target="_blank"{/if}>{$node->pom_name}</a></div>
		{/foreach}
		
			<div class="about_alw">
				<img class="h" src="/source/images/about-alw.jpg" alt="" />
				<p class="text" style="line-height: 20px;">{$about->pages_content|truncate:150}</p><br />
				<a href="/content/pages/about/">
				<img class="more" src="/source/images/read-more.jpg" alt=""  class="more" />
				</a>
			</div> -->
<a href="http://www.archltgworks.com/quickship/">
<div class="quickship_banner" style="background: url('/source/images/banner_back.jpg') no-repeat scroll transparent;text-shadow: 2px 2px #ddd;">
   <div class="banner1" style="position:absolute;width:669px;left:50px;z-index:1;background-image: url('/source/images/banner_bg.png');">
      <div style="position:absolute;padding-left:50px;padding-top:20px">Introducing.. <br />
        <span style="font-size:48px;font-weight: bold">QUICK SHIP</span>
        <div style="position: absolute;left:350px;top:62px">
        	<img src="/source/images/banner_pfeil1.png" alt=""  />
        </div> 
      </div>
    <div style="z-index:0;width:200px;height:5px;position:absolute;left:400px;top:80px;background: url('/source/images/banner_linie00.png') no-repeat scroll transparent;">
    </div>      
   </div>
  <div class="banner2" style="position:absolute;width:669px;left:669px;top:50;z-index:1;background-image: url('/source/images/banner_bg.png');">
    <div style="width:121px;height:112px;position:absolute;left:5px;top:29px;background: url('/source/images/banner_stapler2.png') no-repeat scroll transparent;"></div>  
    <div style="position:absolute;width:400px;left:150px;top:52px;font-size:48px;font-weight: bold;">Ready to Ship</div>
    <div style="position: absolute;left:500px;top:63px">
      	<img src="/source/images/banner_pfeil1.png" alt=""  />
    </div> 
<!--    <div style="z-index:0;width:50px;height:5px;position:absolute;left:550px;top:80px;background: url('/source/images/banner_linie00.png') no-repeat scroll transparent;">
    </div>  -->  	
  </div>
  <div class="banner3" style="position:absolute;width:669px;left:669px;top:50;z-index:1;background-image: url('/source/images/banner_bg.png');">
      <div style="width:121px;height:112px;position:absolute;left:5px;top:45px;background: url('/source/images/banner_truck2.png') no-repeat scroll transparent;"></div>   
      <div style="position:absolute;width:400px;left:150px;top:25px;font-size:48px;font-weight: bold">5-7 Days Turn Around</div>
      <div style="position: absolute;left:500px;top:63px">
      	<img src="/source/images/banner_pfeil1.png" alt=""  />
      </div>
<!--    <div style="z-index:0;width:55px;height:5px;position:absolute;left:550px;top:80px;background: url('/source/images/banner_linie00.png') no-repeat scroll transparent;">
    </div>  --> 	
  </div>
  <div class="banner4" style="position:absolute;width:669px;left:669px;top:50;z-index:1;background-image: url('/source/images/banner_bg.png');">
      <div style="width:157px;height:112px;position:absolute;left:5px;top:25px;background: url('/source/images/banner_tools.png') no-repeat scroll transparent;"></div>   
      <div style="text-align:center;position:absolute;width:250px;left:210px;top:25px;font-size:48px;font-weight: bold">Hardware Included</div>
      <div style="position: absolute;left:500px;top:63px">
      	<img src="/source/images/banner_pfeil1.png" alt=""  />
      </div>	
  </div>  
  <div class="banner5" style="position:absolute;width:669px;left:669px;top:50;z-index:1;background-image: url('/source/images/banner_bg.png');">
      <div style="width:151px;height:125px;position:absolute;left:5px;top:5px;background: url('/source/images/banner_lamp.png') no-repeat scroll transparent;"></div>   
      <div style="position:absolute;width:490px;left:170px;top:52px;font-size:48px;font-weight: bold">No More Waiting</div>
  </div>
   <div class="banner6" style="position:absolute;width:669px;left:669px;z-index:3;background-image: url('/source/images/banner_bg.png');">
      <div style="position:absolute;padding-left:50px;padding-top:20px">Introducing.. <br />
        <span style="font-size:48px;font-weight: bold">QUICK SHIP</span>
        <div style="position: absolute;left:350px;top:62px">
        	<img src="/source/images/banner_pfeil1.png" alt=""  />
        </div> 
      </div>
    <div style="z-index:0;width:200px;height:5px;position:absolute;left:400px;top:80px;background: url('/source/images/banner_linie00.png') no-repeat scroll transparent;">
    </div>      
   </div>    
	</div>
 </a>
	<div class="quickship_banner_black" >
	</div> 
	<!-- end template-->
   	<div class="quickship_banner_black" style="left:669px">
  	</div>	
			<!-- <div  style="background: url('/source/images/circul.jpg') no-repeat scroll right top transparent;
                                    position:absolute;
                                    min-height: 168px;
                                    left:720px;
                                    width: 260px;
                                    z-index: 100;"
           >
        <img class="h" src="/source/images/about-alw.jpg" alt=""  />
        <p class="text" style="line-height: 20px;"></p><br />
        <a href="/content/pages/about/">
        <img class="more" src="/source/images/read-more.jpg" alt=""  class="more" />
        </a>
      </div> -->
		</div>  
	<!-- end products -->
<!-- end main page -->