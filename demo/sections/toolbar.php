<div class="inToc"><h3>Toolbar</h3></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>toolbar($buttonsGroups, $options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
// button list 1
$tb1 = array(
		$Tbs->button('Item1'),
		$Tbs->button('Item2'),
		$Tbs->button('Item3'),
		$Tbs->button('Item4'),
);
// Button list 2
$tb2 = array(
		$Tbs->button('Item1'),
		//Note that you must define buttonDropdown size if your button group has a custom one.
		$Tbs->buttonDropdown('Item2', $Tbs->dropdown($content)),
		$Tbs->button('Item3', null, array('type' => 'danger')),
		$Tbs->button('Item5'),
);
// Simple usage:
$buttonGroups = array(
		$Tbs->buttonGroup($tb1),
		$Tbs->buttonGroup($tb2)
);
echo $Tbs->toolbar($buttonGroups);
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<?php
		// button list 1
		$tb1 = array(
				$Tbs->button('Item1'),
				$Tbs->button($Tbs->icon('star')),
				$Tbs->button('Item3'),
				$Tbs->button('Item4'),
		);
		// Button list 2
		$tb2 = array(
				$Tbs->button('Item1'),
				//Note that you must define buttonDropdown size if your button group has a custom one.
				$Tbs->buttonDropdown('Item2', $Tbs->dropdown($content)),
				$Tbs->button('Item3', null, array('type' => 'danger')),
				$Tbs->button('Item5'),
		);
		// Simple usage:
		$buttonGroups = array(
				$Tbs->buttonGroup($tb1),
				$Tbs->buttonGroup($tb2)
		);
		echo $Tbs->toolbar($buttonGroups);
		?>
	</div>
</div>