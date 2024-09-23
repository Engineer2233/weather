<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>PHP</title>
	 <link rel="stylesheet" href="css/bootstrap.css">
	 <link rel="stylesheet" href="css/font-awesome.min.css">
	 <?php if(isset($custom)) echo $custom;  ?>
	</head>
	<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">WebSiteName</a>
		</div>
		<ul class="nav navbar-nav">
		  <li class="active"><a href="#">Home</a></li>
		  <li><a href="login.php">Login</a></li>
		  <li><a href="signup.php">Sign Up</a></li>
		  <li><a href="page2.html">Page 2</a></li>
		  <li><a href="#">Page 3</a></li>
		  <li><a href="#">Page 4</a></li>
		  <li><a href="#">Page 5</a></li>
		</ul>
	  </div>
	</nav>
	<div style="margin-top:70px"></div>

	<nav aria-label="breadcrumb" role="navigation">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">This Page</li>
	  </ol>
	</nav>