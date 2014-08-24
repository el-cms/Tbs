<a id="button-dropdown"></a>
<div class="inToc"><h2>Button dropdown</h2></div>
<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>buttonDropdown($button, $dropdown, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
$content = $Tbs->dropdown(array(
		$Tbs-&gt;dropdownItem(null, null, array('type' =&gt; 'header')),
		$Tbs-&gt;dropdownItem('SomeLink', '#'),
		$Tbs-&gt;dropdownItem('SomeLink2', '#'),
		$Tbs-&gt;dropdownItem('SomeLink3', '#'),
		$Tbs-&gt;dropdownItem(null, null, array('type' =&gt; 'divider')),
		$Tbs-&gt;dropdownItem('SomeLink4', '#'),
		$Tbs-&gt;dropdownItem('SomeLink5', '#'),
		$Tbs-&gt;dropdownItem('SomeLink6', '#'),
));
echo $Tbs-&gt;buttonDropdown('Button', $content);
echo $Tbs-&gt;buttonDropdown($Tbs-&gt;icon('link') . ' Button', $content, array('type' =&gt; 'success', 'split' =&gt; true));
echo $Tbs-&gt;buttonDropdown('Button', $content, array('type' =&gt; 'info', 'size' =&gt; 'big', 'split' =&gt; true, 'dropup' =&gt; true));
echo $Tbs-&gt;buttonDropdown($Tbs-&gt;icon('link') . ' Button', $content, array('type' =&gt; 'info', 'disabled' =&gt; 'disabled', 'size' =&gt; 'xsmall', 'dropup' =&gt; true));
echo $Tbs-&gt;buttonDropdown('Button', $content, array('type' =&gt; 'warning', 'size' =&gt; 'xsmall', 'dropup' =&gt; true));
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		$content = $Tbs->dropdown(array(
				$Tbs->dropdownItem('Section header', null, array('type' => 'header')),
				$Tbs->dropdownItem('SomeLink', '#'),
				$Tbs->dropdownItem('SomeLink2', '#'),
				$Tbs->dropdownItem('SomeLink3', '#'),
				$Tbs->dropdownItem(null, null, array('type' => 'divider')),
				$Tbs->dropdownItem('SomeLink4', '#'),
				$Tbs->dropdownItem('SomeLink5', '#'),
				$Tbs->dropdownItem('SomeLink6', '#'),
		));
		echo $Tbs->buttonDropdown('Button', $content);
		echo $Tbs->buttonDropdown($Tbs->icon('link') . ' Button', $content, array('type' => 'success', 'split' => true));
		echo $Tbs->buttonDropdown('Button', $content, array('type' => 'info', 'size' => 'big', 'split' => true, 'dropup' => true));
		echo $Tbs->buttonDropdown($Tbs->icon('link') . ' Button', $content, array('type' => 'info', 'disabled' => 'disabled', 'size' => 'xsmall', 'dropup' => true));
		echo $Tbs->buttonDropdown('Button', $content, array('type' => 'warning', 'size' => 'xsmall', 'dropup' => true));
		?>
	</div>
</div>