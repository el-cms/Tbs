<?php
include 'Tbs.php';

$Tbs = new Tbs;
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Test page</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="boilerplate/css/bootstrap.min.css">
		<style>
			body {
				padding-top: 60px;
				padding-bottom: 20px;
			}
			#main-menu{
				font-size: 0.8em;
				list-style-type: none;
			}
			#main-menu li{
				margin-bottom: 3px;
				border-left:3px solid #CCC;
				padding-left:5px;
			}
			#main-menu li:hover{
				border-left:3px solid #0C0;
			}
		</style>
		<link rel="stylesheet" href="boilerplate/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="boilerplate/css/main.css">

        <!--<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>-->
	</head>
	<body>
		<!--[if lt IE 7]>
				<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Test page</a>
        </div>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
			<div class="row affix-top">
				<div class="col-md-2">
					<div  data-spy="affix" data-offset-top="60" data-offset-bottom="200">
						<ul id="main-menu">
							<li><a href="#icon">Icons</a></li>
							<li><a href="#button">Buttons</a></li>
							<li><a href="#dropdown">Dropdowns</a></li>
							<li><a href="#button-group">Button group</a></li>
							<li><a href="#button-dropdown">Button dropdown</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-10">

					<!-- -----------------------------------------------------------------

						Icon

					------------------------------------------------------------------ -->
					<a id="icon"></a>
					<h2>Icon <small>icon($icon, $options)</small></h2>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Basic usage</h3>
						</div>
						<div class="panel-body">
							<pre>echo $Tbs->icon('star');</pre>
						</div>
						<div class="panel-footer">
							<?php echo $Tbs->icon('star'); ?>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Adding some options</h3>
						</div>
						<div class="panel-body">
							<pre>echo $Tbs->icon('star', array('class'=>'text-danger', 'title'=>'Yay ! Red star !'));</pre>
						</div>
						<div class="panel-footer">
							<?php echo $Tbs->icon('star', array('class' => 'text-danger', 'title' => 'Yay ! Red star !')); ?>
						</div>
					</div>

					<!-- -----------------------------------------------------------------

						Button

					------------------------------------------------------------------ -->
					<a id="button"></a>
					<h2>Button <small>button($content, $options)</small></h2>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Basic usage</h3>
						</div>
						<div class="panel-body">
							<pre>echo $Tbs->button('I\'m a button');
echo $Tbs->button('Me too', '#button');
echo $Tbs->button('I\'m a button with a JS alert', null, array('onClick'=>'javascript:alert(\'i\\\'m the alert\')'));
echo $Tbs->button('Big disabled button', '#', array('size'=>'big', 'type'=>'primary', 'class'=>'disabled'));
echo $Tbs->button('Active danger button', '#button', array('type'=>'danger', 'class'=>'active'));
echo $Tbs->button('Small info button', '#button', array('size'=>'small', 'type'=>'info'));
echo $Tbs->button($Tbs->icon('star').' I have an icon !!', '#button', array('size'=>'xsmall', 'type'=>'warning'));</pre>
						</div>
						<div class="panel-footer">
							<?php
							echo $Tbs->button('I\'m a button');
							echo $Tbs->button('Me too', '#button');
							echo $Tbs->button('I\'m a button with a JS alert', null, array('onClick' => 'javascript:alert(\'i\\\'m the alert\')'));
							echo $Tbs->button('Big disabled button', '#', array('size' => 'big', 'type' => 'primary', 'class' => 'disabled'));
							echo $Tbs->button('Active danger button', '#button', array('type' => 'danger', 'class' => 'active'));
							echo $Tbs->button('Small info button', '#button', array('size' => 'small', 'type' => 'info'));
							echo $Tbs->button($Tbs->icon('star') . ' I have an icon !!', '#button', array('size' => 'xsmall', 'type' => 'warning'));
							?>
						</div>
					</div>

					<!-- -----------------------------------------------------------------

						Dropdown

					------------------------------------------------------------------ -->
					<a id="dropdown"></a>
					<h2>Dropdown <small>dropdown($content, $options)</small></h2>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Basic usage</h3>
						</div>
						<div class="panel-body">
							<pre>echo $Tbs->icon('star');</pre>
						</div>
						<div class="panel-footer">
							<?php
							$content = array(
									'Title' => '%header%',
									'SomeLink' => '#',
									'SomeLink2' => '#',
									'SomeLink3' => '#',
									'item' => '%divider%',
									'SomeLink4' => '#',
									'SomeLink5' => '#',
									'SomeLink6' => '#',
							);
							echo $Tbs->dropdown($content, array('class' => 'clearfix'));
							?>
						</div>
					</div>

					<!-- -----------------------------------------------------------------

						Button group

					------------------------------------------------------------------ -->
					<a id="button-group"></a>
					<h2>Button group <small>buttonGroup($buttons, $options)</small></h2>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Basic usage</h3>
						</div>
						<div class="panel-body">
							<pre>echo $Tbs->icon('star');</pre>
						</div>
						<div class="panel-footer">
							<?php echo $Tbs->icon('star'); ?>
						</div>
					</div>

					<!-- -----------------------------------------------------------------

						Button Dropdown

					------------------------------------------------------------------ -->
					<a id="button-dropdown"></a>
					<h2>Button dropdown <small>buttonDropdown($button, $dropdown, $options)</small></h2>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Basic usage</h3>
						</div>
						<div class="panel-body">
							<pre>echo $Tbs->icon('star');</pre>
						</div>
						<div class="panel-footer">
							<?php echo $Tbs->icon('star'); ?>
						</div>
					</div>


				</div>
			</div>

    </div> <!-- /container -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="boilerplate/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

		<script src="boilerplate/js/vendor/bootstrap.min.js"></script>

		<script src="boilerplate/js/main.js"></script>

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<!--        <script>
				(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
				function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
				e=o.createElement(i);r=o.getElementsByTagName(i)[0];
				e.src='//www.google-analytics.com/analytics.js';
				r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
				ga('create','UA-XXXXX-X');ga('send','pageview');
		</script>-->
	</body>
</html>
