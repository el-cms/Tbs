<a id="alert"></a>
<h2>Alert</h2>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Usage: <code>alert($content, $options, $dismisible = false)</code></h3>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
$content = "&lt;strong&gt;Well done!&lt;/strong&gt; You successfully read this important alert message.";
echo $Tbs-&gt;alert($content, array('type' =&gt; 'success'));
echo $Tbs-&gt;alert($content, array('type' =&gt; 'success'), 'Close');
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<?php
		$content = "<strong>Well done!</strong> You successfully read this important alert message.";
		echo $Tbs->alert($content, array('type' => 'success'));
		echo $Tbs->alert($content, array('type' => 'warning'), 'Close');
		?>
	</div>
</div>