<div class="inToc"><h2>Button</h2></div>

<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>button($content, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
// Simple button
echo $Tbs-&gt;button('I\'m a button').' ';
// Button with link
echo $Tbs-&gt;button('Me too', '#button');
// Button with onClick event
echo $Tbs-&gt;button('I\'m a button with a JS alert', null, array('onClick' =&gt; 'javascript:alert(\'i\\\'m the alert\')')).' ';
// Big, disabled button
echo $Tbs-&gt;button('Big disabled button', '#', array('size' =&gt; 'big', 'type' =&gt; 'primary', 'class' =&gt; 'disabled')).' ';
// Submit button
echo $Tbs-&gt;button(null, null, array('type' =&gt; 'submit', 'value'=&gt;'Submit button')).' ';
// Active state, danger button
echo $Tbs-&gt;button('Active danger button', '#button', array('type' =&gt; 'danger', 'class' =&gt; 'active')).' ';
// Small button
echo $Tbs-&gt;button('Small info button', '#button', array('size' =&gt; 'small', 'type' =&gt; 'info')).' ';
// Small Button with an icon
echo $Tbs-&gt;button($Tbs-&gt;icon('star') . ' I have an icon !!', '#button', array('size' =&gt; 'xsmall', 'type' =&gt; 'warning')).' ';
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		// Simple button
		echo $Tbs->button('I\'m a button').' ';
		// Button with link
		echo $Tbs->button('Me too', '#button');
		// Button with onClick event
		echo $Tbs->button('I\'m a button with a JS alert', null, array('onClick' => 'javascript:alert(\'i\\\'m the alert\')')).' ';
		// Big, disabled button
		echo $Tbs->button('Big disabled button', '#', array('size' => 'big', 'type' => 'primary', 'class' => 'disabled')).' ';
		// Submit button
		echo $Tbs->button(null, null, array('type' => 'submit', 'value'=>'Submit button')).' ';
		// Active state, danger button
		echo $Tbs->button('Active danger button', '#button', array('type' => 'danger', 'class' => 'active')).' ';
		// Small button
		echo $Tbs->button('Small info button', '#button', array('size' => 'small', 'type' => 'info')).' ';
		// Small Button with an icon
		echo $Tbs->button($Tbs->icon('star') . ' I have an icon !!', '#button', array('size' => 'xsmall', 'type' => 'warning')).' ';
		?>
	</div>
</div>