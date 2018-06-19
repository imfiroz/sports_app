<?php include('admin_header.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-7 col-md-3 col-sm-4">

			<h1>Step 4. </h1>
			<h3>Enter Owner Contact Details:</h3>
			<?= form_open('Admin/save_location'); ?>
			<div class="form-group">
					<?= form_submit('step3', 'Back To Step 3', ['class'=>'btn btn-primary']) ?>
			
					<?= form_submit('submit', 'Save and Next', ['class'=>'btn btn-primary']) ?>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<?php include('admin_footer.php'); ?>