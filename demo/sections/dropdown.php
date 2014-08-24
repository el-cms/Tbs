<div class="inToc"><h2>Dropdown</h2></div>

<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>dropdown($content, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
$content = array(
		$Tbs-&gt;dropdownItem(null, null, array('type' =&gt; 'header')),
		$Tbs-&gt;dropdownItem('SomeLink', '#'),
		$Tbs-&gt;dropdownItem('SomeLink2', '#'),
		$Tbs-&gt;dropdownItem('SomeLink3', '#'),
		$Tbs-&gt;dropdownItem(null, null, array('type' =&gt; 'divider')),
		$Tbs-&gt;dropdownItem('SomeLink4', '#'),
		$Tbs-&gt;dropdownItem('SomeLink5', '#'),
		$Tbs-&gt;dropdownItem('SomeLink6', '#'),
);
echo $Tbs-&gt;dropdown($content);
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		$content = array(
				$Tbs->dropdownItem('Section header', null, array('type' => 'header')),
				$Tbs->dropdownItem('SomeLink', '#'),
				$Tbs->dropdownItem('SomeLink2', '#'),
				$Tbs->dropdownItem('SomeLink3', '#'),
				$Tbs->dropdownItem(null, null, array('type' => 'divider')),
				$Tbs->dropdownItem('SomeLink4', '#'),
				$Tbs->dropdownItem('SomeLink5', '#'),
				$Tbs->dropdownItem('SomeLink6', '#'),
		);
		echo $Tbs->dropdown($content);
		?><em>We don't see anything as i'm unable to display a dropdown menu only...</em>
	</div>
</div>