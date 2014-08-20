<div class="inToc"><h2>Alert</h2></div>

<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>alert($content, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
$content = "&lt;strong&gt;Well done!&lt;/strong&gt; You successfully read this important alert message.";
echo $Tbs-&gt;alert($content, array('type' =&gt; 'success'));
echo $Tbs-&gt;alert($content, array('type' =&gt; 'success', 'dismiss' =&gt; 'Close'));
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		$content = "<strong>Well done!</strong> You successfully read this important alert message.";
		echo $Tbs->alert($content, array('type' => 'success'));
		echo $Tbs->alert($content, array('type' => 'warning', 'dismiss' => 'Close'));
		?>
	</div>
</div>