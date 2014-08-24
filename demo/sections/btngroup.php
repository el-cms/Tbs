<a id="button-group"></a>
<div class="inToc"><h2>Button group</h2></div>

<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>buttonGroup($buttons, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
// Default usage
$buttons = array(
		$Tbs-&gt;button('Item1'),
		$Tbs-&gt;button('Item2'),
		$Tbs-&gt;button('Item3'),
		$Tbs-&gt;button('Item4'),
);
echo '&lt;h3&gt;Basic usage&lt;/h3&gt;';
echo $Tbs-&gt;buttonGroup($buttons);

// Mixed usage
$dropdown = $Tbs-&gt;dropdown(array(
		$Tbs-&gt;dropdownItem(null, null, array('type' =&gt; 'header')),
		$Tbs-&gt;dropdownItem('SomeLink', '#'),
		$Tbs-&gt;dropdownItem('SomeLink2', '#'),
		$Tbs-&gt;dropdownItem('SomeLink3', '#'),
		$Tbs-&gt;dropdownItem(null, null, array('type' =&gt; 'divider')),
		$Tbs-&gt;dropdownItem('SomeLink4', '#'),
		$Tbs-&gt;dropdownItem('SomeLink5', '#'),
		$Tbs-&gt;dropdownItem('SomeLink6', '#'),
));
$buttonsMixed = array(
		$Tbs-&gt;button($Tbs-&gt;icon('star') . ' Item1'),
		//Note that you must define buttonDropdown size if your button group has a custom one.
		$Tbs-&gt;buttonDropdown('Item2', $dropdown, array('size' =&gt; 'xsmall')),
		$Tbs-&gt;button('Item3', null, array('type' =&gt; 'danger')),
		$Tbs-&gt;buttonDropdown('Item4', $dropdown, array('split' =&gt; true, 'size' =&gt; 'xsmall')),
		$Tbs-&gt;button('Item5'),
);
echo '&lt;h3&gt;Mixed usage&lt;/h3&gt;';
echo $Tbs-&gt;buttonGroup($buttonsMixed, array('size' =&gt; 'xsmall'));
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		// Default usage
		$buttons = array(
				$Tbs->button('Item1'),
				$Tbs->button('Item2'),
				$Tbs->button('Item3'),
				$Tbs->button('Item4'),
		);
		echo '<h3>Basic usage</h3>';
		echo $Tbs->buttonGroup($buttons);

		// Mixed usage
		$dropdown = $Tbs->dropdown(array(
				$Tbs->dropdownItem('Section header', null, array('type' => 'header')),
				$Tbs->dropdownItem('SomeLink', '#'),
				$Tbs->dropdownItem('SomeLink2', '#'),
				$Tbs->dropdownItem('SomeLink3', '#'),
				$Tbs->dropdownItem(null, null, array('type' => 'divider')),
				$Tbs->dropdownItem('SomeLink4', '#'),
				$Tbs->dropdownItem('SomeLink5', '#'),
				$Tbs->dropdownItem('SomeLink6', '#'),
		));
		$buttonsMixed = array(
				$Tbs->button($Tbs->icon('star') . ' Item1'),
				//Note that you must define buttonDropdown size if your button group has a custom one.
				$Tbs->buttonDropdown('Item2', $dropdown, array('size' => 'xsmall')),
				$Tbs->button('Item3', null, array('type' => 'danger')),
				$Tbs->buttonDropdown('Item4', $dropdown, array('split' => true, 'size' => 'xsmall')),
				$Tbs->button('Item5'),
		);
		echo '<h3>Mixed usage</h3>';
		echo $Tbs->buttonGroup($buttonsMixed, array('size' => 'xsmall'));
		?>
		<em>Note that split buttons dropdowns are not really nice to see...</em>
	</div>
</div>