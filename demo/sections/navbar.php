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
		echo '<h3>Simple responsive navbar</h3>';
		echo $Tbs->navbar(array(), array('title' => 'Site Name', 'url' => '#navbar'));

		echo '<h3>Simple non-responsive navbar</h3>';
		echo $Tbs->navbar(array(), array('title' => 'Site Name', 'url' => '#navbar', 'collapse' => false));

		echo '<h3>Adding links</h3>';
		$dropdown = array(
				'Title' => '%header%',
				'SomeLink' => '#',
				'SomeLink2' => '#',
				'SomeLink3' => '#',
				'item' => '%divider%',
				'SomeLink4' => '#',
				'SomeLink5' => '#',
				'SomeLink6' => '#',
		);

		$links = array(
				$Tbs->navbarLink('Link 1', '#navbar', array('active'=>true)),
				$Tbs->navbarLink('Link 2', '#navbar'),
				$Tbs->navbarLink('Link 3', '#navbar'),
				$Tbs->navbarLink('Link 4', '#', array('dropdown'=>$Tbs->dropdown($dropdown))),
		);
		$navbarContent=array(
				$Tbs->navbarLinks($links),
		);
		echo $Tbs->navbar($navbarContent, array('title' => 'Site Name', 'url' => '#navbar', 'collapse' => true));
//
//		echo '<h3>Simple non-responsive navbar<h3>';
//		echo $Tbs->navbar(array(), array('title'=>'Site Name', 'link'=>'#navbar', 'collapse'=>false));
		?>
	</div>
</div>