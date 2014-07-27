<a id="icon"></a>
<div class="inToc"><h2>Icon</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>icon($icon, $options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax brush-html">&lt;?php
echo $Tbs->icon('star');
echo $Tbs->icon('star', array('class'=>'text-danger', 'title'=>'Yay ! Red star !'));
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<?php
		echo $Tbs->icon('star');
		echo $Tbs->icon('star', array('class' => 'text-danger', 'title' => 'Yay ! Red star !'));
		?>
	</div>
</div>