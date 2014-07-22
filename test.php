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

			pre{
				font-size: 0.8em;
			}
		</style>
		<!--<link rel="stylesheet" href="boilerplate/css/bootstrap-theme.min.css">-->

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
							<!--<li><a href="#toolbar">Toolbar</a></li>-->
							<li><a href="#button-dropdown">Button dropdown</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-10">
					<!--					<div class='alert alert-warning'>
											This page is a temporary demo page for Tbs, a PHP class that generates Twitter Bootstrap elements.<br><br>
											<strong>Note that this class is in an early stage of development. Feel free to join the project, submit issues, fork,... on <a href='https://github.com/el-cms/Tbs'>GitHub</a></strong><br>
										</div>-->

					<!-- -----------------------------------------------------------------

						Icon

					------------------------------------------------------------------ -->
					<a id="icon"></a>
					<h2>Icon <small>icon($icon, $options)</small></h2>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Usage</h3>
						</div>
						<div class="panel-body">
							<pre>echo $Tbs->icon('star');
echo $Tbs->icon('star', array('class'=>'text-danger', 'title'=>'Yay ! Red star !'));</pre>
						</div>
						<div class="panel-footer">
							<?php
							echo $Tbs->icon('star');
							echo $Tbs->icon('star', array('class' => 'text-danger', 'title' => 'Yay ! Red star !'));
							?>
						</div>
					</div>

					<!-- -----------------------------------------------------------------

						Button

					------------------------------------------------------------------ -->
					<a id="button"></a>
					<h2>Button <small>button($content, $options)</small></h2>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Usage</h3>
						</div>
						<div class="panel-body">
							<pre>echo $Tbs-&gt;button('I\'m a button');
echo $Tbs-&gt;button('Me too', '#button');
echo $Tbs-&gt;button('I\'m a button with a JS alert', null, array('onClick' =&gt; 'javascript:alert(\'i\\\'m the alert\')'));
echo $Tbs-&gt;button('Big disabled button', '#', array('size' =&gt; 'big', 'type' =&gt; 'primary', 'class' =&gt; 'disabled'));
echo $Tbs-&gt;button('Input button', null, array('type' =&gt; 'primary', 'class' =&gt; 'success', 'tag'=&gt;'input'));
echo $Tbs-&gt;button('Active danger button', '#button', array('type' =&gt; 'danger', 'class' =&gt; 'active'));
echo $Tbs-&gt;button('Small info button', '#button', array('size' =&gt; 'small', 'type' =&gt; 'info'));
echo $Tbs-&gt;button($Tbs-&gt;icon('star') . ' I have an icon !!', '#button', array('size' =&gt; 'xsmall', 'type' =&gt; 'warning'));</pre>
						</div>
						<div class="panel-footer">
							<?php
							echo $Tbs->button('I\'m a button');
							echo $Tbs->button('Me too', '#button');
							echo $Tbs->button('I\'m a button with a JS alert', null, array('onClick' => 'javascript:alert(\'i\\\'m the alert\')'));
							echo $Tbs->button('Big disabled button', '#', array('size' => 'big', 'type' => 'primary', 'class' => 'disabled'));
							echo $Tbs->button('Input button', null, array('type' => 'primary', 'class' => 'success', 'tag' => 'input'));
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
							<h3 class="panel-title">Usage</h3>
						</div>
						<div class="panel-body">
							<pre>$content = array(
		'Title' =&gt; '%header%',
		'SomeLink' =&gt; '#',
		'SomeLink2' =&gt; '#',
		'SomeLink3' =&gt; '#',
		'item' =&gt; '%divider%',
		'SomeLink4' =&gt; '#',
		'SomeLink5' =&gt; '#',
		'SomeLink6' =&gt; '#',
);
echo $Tbs-&gt;dropdown($content, array('class' =&gt; 'clearfix'));</pre>
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
							?><em>We don't see anything as i'm unable to display a dropdown menu only...</em>
						</div>
					</div>

					<!-- -----------------------------------------------------------------

						Button group

					------------------------------------------------------------------ -->
					<a id="button-group"></a>
					<h2>Button group <small>buttonGroup($buttons, $options)</small></h2>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Usage</h3>
						</div>
						<div class="panel-body">
							<pre>// Basic usage
$buttons = array(
		$Tbs-&gt;button('Item1'),
		$Tbs-&gt;button('Item2'),
		$Tbs-&gt;button('Item3'),
		$Tbs-&gt;button('Item4'),
);
echo '&lt;strong&gt;Basic usage:&lt;/strong&gt;&lt;br&gt;';
echo $Tbs-&gt;buttonGroup($buttons);

// Mixed usage
$buttonsMixed = array(
		$Tbs->button('Item1'),
		//Note that you must define buttonDropdown size if your button group has a custom one. (<a href="https://github.com/el-cms/Tbs/issues/1">#issue1</a>)
		$Tbs->buttonDropdown('Item2', $content, array('size' => 'xsmall')),
		$Tbs->button('Item3', null, array('type' => 'danger')),
		$Tbs->buttonDropdown('Item2', $content, array('size' => 'xsmall'), array(), array('split' => true)),
		$Tbs->button('Item5'),
);
echo '&lt;br&gt;&lt;strong&gt;Mixed usage&lt;/strong&gt;&lt;br&gt;';
echo $Tbs-&gt;buttonGroup($buttonsMixed, array('size'=&gt;'xsmall'));</pre>
						</div>
						<div class="panel-footer">
							<?php
							// Default usage
							$buttons = array(
									$Tbs->button('Item1'),
									$Tbs->button('Item2'),
									$Tbs->button('Item3'),
									$Tbs->button('Item4'),
							);
							echo '<strong>Basic usage:</strong><br>';
							echo $Tbs->buttonGroup($buttons);

							// Mixed usage
							$buttonsMixed = array(
									$Tbs->button('Item1'),
									//Note that you must define buttonDropdown size if your button group has a custom one.
									$Tbs->buttonDropdown('Item2', $content, array('size' => 'xsmall')),
									$Tbs->button('Item3', null, array('type' => 'danger')),
									$Tbs->buttonDropdown('Item2', $content, array('size' => 'xsmall'), array(), array('split' => true)),
									$Tbs->button('Item5'),
							);
							echo '<br><strong>Mixed usage</strong><br>';
							echo $Tbs->buttonGroup($buttonsMixed, array('size' => 'xsmall'));
							?>
							<em>Note that split buttons dropdowns are not really nice to see...</em>
						</div>
					</div>

					<!-- -----------------------------------------------------------------

						Toolbar (work in progress)

					------------------------------------------------------------------ -->
<!--					<a id="toolbar"></a>
					<h2>Toolbar <small>toolbar($buttonsGroups, $options)</small></h2>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Usage</h3>
						</div>
						<div class="panel-body">
							<pre>$buttonGroups = array(array(
				$Tbs->button('Item1'),
				$Tbs->button('Item2'),
				$Tbs->button('Item3'),
				$Tbs->button('Item4'),
		),
		array(
				$Tbs->button('Item1'),
				//Note that you must define buttonDropdown size if your button group has a custom one.
				$Tbs->buttonDropdown('Item2', $content, array('size' => 'xsmall')),
				$Tbs->button('Item3', null, array('type' => 'danger')),
				$Tbs->buttonDropdown('Item2', $content, array('size' => 'xsmall'), array(), array('split' => true)),
				$Tbs->button('Item5'),
		)
);
echo $Tbs->toolbar($buttonsMixed, array('size' => 'xsmall'));</pre>
						</div>
						<div class="panel-footer">
							<?php
							// Default usage
							$buttonGroups = array(array(
											$Tbs->button('Item1'),
											$Tbs->button('Item2'),
											$Tbs->button('Item3'),
											$Tbs->button('Item4'),
									),
									array(
											$Tbs->button('Item1'),
											//Note that you must define buttonDropdown size if your button group has a custom one.
											$Tbs->buttonDropdown('Item2', $content, array('size' => 'xsmall')),
											$Tbs->button('Item3', null, array('type' => 'danger')),
											$Tbs->buttonDropdown('Item2', $content, array('size' => 'xsmall'), array(), array('split' => true)),
											$Tbs->button('Item5'),
									)
							);
							echo $Tbs->toolbar($buttonsMixed, array('size' => 'xsmall'));
							?>
						</div>
					</div>-->

					<!-- -----------------------------------------------------------------

						Button Dropdown

					------------------------------------------------------------------ -->
					<a id="button-dropdown"></a>
					<h2>Button dropdown <small>buttonDropdown($button, $dropdown, $buttonOptions, $dropDownOptions, $options)</small></h2>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Usage</h3>
						</div>
						<div class="panel-body">
							<pre>$content = array(
		'Title' => '%header%',
		'SomeLink' => '#',
		'SomeLink2' => '#',
		'SomeLink3' => '#',
		'item' => '%divider%',
		'SomeLink4' => '#',
		'SomeLink5' => '#',
		'SomeLink6' => '#',
);
echo $Tbs->buttonDropdown('button', $content);
echo $Tbs->buttonDropdown($Tbs->icon('link') . ' gitHub', $content, array('url' => 'https://github.com/el-cms/Tbs', 'target' => '_blank', 'type' => 'success'), array(), array('split' => true));
echo $Tbs->buttonDropdown($Tbs->icon('link') . ' gitHub', $content, array('url' => 'https://github.com/el-cms/Tbs', 'target' => '_blank', 'type' => 'info', 'size' => 'big'), array(), array('split' => true, 'dropup' => true));
echo $Tbs->buttonDropdown($Tbs->icon('link') . ' gitHub', $content, array('url' => 'https://github.com/el-cms/Tbs', 'target' => '_blank', 'type' => 'info', 'class' => 'disabled', 'size'=>'xsmall'), array(), array('dropup' => true));
echo $Tbs->buttonDropdown($Tbs->icon('link') . ' gitHub', $content, array('url' => 'https://github.com/el-cms/Tbs', 'target' => '_blank', 'type' => 'warning', 'size'=>'xsmall'), array(), array('dropup' => true));</pre>
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
							echo $Tbs->buttonDropdown('button', $content);
							echo $Tbs->buttonDropdown($Tbs->icon('link') . ' gitHub', $content, array('url' => 'https://github.com/el-cms/Tbs', 'target' => '_blank', 'type' => 'success'), array(), array('split' => true));
							echo $Tbs->buttonDropdown($Tbs->icon('link') . ' gitHub', $content, array('url' => 'https://github.com/el-cms/Tbs', 'target' => '_blank', 'type' => 'info', 'size' => 'big'), array(), array('split' => true, 'dropup' => true));
							echo $Tbs->buttonDropdown($Tbs->icon('link') . ' gitHub', $content, array('url' => 'https://github.com/el-cms/Tbs', 'target' => '_blank', 'type' => 'info', 'class' => 'disabled', 'size' => 'xsmall'), array(), array('dropup' => true));
							echo $Tbs->buttonDropdown($Tbs->icon('link') . ' gitHub', $content, array('url' => 'https://github.com/el-cms/Tbs', 'target' => '_blank', 'type' => 'warning', 'size' => 'xsmall'), array(), array('dropup' => true));
							?>
						</div>
					</div>
				</div>
			</div>

    </div> <!-- /container -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="boilerplate/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

		<script src="boilerplate/js/vendor/bootstrap.min.js"></script>

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
