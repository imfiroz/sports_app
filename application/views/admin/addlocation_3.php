<?php include('admin_header.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<div class="container">
	<div class="row">
		<div class="col-lg-7 col-md-3 col-sm-4">

			<h1>Step 3. </h1>
			<h3>Upload a images</h3>
			<?= form_open('Admin/save_location'); ?>
				<div class="form-group">
					<label>Select Multiple Files</label>
					<input type="hidden" name="step" value="3"/>
					<input type="hidden" name="venue_id" value="<?= $venue_id ?>"/>
					<input type="file" name="files" id="files" multiple />
					<?= form_error('images','<p class="text-danger">','</p>') ?>
				</div>
				<div class="jumbotron">
				  <div id="uploaded_images"></div>
				</div>
				<div class="form-group">
					<?= form_submit('step2', 'Back To Step 2', ['class'=>'btn btn-primary']) ?>

					<?= form_submit('submit', 'Save and Next', ['class'=>'btn btn-primary']) ?>
				</div>
		</div>
	</div>
</div>
	
	
	<script>
	 $(document).ready(function(){
	 $('#files').change(function(){
	  var files = $('#files')[0].files;
	  var error = '';
	  var form_data = new FormData();
	  for(var count = 0; count<files.length; count++)
	  {
	   var name = files[count].name;
	   var extension = name.split('.').pop().toLowerCase();
	   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
	   {
		error += "Invalid " + count + " Image File"
	   }
	   else
	   {
		form_data.append("files[]", files[count]);
	   }
	  }
	  if(error == '')
	  {
	   $.ajax({
		url:"<?php echo base_url(); ?>index.php/Admin/upload", //base_url() return http://localhost/tutorial/codeigniter/
		method:"POST",
		data:form_data,
		contentType:false,
		cache:false,
		processData:false,
		beforeSend:function()
		{
		 $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
		},
		success:function(data)
		{
		 $('#uploaded_images').html(data);
		 $('#files').val('');
		}
	   })
	  }
	  else
	  {
	   alert(error);
	  }
	 });
	});
	</script>
</div>
<?php include('admin_footer.php'); ?>