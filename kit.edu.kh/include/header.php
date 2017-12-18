<?php 
    $path = $_SERVER['PHP_SELF'];
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The first boarding school in cambodia">
    <title>Kirirom Institute of Technology </title>
    <link rel="shortcut icon" href="favicon (1).ico" type="image/x-icon">
    <link rel="icon" href="favicon (1).ico" type="image/x-icon">
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/da-slider.css"/>
    <link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/formValidation.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <?php include_once('include/googleanalytic.php'); ?>

	<!--Gsuite-->
	<meta name="google-site-verification" content="zTpFZkp_JFJk6mlbKwh7OUAQCFvZC-jIyLpILEyGm-8" />
<!--KIT Google Analytic Script --!>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73070516-2', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/KFI4.png" alt="Techro HTML5 template"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right mainNav">
                <li class="<?php if(preg_match('/index/i', $path)){ echo 'active';} ?>"><a href="index.php">About KIT</a></li>
                <li class="<?php if(preg_match('/admission/i', $path)){ echo 'active';} ?>"><a href="admission.php">Admission</a></li>
                <li class="<?php if(preg_match('/academic/i', $path)){ echo 'active';} ?>"><a href="academic.php">Academic</a></li>
                <li class="<?php if(preg_match('/campus/i', $path)){ echo 'active';} ?>"><a href="campus.php">Campus Life</a></li>
                <li class="<?php if(preg_match('/about/i', $path)){ echo 'active';} ?>"><a href="about.php">Sponsors</a></li>
                <li class="<?php if(preg_match('/career/i', $path)){ echo 'active';} ?>"><a href="career.php">Careers</a></li>
                <li class="<?php if(preg_match('/contact/i', $path)){ echo 'active';} ?>"><a href="contact.php">Contact</a></li>

            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<!-- /.navbar -->