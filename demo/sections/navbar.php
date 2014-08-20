<div class="inToc"><h2>Navbar</h2></div>
<strong>Work in progress...</strong>
<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>navBar($content, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
echo '&lt;h3&gt;Simple responsive navbar&lt;h3&gt;';
echo $Tbs-&gt;navbar(array(), array('title'=&gt;'Site Name', 'link'=&gt;'#navbar'));
echo '&lt;h3&gt;Simple non-responsive navbar&lt;h3&gt;';
echo $Tbs-&gt;navbar(array(), array('title'=&gt;'Site Name', 'link'=&gt;'#navbar', 'collapse'=&gt;false));
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		echo '<h3>Simple responsive navbar<h3>';
		echo $Tbs->navbar(array(), array('title'=>'Site Name', 'link'=>'#navbar'));

		echo '<h3>Simple non-responsive navbar<h3>';
		echo $Tbs->navbar(array(), array('title'=>'Site Name', 'link'=>'#navbar', 'collapse'=>false));

//		echo '<h3>Adding links<h3>';
//		echo $Tbs->navbar(array(), array('title'=>'Site Name', 'link'=>'#navbar', 'collapse'=>false));
//
//		echo '<h3>Simple non-responsive navbar<h3>';
//		echo $Tbs->navbar(array(), array('title'=>'Site Name', 'link'=>'#navbar', 'collapse'=>false));


		?>
	</div>
</div>