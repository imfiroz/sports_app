<?php include('admin_header.php'); ?>


<div class="container">
	<div class="row">
		<div class="col-lg-7 col-md-3 col-sm-4">

			<h1>Step 3. </h1>
			<h3>Upload a images</h3>
			
			<?php echo $venue_id; ?>
			
			
			
			<?= form_open('Admin/save_location'); ?>
			
				
			<div class="form-group">
					<?= form_submit('step2', 'Back To Step 2', ['class'=>'btn btn-primary']) ?>
			
					<?= form_submit('submit', 'Save and Next', ['class'=>'btn btn-primary']) ?>
			</div>
			
			<html>
		</div>
	</div>
</div>
<?php include('admin_footer.php'); ?>