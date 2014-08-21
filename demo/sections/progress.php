<div class="inToc"><h2>Progress bar</h2></div>

<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>progressBar($percentage, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
echo '&lt;h3&gt;Basic example&lt;/h3&gt;';
echo $Tbs-&gt;progressBar(60);

echo '&lt;h3&gt;With label&lt;/h3&gt;';
echo $Tbs-&gt;progressbar(60, array('label' =&gt; true));
echo $Tbs-&gt;progressbar(60, array('label' =&gt; 'Some label !'));
echo $Tbs-&gt;progressBar(0, array('label' =&gt; true));
echo $Tbs-&gt;progressBar(2, array('label' =&gt; 'Low percent, big label'));

echo '&lt;h3&gt;Alternatives&lt;/h3&gt;';
echo $Tbs-&gt;progressbar(35, array('type' =&gt; 'success'));
echo $Tbs-&gt;progressbar(45, array('type' =&gt; 'info'));
echo $Tbs-&gt;progressbar(95, array('type' =&gt; 'warning'));
echo $Tbs-&gt;progressbar(15, array('type' =&gt; 'danger'));

echo '&lt;h3&gt;Striped&lt;/h3&gt;';
echo $Tbs-&gt;progressbar(15, array('type' =&gt; 'danger', 'striped' =&gt; true));
echo $Tbs-&gt;progressbar(15, array('type' =&gt; 'warning', 'label' =&gt; true, 'striped' =&gt; true));

echo '&lt;h3&gt;Animated&lt;/h3&gt;';
echo $Tbs-&gt;progressbar(35, array('type' =&gt; 'success', 'animated' =&gt; true));
echo $Tbs-&gt;progressbar(25, array('type' =&gt; 'info', 'label' =&gt; 'I have a label !', 'animated' =&gt; true));

echo '&lt;h3&gt;Stacked&lt;/h3&gt;';
$bars = array(
		$Tbs-&gt;progressbar(25, array('type' =&gt; 'info', 'stacked' =&gt; true, 'animated' =&gt; true)),
		$Tbs-&gt;progressbar(15, array('type' =&gt; 'danger', 'stacked' =&gt; true,'label'=&gt;'Some label')),
		$Tbs-&gt;progressbar(35, array('type' =&gt; 'success', 'stacked' =&gt; true, 'striped' =&gt; true, 'label'=&gt;true)),
);
echo $Tbs-&gt;progressBarStack($bars);
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		echo '<h3>Basic example</h3>';
		echo $Tbs->progressBar(60);
		echo '<h3>With label</h3>';
		echo $Tbs->progressbar(60, array('label' => true));
		echo $Tbs->progressbar(60, array('label' => 'Some label !'));
		echo $Tbs->progressBar(0, array('label' => true));
		echo $Tbs->progressBar(2, array('label' => 'Low percent, big label'));
		echo '<h3>Alternatives</h3>';
		echo $Tbs->progressbar(35, array('type' => 'success'));
		echo $Tbs->progressbar(45, array('type' => 'info'));
		echo $Tbs->progressbar(95, array('type' => 'warning'));
		echo $Tbs->progressbar(15, array('type' => 'danger'));

		echo '<h3>Striped</h3>';
		echo $Tbs->progressbar(15, array('type' => 'danger', 'striped' => true));
		echo $Tbs->progressbar(15, array('type' => 'warning', 'label' => true, 'striped' => true));

		echo '<h3>Animated</h3>';
		echo $Tbs->progressbar(35, array('type' => 'success', 'animated' => true));
		echo $Tbs->progressbar(25, array('type' => 'info', 'label' => 'I have a label !', 'animated' => true));
		echo '<h3>Stacked</h3>';
		$bars = array(
				$Tbs->progressbar(25, array('type' => 'info', 'stacked' => true, 'animated' => true)),
				$Tbs->progressbar(15, array('type' => 'danger', 'stacked' => true,'label'=>'Some label')),
				$Tbs->progressbar(35, array('type' => 'success', 'stacked' => true, 'striped' => true, 'label'=>true)),
		);
		echo $Tbs->progressBarStack($bars);
		?>
	</div>
</div>