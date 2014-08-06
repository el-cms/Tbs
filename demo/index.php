<?php
include '../Tbs.php';

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

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/gh-fork-ribbon.css">

		<style>
			body {
				padding-bottom: 20px;
				/*font-size:0.8px;*/
			}


			pre{
				font-size: 0.8em;
			}

			.syntax-container{
				font-size: 0.8em;
			}

			/*			TOC styles*/
			#main-menu{
				font-size: 0.8em;
			}
			a.toc-depth-2{
				margin-bottom: 3px;
				border-left:3px solid #CCC;
				padding-left:5px;
				display:block;
			}
			a.toc-depth-2:hover{
				border-left:3px solid #0C0;
			}
			a.toc-depth-1{
				font-size:1em;
				border:0px;
				font-weight:bold;
			}
			a.toc-depth-3{
				margin-left:5px;
				margin-bottom: 3px;
				border-left:3px solid #CFF;
				padding-left:5px;
				display:block;
			}
			a.toc-depth-3:hover{
				border-left:3px solid #0CC;
			}

			.panel-body{
				background-color:#FBFBFB;
			}
			.panel-body:before{
				content: 'Code:';
				display:block;
				color: #CCC;
				border-bottom: 1px dotted #CCC;
				margin-bottom:5px;
				font-variant: small-caps;

			}
			.panel-footer{
				background-color:#FFF;
			}
			.panel-footer:before{
				content: 'Results:';
				display:block;
				color: #CCC;
				border-bottom: 1px dotted #CCC;
				margin-bottom:5px;
				font-variant: small-caps;
			}
			.panel-heading:before{
				content: 'Infos :';
				display:block;
				color: #CCC;
				border-bottom: 1px dotted #CCC;
				margin-bottom:5px;
				font-variant: small-caps;
			}
		</style>
	</head>
	<body>
		<div class="github-fork-ribbon-wrapper right">
			<div class="github-fork-ribbon">
				<a href="https://github.com/el-cms/Tbs/fork">Fork me on GitHub</a>
			</div>
		</div>
		<!--[if lt IE 7]>
				<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
    <div class="navbar navbar-inverse" role="navigation">
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
					<div id="main-menu" data-spy="affix" data-offset-bottom="200">
					</div>
				</div>

				<div class="col-md-10">

					<div class='alert alert-warning'>
						This page is a temporary demo page for Tbs, a PHP class that generates Twitter Bootstrap elements.<br><br>
						<strong>Note that this class is in an early stage of development. Feel free to join the project, submit issues, fork,... on <a href='https://github.com/el-cms/Tbs'>GitHub</a></strong><br>
					</div>

					<div class="inToc"><h1>CSS</h1></div>

					<?php
						include 'sections/form.php';
						include 'sections/input.php';
						include 'sections/button.php';
						include 'sections/image.php';
						?>
						<div class="inToc"><h1>Elements</h1></div>
						<?php
						include 'sections/icon.php';
						include 'sections/dropdown.php';
						include 'sections/btngroup.php';
						// Toolbar is a button-group subsection
						include 'sections/toolbar.php';
						include 'sections/btndropdown.php';
						include 'sections/breadcrumb.php';
						include 'sections/label.php';
						include 'sections/badge.php';
						include 'sections/jumbotron.php';
						include 'sections/header.php';
						include 'sections/alert.php';
						include 'sections/media.php';
						include 'sections/listgroup.php';
						include 'sections/embed.php';
					?>
				</div>
			</div>
			<div class="alert alert-info">
				This demo uses <a href="http://www.codeotaku.com/projects/jquery-syntax/index.en">JQuery.syntax</a>, <a href="http://fuelyourcoding.com/scripts/toc/">jQuery Table of Content plugin</a>, sample HTML5 file from <a href="http://initializr.com/">initializr</a>, and of course, <a href="http://getbootstrap.net">Twitter Bootstrap</a> and <a href="http://jquery.com">Jquery</a>.
			</div>
    </div> <!-- /container -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>

		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-syntax/jquery.syntax.min.js"></script>
		<script src="js/jquery.tableofcontents.min.js"></script>
		<script language="javascript">
			// Syntax highlighting
			jQuery(function($) {
				$.syntax({
					layout: 'fixed',
					tabWidth: '2'
				});
			});

			$('#main-menu').tableOfContents($('.inToc'), {depth: 3});
		</script>

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
