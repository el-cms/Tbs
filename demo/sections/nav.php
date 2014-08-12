<div class="inToc"><h2>Navs</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>nav($tabs, $options)</code>, <code>navItem($content, $options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
// Dropdown content
$dropdown = array(
		'Title' =&gt; '%header%',
		'SomeLink' =&gt; '#',
		'SomeLink2' =&gt; '#',
		'SomeLink3' =&gt; '#',
		'item' =&gt; '%divider%',
		'SomeLink4' =&gt; '#',
		'SomeLink5' =&gt; '#',
		'SomeLink6' =&gt; '#',
);
// First, prepare the elements
$items = array(
		$Tbs-&gt;navItem('Some Link', array('active' =&gt; true)),
		$Tbs-&gt;navItem('Some Link', array('url' =&gt; 'https://github.com/el-cms/Tbs')),
		$Tbs-&gt;navItem('Disabled item', array('disabled' =&gt; true)),
		$Tbs-&gt;navItem('Some Link'),
		$Tbs-&gt;navItem('Dropdown', array('dropdown' =&gt; true, 'dropdownContent' =&gt; $Tbs-&gt;dropdown($dropdown))),
);
// Navs
echo '&lt;h3&gt;Tabbed navs&lt;/h3&gt;';
echo $Tbs-&gt;nav($items);
// Pills
echo '&lt;h3&gt;Pills navs&lt;/h3&gt;';
echo $Tbs-&gt;nav($items, array('type' =&gt; 'pills'));
// Stacked
echo '&lt;h3&gt;Stacked navs&lt;/h3&gt;';
echo $Tbs-&gt;nav($items, array('type' =&gt; 'stacked'));
// Justified
echo '&lt;h3&gt;Justified navs&lt;/h3&gt;';
echo $Tbs-&gt;nav($items, array('justified' =&gt; true));
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<?php
		// Dropdown content
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
		// First, prepare the elements
		$items = array(
				$Tbs->navItem('Some Link', array('active' => true)),
				$Tbs->navItem('Some Link', array('url' => 'https://github.com/el-cms/Tbs')),
				$Tbs->navItem('Disabled item', array('disabled' => true)),
				$Tbs->navItem('Some Link'),
				$Tbs->navItem('Dropdown', array('dropdown' => true, 'dropdownContent' => $Tbs->dropdown($dropdown))),
		);
		// Navs
		echo '<h3>Tabbed navs</h3>';
		echo $Tbs->nav($items);
		// Pills
		echo '<h3>Pills navs</h3>';
		echo $Tbs->nav($items, array('type' => 'pills'));
		// Stacked
		echo '<h3>Stacked navs</h3>';
		echo $Tbs->nav($items, array('type' => 'stacked'));
		// Justified
		echo '<h3>Justified navs</h3>';
		echo $Tbs->nav($items, array('justified' => true));
		?>
	</div>
</div>