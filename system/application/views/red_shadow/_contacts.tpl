<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=en&key=ABQIAAAArTkkrqs2eLg8eXUGtK5QahSay5tWU_zO5C77oVCdJ1VAFxGo1RTNcjcB5bgbE-bGx8rShR69Uo5VAA"></script>
<script type="text/javascript">
{literal}
	geocoder = new google.maps.Geocoder();

	function init() {
		geocoder.geocode( { 'address': '30984 Santana Street, Hayward, CA'}, function(results, status) {
	    	if (status == google.maps.GeocoderStatus.OK) {
	      		var latlng = new google.maps.LatLng(results[0].geometry.location.b, results[0].geometry.location.c);
			   	 	var myOptions = {
					zoom: 15,
					center: latlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
			    }
		    	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		    	marker = new google.maps.Marker({
	          		map: map, 
	          		position: results[0].geometry.location
	      		});
	      		map.setCenter(results[0].geometry.location);
	    	}
	    });
	}
	
   

	function getPoint(point, div) {
		if (geocoder) {
			geocoder.geocode( { 'address': point}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					marker = new google.maps.Marker({
						map: map, 
						position: results[0].geometry.location
					});
					map.setCenter(results[0].geometry.location);
				}
			});
		}
		$(".adr div").removeAttr("class");
		$(div).addClass("active");
    }
{/literal}
</script>
<div class="clearfix">
	<div class="map_canvas" id="map_canvas"></div>
	<div class="addrs">
		<div class="adr">
			<div class="active" onclick="getPoint('30984 Santana Street, Hayward, CA', this)">
				<h1>UNITED STATES</h1>
				<p>
					30984 Santana Street<br />
					Hayward, CA 94544<br />
					(510) 489-2530 (PH)<br />
					(650) 249-0412 (FX)
				</p>
				<a target="blank" href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=30984+Santana+Street,+Hayward,+CA&sll=37.926868,-95.712891&sspn=27.402664,63.984375&ie=UTF8&hq=&hnear=30984+Santana+St,+Hayward,+Alameda,+California+94544&ll=37.613076,-122.056603&spn=0.007173,0.015621&z=16"><img src="/source/images/arr2.gif" alt="" />Google Maps</a>
				<img class="arr" src="/source/images/adr_arr.png" alt="" />			</div>
		</div>
		<div class="adr">
			<div onclick="getPoint('133 Blyth Road Middlesex  UB3 1DD', this)">
				<h1>International</h1>
				<p>
				  105 Enterprise House<br />
				  133 Blythe Road<br />
					Middlesex UB3 1DD<br />
					0782868423
				</p>
		    <a target="blank" href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=133+Blyth+Road+Middlesex&sll=52.201797,0.118644&sspn=10.69642,31.992188&ie=UTF8&hq=&hnear=133+Blyth+Rd,+Hayes,+Middlesex+UB3+1DD,+United+Kingdom&ll=51.504656,-0.425806&spn=0.011273,0.031242&z=15"><img src="/source/images/arr2.gif" alt="" />Google Maps</a>
				<img class="arr" src="/source/images/adr_arr.png" alt="" />			</div>
		</div>
	</div>
</div>