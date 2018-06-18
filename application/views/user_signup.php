<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SportsApp</title>
<?= link_tag('assets/css/bootstrap.min.css') ?>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Sports App</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
<?php //***Publish Menus Display
/*if(	isset($menus)	){
	//***Current Page Menu id for making active menu on current page
	$current_menu_id = isset($page_data) ? $page_data->menu_id : false ;
	foreach($menus as $menu)
	{ 
		?>
		<li  <?= ($current_menu_id == $menu->id ) ? "class='active'" : false ?>>
		<?= anchor("publiccontroller/index/{$menu->id}",$menu->menu_title) ?>
		</li>
		<?php	
	}
}*/
?>
        <li><?= anchor('','Contact')  ?></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       	<li><?= anchor('Admin','Admin Signup')  ?></li>
       	<li><?= anchor('User','User Signup')  ?></li>
        <li><?= anchor('Login','Login')  ?></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
	<?= form_open('User/signup_form_user', 'class="form-horizontal"'); ?> 
		  <fieldset>
			<legend>User Registration</legend>
			<?php if($error_msg = $this->session->flashdata('loggin_invalid')): ?>
			<div class="row"><!--Setting loggin error message-->
				<div class="col-lg-6">
					<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?= $error_msg ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Name</label>
						<div class="col-lg-10">
						<?= form_input( ['name'=>'username', 'class'=>'form-control', 'id'=>'inputEmail', 'placeholder'=>'User Name', 'value'=>set_value('username')])?>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<?= form_error('username','<p class="text-danger">','</p>') ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
						<?= form_input( ['name'=>'email', 'class'=>'form-control', 'id'=>'inputEmail', 'placeholder'=>'Email', 'value'=>set_value('email')])?>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<?= form_error('email','<p class="text-danger">','</p>') ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Phone Number</label>
						<div class="col-lg-10">
						<?= form_input( ['name'=>'number', 'class'=>'form-control', 'id'=>'inputEmail', 'placeholder'=>'Phone Number', 'value'=>set_value('number')])?>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<?= form_error('number','<p class="text-danger">','</p>') ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
					  <label for="inputPassword" class="col-lg-2 control-label">Password</label>
					  <div class="col-lg-10">
						<?= form_password(['name'=>'password', 'class'=>'form-control', 'id'=>'inputPassword', 'placeholder'=>'Password', 'value'=>set_value('password')])?>
					  </div>
					</div>
				</div>
				<div class="col-lg-6">
					<?= form_error('password','<p class="text-danger">','</p>') ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
					  <label for="inputPassword" class="col-lg-2 control-label">Confirm Password</label>
					  <div class="col-lg-10">
						<?= form_password(['name'=>'cnfpassword', 'class'=>'form-control', 'id'=>'inputPassword', 'placeholder'=>'Confirm Password', 'value'=>set_value('cnfpassword')])?>
					  </div>
					</div>
				</div>
				<div class="col-lg-6">
					<?= form_error('cnfpassword','<p class="text-danger">','</p>') ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
					  <label for="inputEmail" class="col-lg-2 control-label">Location City</label>
					  <div class="col-lg-10">
						<?= form_input(['name'=>'location', 'class'=>'form-control', 'id'=>'inputEmail', 'placeholder'=>'Enter City Name Only', 'value'=>set_value('cnfpassword')])?>
					  </div>
					</div>
				</div>
				<div class="col-lg-6">
					<?= form_error('location','<p class="text-danger">','</p>') ?>
				</div>
			</div>
			<div class="form-group">
				  <div class="col-lg-10 col-lg-offset-2">
					<?= form_reset('reset', 'Reset', ['class'=>'btn btn-default']) ?>
					<?= form_submit('submit', 'Submit', ['class'=>'btn btn-primary']) ?>
				  </div>
			</div>
		</fieldset>
	</form>

</div>
<?php include('public_footer.php'); ?>