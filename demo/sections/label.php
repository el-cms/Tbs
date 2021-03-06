<div class="inToc"><h2>Label</h2></div>

<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>button($content, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
echo $Tbs-&gt;label('label') . "\n";
echo $Tbs-&gt;label('label', array('type' =&gt; 'primary')) . "\n";
echo $Tbs-&gt;label('label', array('type' =&gt; 'success')) . "\n";
echo $Tbs-&gt;label('label', array('type' =&gt; 'info')) . "\n";
echo $Tbs-&gt;label('label', array('type' =&gt; 'warning')) . "\n";
echo $Tbs-&gt;label('label', array('type' =&gt; 'danger')) . "\n";
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		echo $Tbs->label('label') . "\n";
		echo $Tbs->label('label', array('type' => 'primary')) . "\n";
		echo $Tbs->label('label', array('type' => 'success')) . "\n";
		echo $Tbs->label('label', array('type' => 'info')) . "\n";
		echo $Tbs->label('label', array('type' => 'warning')) . "\n";
		echo $Tbs->label('label', array('type' => 'danger')) . "\n";
		?>
	</div>
</div>