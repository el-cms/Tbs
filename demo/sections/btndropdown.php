<a id="button-dropdown"></a>
<div class="inToc"><h2>Button dropdown</h2></div>
<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>buttonDropdown($button, $dropdown, $options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
$content = $Tbs->dropdown(array(
		'Title' =&gt; '%header%',
		'SomeLink' =&gt; '#',
		'SomeLink2' =&gt; '#',
		'SomeLink3' =&gt; '#',
		'item' =&gt; '%divider%',
		'SomeLink4' =&gt; '#',
		'SomeLink5' =&gt; '#',
		'SomeLink6' =&gt; '#',
));
echo $Tbs-&gt;buttonDropdown('Button', $content);
echo $Tbs-&gt;buttonDropdown($Tbs-&gt;icon('link') . ' Button', $content, array('type' =&gt; 'success', 'split' =&gt; true));
echo $Tbs-&gt;buttonDropdown('Button', $content, array('type' =&gt; 'info', 'size' =&gt; 'big', 'split' =&gt; true, 'dropup' =&gt; true));
echo $Tbs-&gt;buttonDropdown($Tbs-&gt;icon('link') . ' Button', $content, array('type' =&gt; 'info', 'disabled' =&gt; 'disabled', 'size' =&gt; 'xsmall', 'dropup' =&gt; true));
echo $Tbs-&gt;buttonDropdown('Button', $content, array('type' =&gt; 'warning', 'size' =&gt; 'xsmall', 'dropup' =&gt; true));
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<?php
		$content = $Tbs->dropdown(array(
				'Title' => '%header%',
				'SomeLink' => '#',
				'SomeLink2' => '#',
				'SomeLink3' => '#',
				'item' => '%divider%',
				'SomeLink4' => '#',
				'SomeLink5' => '#',
				'SomeLink6' => '#',
		));
		echo $Tbs->buttonDropdown('Button', $content);
		echo $Tbs->buttonDropdown($Tbs->icon('link') . ' Button', $content, array('type' => 'success', 'split' => true));
		echo $Tbs->buttonDropdown('Button', $content, array('type' => 'info', 'size' => 'big', 'split' => true, 'dropup' => true));
		echo $Tbs->buttonDropdown($Tbs->icon('link') . ' Button', $content, array('type' => 'info', 'disabled' => 'disabled', 'size' => 'xsmall', 'dropup' => true));
		echo $Tbs->buttonDropdown('Button', $content, array('type' => 'warning', 'size' => 'xsmall', 'dropup' => true));
		?>
	</div>
</div>