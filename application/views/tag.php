<script>
			var autocomplete,map;
			var positions = [];
		function initialize()
		{
			$('#formHide').hide();
			 var mapOptions = {
						mapTypeControl: false,
						panControl: false,
						zoomControl: true,
						streetViewControl: false,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
					
						zoom:2,
						center: new google.maps.LatLng(0,0),
				  };
				  
				  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
				  
				  
				   var input = (document.getElementById('searchLocation'));
				    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
					 autocomplete = new google.maps.places.Autocomplete((document.getElementById('searchLocation')), { types: ['address'] });
						google.maps.event.addListener(autocomplete, 'place_changed', function() { 
							var place = autocomplete.getPlace();
							 if (!place.geometry) {
								alert('Location not found');
							  return false;
							}
								if (place.geometry.viewport) {
								  map.fitBounds(place.geometry.viewport);
								} else {
								  map.setCenter(place.geometry.location);
								  map.setZoom(17);  
								}
						});
					
					
					 google.maps.event.addListener(map, "click", function(event)
					{
					$('#formHide').show('slow');
							if(positions.length != 0)
							{	
								var conf = confirm('Change location?');
								if(conf)
								{
											for (var i = 0; i < positions.length; i++) {
												positions[i].setMap(null);
											}
										    positions = [];
											
											  var marker = new google.maps.Marker({
										position: event.latLng,
										map: map
								});
								positions.push(marker);
											
								}
							}else{
								  var marker = new google.maps.Marker({
										position: event.latLng,
										map: map
								});
								positions.push(marker);
							}
						console.log(event.latLng);
							$('#lat').val(event.latLng.k);
								$('#lng').val(event.latLng.B);
					});
		}
		
	

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	
<div class="row">

<div id="formHide"  style="display:none;">
	<form role="form" method="post" action="<?php echo base_url();?>index.php/client/tag">
	 <div class="row">
		<div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Best  Seller</label>
    <input type="text" class="form-control" id="best" placeholder="Enter Best Seller" name="best" required>
  </div>
 </div> 
  <div class="col-md-4">
   <div class="form-group">
    <label for="exampleInputEmail1">Website Url</label>
    <input type="text" class="form-control" id="url" placeholder="Enter Website Url " name="url" >
  </div>
  </div> 
  <div class="col-md-4">
 <div class="form-group">
    <label for="exampleInputEmail1">Menu</label>
	<textarea class="form-control" id="best" name="menu" required></textarea>
  </div>
  
</div>
  <input type="hidden" value="" name="lat" id="lat"> 
    <input type="hidden" value="" name="lng" id="lng"> 
  
  <button type="submit" name="mapBtn" class="btn btn-default">Save</button>
</form>
</div>
</div>
	 <input id="searchLocation" class="controls form-controls" type="text" placeholder="Enter a location">
	<div id="map-canvas"></div>
	<hr />
		<table class="table table-stripped table-bordered tab">
				<tr>
					<th colspan='5'>Location List</th>
				</tr>
				<tr>
					<th>Location</th>
					<th>Best Seller</th>
					<th>Url</th>
					<th>Menu</th>
					<th>Action</th>
				</tr>
				<?php if(@$list){
				 $ctr = 0;
					foreach($list as $lst)
					{
					
						?>
							<tr>
								<td id="<?php echo $ctr;?>">
								<script>
											$(document).ready(function(){
													$.ajax({
														url:'http://maps.googleapis.com/maps/api/geocode/json?latlng=<?php echo $lst['lat']?>,<?php echo $lst['lng']?>&sensor=false',
														dataType:'json',
														success:function(data){
															console.log(data.results[0].formatted_address);
															$('#<?php echo $ctr;?>').html(data.results[0].formatted_address);
														}
													});
											});
								</script>
									
								</td>
								<td><?php echo $lst['best_seller']?></td>
								<td><?php echo $lst['website_url']?></td>
								<td><?php echo $lst['desc']?></td>
								<td>
									<a href="<?php echo base_url();?>index.php/client/deleteLoc/<?php echo $lst['id']; ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
						<?php
						$ctr++;
					}
				}?>
		</table>
		
</div>