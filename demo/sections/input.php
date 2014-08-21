<div class="inToc"><h3>Input</h3></div>

<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>input($name, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
// Text
echo $Tbs-&gt;input('test', 'text', array('placeholder' =&gt; 'Some text', 'value' =&gt; 'Some text'));
// Color
echo $Tbs-&gt;input('test2', 'color', array('value' =&gt; '#FF0000'));
// Datetime
echo $Tbs-&gt;input('test3', 'datetime');
// Url
echo $Tbs-&gt;input('test4', 'url', array('placeholder' =&gt; 'http://example.com'));
// Email
echo $Tbs-&gt;input('test5', 'email', array('placeholder' =&gt; 'email@example.com'));
// Reset button
echo $Tbs-&gt;input('test6', 'reset', array('value' =&gt; 'Reset form'));
// Submit button
echo $Tbs-&gt;input('test7', 'submit', array('value' =&gt; 'Submit form'));
// Input button
echo $Tbs-&gt;input('test8', 'button', array('value' =&gt; 'Input button'));
// Radios
echo $Tbs-&gt;input('test9', 'radio', array('caption' =&gt; 'Radio', 'value' =&gt; 'radioValue'));
echo $Tbs-&gt;input('test9', 'radio', array('caption' =&gt; 'Radio 2', 'default' =&gt; true, 'value' =&gt; 'radioValue2'));
echo $Tbs-&gt;input('test9', 'radio', array('caption' =&gt; 'Radio 3', 'value' =&gt; 'radioValue3'));
// Checkboxes
echo $Tbs-&gt;input('test10', 'checkbox', array('checked' =&gt; true, 'caption' =&gt; 'I\'m a checkbox !'));
echo $Tbs-&gt;input('test10', 'checkbox', array('disabled' =&gt; true, 'caption' =&gt; 'I\'m a disabled checkbox'));
// Static input
echo $Tbs-&gt;input('test11', 'static', array('value'=&gt;'Static input'));
// Textarea
$text = &quot;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.&quot;;
echo $Tbs-&gt;input('test11', 'textarea', array($text));
// Select
$list = array('element1' =&gt; 'val1', 'element2' =&gt; 'val2', 'element3' =&gt; 'val3', 'element4' =&gt; 'val4');
echo $Tbs-&gt;inputSelect('test12', $list, array('default' =&gt; 'val2'));
// Multiple select with option groups
$list2 = array('group1' =&gt; $list, 'group2' =&gt; array('element5' =&gt; 'val5', 'element6' =&gt; 'val6', 'element7' =&gt; 'val7', 'element8' =&gt; 'val8'));
echo $Tbs-&gt;inputSelect('test13', $list2, array('multiple' =&gt; true));
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<div class="form-group">
			<?php
			// Text
			echo $Tbs->input('test', 'text', array('placeholder' => 'Some text', 'value' => 'Some text'));
			// Color
			echo $Tbs->input('test2', 'color', array('value' => '#FF0000'));
			// Datetime
			echo $Tbs->input('test3', 'datetime');
			// Url
			echo $Tbs->input('test4', 'url', array('placeholder' => 'http://example.com'));
			// Email
			echo $Tbs->input('test5', 'email', array('placeholder' => 'email@example.com'));
			// Reset button
			echo $Tbs->input('test6', 'reset', array('value' => 'Reset form'));
			// Submit button
			echo $Tbs->input('test7', 'submit', array('value' => 'Submit form'));
			// Input button
			echo $Tbs->input('test8', 'button', array('value' => 'Input button'));
			// Radios
			echo $Tbs->input('test9', 'radio', array('caption' => 'Radio', 'value' => 'radioValue'));
			echo $Tbs->input('test9', 'radio', array('caption' => 'Radio 2', 'default' => true, 'value' => 'radioValue2'));
			echo $Tbs->input('test9', 'radio', array('caption' => 'Radio 3', 'value' => 'radioValue3'));
			// Checkboxes
			echo $Tbs->input('test10', 'checkbox', array('checked' => true, 'caption' => 'I\'m a checkbox !'));
			echo $Tbs->input('test10', 'checkbox', array('disabled' => true, 'caption' => 'I\'m a disabled checkbox'));
			// Static input
			echo $Tbs->input('test11', 'static', array('value'=>'Static input'));
			// Textarea
			$text = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
			echo $Tbs->input('test11', 'textarea', array($text));
			// Select
			$list = array('element1' => 'val1', 'element2' => 'val2', 'element3' => 'val3', 'element4' => 'val4');
			echo $Tbs->inputSelect('test12', $list, array('default' => 'val2'));
			// Multiple select with option groups
			$list2 = array('group1' => $list, 'group2' => array('element5' => 'val5', 'element6' => 'val6', 'element7' => 'val7', 'element8' => 'val8'));
			echo $Tbs->inputSelect('test13', $list2, array('multiple' => true));
			?>
		</div>
	</div>
</div>