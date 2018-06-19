<?php include('admin_header.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-7 col-md-3 col-sm-4">

			<h1>Step 4. </h1>
			<h3>Enter Owner Contact Details:</h3>
			<?= form_open('Admin/save_location'); ?>
				<input type="hidden" name="step" value="4"/>
				<input type="hidden" name="venue_id" value="<?= $venue_id ?>"/>
			<div class="form-group">
				<?= form_input( ['name'=>'owner_name', 'class'=>'form-control form-control-lg', 'id'=>'inputLarge', 'placeholder'=>'Owner Name', 'value'=>set_value('owner_name')])?>
				<?= form_error('owner_name','<p class="text-danger">','</p>') ?>
			</div>
			<div class="form-group">
				<?= form_input( ['name'=>'owner_phone', 'class'=>'form-control form-control-lg', 'id'=>'inputLarge', 'placeholder'=>'Owner Phone Number', 'value'=>set_value('owner_phone')])?>
				<?= form_error('owner_phone','<p class="text-danger">','</p>') ?>
			</div>
			<div class="form-group">
				<?= form_input( ['name'=>'owner_email', 'class'=>'form-control form-control-lg', 'id'=>'inputLarge', 'placeholder'=>'Owner Email', 'value'=>set_value('owner_email')])?>
				<?= form_error('owner_email','<p class="text-danger">','</p>') ?>
			</div>
			<div class="form-group">
				<?= form_input( ['name'=>'owner_address', 'class'=>'form-control form-control-lg', 'id'=>'inputLarge', 'placeholder'=>'Enter Address', 'value'=>set_value('owner_address')])?>
				<?= form_error('owner_address','<p class="text-danger">','</p>') ?>
			</div>
			<div class="form-group">
					<?= form_submit('step3', 'Back To Step 3', ['class'=>'btn btn-primary']) ?>
			
					<?= form_submit('submit', 'Save and Next', ['class'=>'btn btn-primary']) ?>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<?php include('admin_footer.php'); ?>