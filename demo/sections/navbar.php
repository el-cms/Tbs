<div class="inToc"><h2>Navbar</h2></div>
<strong>Work in progress...</strong>
<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>navBar($content, $options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
echo '<h3>Simple responsive navbar<h3>';
echo $Tbs->navbar(array(), array('title'=>'Site Name', 'link'=>'#navbar'));
echo '<h3>Simple non-responsive navbar<h3>';
echo $Tbs->navbar(array(), array('title'=>'Site Name', 'link'=>'#navbar', 'collapse'=>false));
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<?php
		echo '<h3>Simple responsive navbar<h3>';
		echo $Tbs->navbar(array(), array('title'=>'Site Name', 'link'=>'#navbar'));
		echo '<h3>Simple non-responsive navbar<h3>';
		echo $Tbs->navbar(array(), array('title'=>'Site Name', 'link'=>'#navbar', 'collapse'=>false));
		?>
	</div>
</div>