<div class="inToc"><h2>Wells</h2></div>

<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>well($content, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
echo '&lt;h3&gt;Default well&lt;/h3&gt;';
echo $Tbs-&gt;well('This is a well');
echo '&lt;h3&gt;Big well&lt;/h3&gt;';
echo $Tbs-&gt;well('This is a well', array('size'=&gt;'big'));
echo '&lt;h3&gt;Small well&lt;/h3&gt;';
echo $Tbs-&gt;well('This is a well', array('size'=&gt;'small'));
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		echo '<h3>Default well</h3>';
		echo $Tbs->well('This is a well');
		echo '<h3>Big well</h3>';
		echo $Tbs->well('This is a well', array('size'=>'big'));
		echo '<h3>Small well</h3>';
		echo $Tbs->well('This is a well', array('size'=>'small'));
		?>
	</div>
</div>