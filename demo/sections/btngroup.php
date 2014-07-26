<a id="button-group"></a>
<h2>Button group</h2>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>buttonGroup($buttons, $options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
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
$dropdown = $Tbs->dropdown(array(
		'Title' => '%header%',
		'SomeLink' => '#',
		'SomeLink2' => '#',
		'SomeLink3' => '#',
		'item' => '%divider%',
		'SomeLink4' => '#',
		'SomeLink5' => '#',
		'SomeLink6' => '#',
));
$buttonsMixed = array(
		$Tbs->button('Item1'),
		//Note that you must define buttonDropdown size if your button group has a custom one.
		$Tbs->buttonDropdown('Item2', $dropdown, array('size'=>'xsmall')),
		$Tbs->button('Item3', null, array('type' => 'danger')),
		$Tbs->buttonDropdown('Item4', $dropdown, array('split' => true, 'size'=>'xsmall')),
		$Tbs->button('Item5'),
);
echo '<br><strong>Mixed usage</strong><br>';
echo $Tbs->buttonGroup($buttonsMixed, array('size' => 'xsmall'));
?&gt;</pre>
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
		$dropdown = $Tbs->dropdown(array(
				'Title' => '%header%',
				'SomeLink' => '#',
				'SomeLink2' => '#',
				'SomeLink3' => '#',
				'item' => '%divider%',
				'SomeLink4' => '#',
				'SomeLink5' => '#',
				'SomeLink6' => '#',
		));
		$buttonsMixed = array(
				$Tbs->button($Tbs->icon('star') . ' Item1'),
				//Note that you must define buttonDropdown size if your button group has a custom one.
				$Tbs->buttonDropdown('Item2', $dropdown, array('size' => 'xsmall')),
				$Tbs->button('Item3', null, array('type' => 'danger')),
				$Tbs->buttonDropdown('Item4', $dropdown, array('split' => true, 'size' => 'xsmall')),
				$Tbs->button('Item5'),
		);
		echo '<br><strong>Mixed usage</strong><br>';
		echo $Tbs->buttonGroup($buttonsMixed, array('size' => 'xsmall'));
		?>
		<em>Note that split buttons dropdowns are not really nice to see...</em>
	</div>
</div>