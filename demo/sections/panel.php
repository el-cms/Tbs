<div class="inToc"><h2>Panel</h2></div>

<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>panel($content, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
$content = &quot;Panel content&quot;;

echo '&lt;h3&gt;Simple panel&lt;/h3&gt;';
echo $Tbs-&gt;panel($content);

echo '&lt;h3&gt;Header/title&lt;/h3&gt;';
echo '&lt;strong&gt;Header:&lt;/strong&gt;';
echo $Tbs-&gt;panel($content, array('header' =&gt; 'Panel header'));
echo '&lt;strong&gt;Title:&lt;/strong&gt;';
echo $Tbs-&gt;panel($content, array('title' =&gt; 'Panel title'));

echo '&lt;h3&gt;Footer&lt;/h3&gt;';
echo $Tbs-&gt;panel($content, array('footer' =&gt; 'Panel footer'));

echo '&lt;h3&gt;Header and footer&lt;/h3&gt;';
echo $Tbs-&gt;panel($content, array('header'=&gt;'Panel header', 'footer' =&gt; 'Panel footer'));

echo '&lt;h3&gt;Contextual variations:&lt;/h3&gt;';
echo $Tbs-&gt;panel($content, array('title'=&gt;'Panel title', 'type'=&gt;'primary'));
echo $Tbs-&gt;panel($content, array('title'=&gt;'Panel title', 'type'=&gt;'success'));
echo $Tbs-&gt;panel($content, array('title'=&gt;'Panel title', 'type'=&gt;'info'));
echo $Tbs-&gt;panel($content, array('title'=&gt;'Panel title', 'type'=&gt;'warning'));
echo $Tbs-&gt;panel($content, array('title'=&gt;'Panel title', 'type'=&gt;'danger'));

echo '&lt;h3&gt;Simple panel&lt;/h3&gt;';
echo $Tbs-&gt;panel($content);
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		$content = "Panel content";

		echo '<h3>Simple panel</h3>';
		echo $Tbs->panel($content);

		echo '<h3>Header/title</h3>';
		echo '<strong>Header:</strong>';
		echo $Tbs->panel($content, array('header' => 'Panel header'));
		echo '<strong>Title:</strong>';
		echo $Tbs->panel($content, array('title' => 'Panel title'));

		echo '<h3>Footer</h3>';
		echo $Tbs->panel($content, array('footer' => 'Panel footer'));
		echo '<h3>Header and footer</h3>';
		echo $Tbs->panel($content, array('header' => 'Panel header', 'footer' => 'Panel footer'));

		echo '<h3>Contextual variations:</h3>';
		echo $Tbs->panel($content, array('title' => 'Panel title', 'type' => 'primary'));
		echo $Tbs->panel($content, array('title' => 'Panel title', 'type' => 'success'));
		echo $Tbs->panel($content, array('title' => 'Panel title', 'type' => 'info'));
		echo $Tbs->panel($content, array('title' => 'Panel title', 'type' => 'warning'));
		echo $Tbs->panel($content, array('title' => 'Panel title', 'type' => 'danger'));
		?>
	</div>
</div>