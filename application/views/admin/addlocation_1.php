<?php include('admin_header.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-7 col-md-3 col-sm-4">

			<h1>Step 1. </h1>
			<h3>What kind of place it is?</h3>
			<?= form_open('Admin/save_location'); ?>
			<div class="form-group">
				<input type="hidden" name="step" value="1"/>
				<?= form_input( ['name'=>'place_type', 'class'=>'form-control form-control-lg', 'id'=>'inputLarge', 'placeholder'=>'Short Details', 'value'=>set_value('place_type')])?>
				<?= form_error('place_type','<p class="text-danger">','</p>') ?>
			</div>
			
			<h3>Its a closed place.</h3>
			<div class="form-group">
				<?= form_input( ['name'=>'close_place', 'class'=>'form-control form-control-lg', 'id'=>'inputLarge', 'placeholder'=>'If Any', 'value'=>set_value('close_place')])?>
			</div>
			<div class="form-group">
					<?= form_submit('submit', 'Save and Next', ['class'=>'btn btn-primary']) ?>
			</div>
			
			<html>
<!--<form>
<input type="hidden" name="mapLat">
<input type="hidden" name="mapLong">
<input type="text" name="location">
<input type="submit" name="submit" value="submit">
</form>
</html>-->

<?php

/*extact($_POST);
if($mapLat =='' && $mapLong ==''){
        // Get lat long from google
        $latlong    =   get_lat_long($location); // create a function with the name "get_lat_long" given as below
        $map        =   explode(',' ,$latlong);
        $mapLat         =   $map[0];
        $mapLong    =   $map[1];    
}


// function to get  the address
function get_lat_long($address){

    $address = str_replace(" ", "+", $address);

    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    return $lat.','.$long;
}*/
?>		

			
		</div>
	</div>
</div>
<?php include('admin_footer.php'); ?>