<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>SportsApp</title>
<?= link_tag('assets/css/bootstrap.min.css') ?>
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
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
      <a class="navbar-brand" href="#">Dashboard</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
       	<li><?= anchor('',$user_data->name)  ?></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><?= anchor('Login/logout','Logout')  ?></li>
      </ul>
    </div>
  </div>
</nav>
<!--Admin controlles-->
<div class="col-lg-3 col-md-3 col-sm-4">
	<div class="list-group table-of-contents">
		<?= anchor('admin/view_user','View User', ['class'=> 'list-group-item'])  ?>
		<?= anchor('admin/add_location','Add Location', ['class'=> 'list-group-item'])  ?>
		<?= anchor('admin/view_location','View Location', ['class'=> 'list-group-item'])  ?>
		
	</div>
</div>