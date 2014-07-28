<a id="form"></a>
<div class="inToc"><h2>Forms</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>formOpen($name, $options)</code>...<code>formClose($options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
//
// Begin form
//
echo $Tbs-&gt;formOpen('testForm');

//
// Inputs
//
// Text
echo $Tbs-&gt;input('test', 'text', array('placeholder' =&gt; 'Some text', 'value' =&gt; 'Some text'));
// Color
echo $Tbs-&gt;input('test2', 'color', array('value' =&gt; '#FF0000'));
// Datetime
echo $Tbs-&gt;input('test3', 'datetime', array('placeholder' =&gt; date(&quot;Y-m-d H:i:s&quot;)));
// Url
echo $Tbs-&gt;input('test4', 'url', array('placeholder' =&gt; 'http://example.com'));
// Email
echo $Tbs-&gt;input('test5', 'email', array('placeholder' =&gt; 'email@example.com'));
// Radios
echo $Tbs-&gt;input('test9', 'radio', array('description' =&gt; 'Radio', 'value' =&gt; 'radioValue'));
echo $Tbs-&gt;input('test9', 'radio', array('description' =&gt; 'Radio 2', 'default' =&gt; true, 'value' =&gt; 'radioValue2'));
echo $Tbs-&gt;input('test9', 'radio', array('description' =&gt; 'Radio 3', 'value' =&gt; 'radioValue3'));
// Checkboxes
echo $Tbs-&gt;input('test10', 'checkbox', array('checked' =&gt; true, 'description' =&gt; 'I\'m a checkbox !'));
echo $Tbs-&gt;input('test10', 'checkbox', array('disabled' =&gt; true, 'description' =&gt; 'I\'m a disabled checkbox'));
// Static input
echo $Tbs-&gt;input('test11', 'static', array('Static input'));
// Textarea
$text = &quot;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.&quot;;
echo $Tbs-&gt;input('test11', 'textarea', array('value' =&gt; $text));
// Select
$list = array('element1' =&gt; 'val1', 'element2' =&gt; 'val2', 'element3' =&gt; 'val3', 'element4' =&gt; 'val4');
echo $Tbs-&gt;inputSelect('test12', $list, array('default' =&gt; 'val2'));
// Multiple select with option groups
$list2 = array('group1' =&gt; $list, 'group2' =&gt; array('element5' =&gt; 'val5', 'element6' =&gt; 'val6', 'element7' =&gt; 'val7', 'element8' =&gt; 'val8'));
echo $Tbs-&gt;inputSelect('test13', $list2, array('multiple' =&gt; true));

//
// End form
//
echo $Tbs-&gt;formClose(array('submit' =&gt; array('value' =&gt; 'Submit form'), 'reset' =&gt; array('value' =&gt; 'Reset !')));
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<?php
		//
		// Begin form
		//
		echo $Tbs->formOpen('testForm');

		//
		// Inputs
		//
		// Text
		echo $Tbs->input('test', 'text', array('placeholder' => 'Some text', 'value' => 'Some text'));
		// Color
		echo $Tbs->input('test2', 'color', array('value' => '#FF0000'));
		// Datetime
		echo $Tbs->input('test3', 'datetime', array('placeholder' => date("Y-m-d H:i:s")));
		// Url
		echo $Tbs->input('test4', 'url', array('placeholder' => 'http://example.com'));
		// Email
		echo $Tbs->input('test5', 'email', array('placeholder' => 'email@example.com'));
		// Radios
		echo $Tbs->input('test9', 'radio', array('description' => 'Radio', 'value' => 'radioValue'));
		echo $Tbs->input('test9', 'radio', array('description' => 'Radio 2', 'default' => true, 'value' => 'radioValue2'));
		echo $Tbs->input('test9', 'radio', array('description' => 'Radio 3', 'value' => 'radioValue3'));
		// Checkboxes
		echo $Tbs->input('test10', 'checkbox', array('checked' => true, 'description' => 'I\'m a checkbox !'));
		echo $Tbs->input('test10', 'checkbox', array('disabled' => true, 'description' => 'I\'m a disabled checkbox'));
		// Static input
		echo $Tbs->input('test11', 'static', array('Static input'));
		// Textarea
		$text = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
		echo $Tbs->input('test11', 'textarea', array('value'=>$text));
		// Select
		$list = array('element1' => 'val1', 'element2' => 'val2', 'element3' => 'val3', 'element4' => 'val4');
		echo $Tbs->inputSelect('test12', $list, array('default' => 'val2'));
		// Multiple select with option groups
		$list2 = array('group1' => $list, 'group2' => array('element5' => 'val5', 'element6' => 'val6', 'element7' => 'val7', 'element8' => 'val8'));
		echo $Tbs->inputSelect('test13', $list2, array('multiple' => true));

		//
		// End form
		//
		echo $Tbs->formClose(array('submit' => array('value' => 'Submit form'), 'reset' => array('value' => 'Reset !')));
		?>
	</div>
</div>