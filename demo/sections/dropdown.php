<a id="dropdown"></a>
<div class="inToc"><h2>Dropdown</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>dropdown($content, $options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
$content = array(
		'Title' =&gt; '%header%',
		'SomeLink' =&gt; '#',
		'SomeLink2' =&gt; '#',
		'SomeLink3' =&gt; '#',
		'item' =&gt; '%divider%',
		'SomeLink4' =&gt; '#',
		'SomeLink5' =&gt; '#',
		'SomeLink6' =&gt; '#',
);
echo $Tbs-&gt;dropdown($content, array('class' =&gt; 'clearfix'));
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<?php
		$content = array(
				'Title' => '%header%',
				'SomeLink' => '#',
				'SomeLink2' => '#',
				'SomeLink3' => '#',
				'item' => '%divider%',
				'SomeLink4' => '#',
				'SomeLink5' => '#',
				'SomeLink6' => '#',
		);
		echo $Tbs->dropdown($content, array('class' => 'clearfix'));
		?><em>We don't see anything as i'm unable to display a dropdown menu only...</em>
	</div>
</div>