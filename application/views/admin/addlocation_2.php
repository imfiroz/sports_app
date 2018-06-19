<?php include('admin_header.php'); ?>

<!-- Dependencies: JQuery and GMaps API should be loaded first -->
<script src="<?= base_url('assets/js/jquery-2.1.1.min.js')?>"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA5KbxCojbq8iVgWhwqQ_EJk2N6i9Odrz0
&sensor=false"></script>
<!-- CSS and JS for our code -->
<?= link_tag('assets/css/jquery-gmaps-latlon-picker.css') ?>
<script src="<?= base_url('assets/js/jquery-gmaps-latlon-picker.js')?>"></script>



<div class="container">
	<div class="row">
		<div class="col-lg-7 col-md-3 col-sm-4">

			<h1>Step 2. </h1>
			<h3>Pick a location from Map</h3>
			<?= form_open('Admin/save_location'); ?>
			
				<fieldset class="gllpLatlonPicker">
					<div class="gllpMap">Google Maps</div>
					<br/>
					<input type="hidden" name="step" value="2"/>
					<input type="hidden" name="venue_id" value="<?= $venue_id ?>"/>
					<input type="hidden" name="latitude" class="gllpLatitude"/>
					<input type="hidden" name="longitude" class="gllpLongitude"/>
					<input type="hidden" class="gllpZoom"/>
					Location:
					
					<?= form_input( ['name'=>'city', 'class'=>'form-control form-control-lg gllpLocationName', 'id'=>'inputLarge', 'placeholder'=>'Pick Location', 'value'=>set_value('city')])?><br/>
					<?= form_error('city','<p class="text-danger">','</p>') ?>
					
				</fieldset>
			<div class="form-group">
					<?= form_submit('step1', 'Back To Step 1', ['class'=>'btn btn-primary']) ?>
			
					<?= form_submit('submit', 'Save and Next', ['class'=>'btn btn-primary']) ?>
			</div>
			
			<html>
		</div>
	</div>
</div>
<?php include('admin_footer.php'); ?>