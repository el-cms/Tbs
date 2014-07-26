<a id="button"></a>
<h2>Button</h2>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Usage: <code>button($content, $options)</code></h3>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
echo $Tbs-&gt;button('I\'m a button');
echo $Tbs-&gt;button('Me too', '#button');
echo $Tbs-&gt;button('I\'m a button with a JS alert', null, array('onClick' =&gt; 'javascript:alert(\'i\\\'m the alert\')'));
echo $Tbs-&gt;button('Big disabled button', '#', array('size' =&gt; 'big', 'type' =&gt; 'primary', 'class' =&gt; 'disabled'));
echo $Tbs-&gt;button('Input button', null, array('type' =&gt; 'primary', 'class' =&gt; 'success', 'tag'=&gt;'input'));
echo $Tbs-&gt;button('Active danger button', '#button', array('type' =&gt; 'danger', 'class' =&gt; 'active'));
echo $Tbs-&gt;button('Small info button', '#button', array('size' =&gt; 'small', 'type' =&gt; 'info'));
echo $Tbs-&gt;button($Tbs-&gt;icon('star') . ' I have an icon !!', '#button', array('size' =&gt; 'xsmall', 'type' =&gt; 'warning'));
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<?php
		echo $Tbs->button('I\'m a button');
		echo $Tbs->button('Me too', '#button');
		echo $Tbs->button('I\'m a button with a JS alert', null, array('onClick' => 'javascript:alert(\'i\\\'m the alert\')'));
		echo $Tbs->button('Big disabled button', '#', array('size' => 'big', 'type' => 'primary', 'class' => 'disabled'));
		echo $Tbs->button('Input button', null, array('type' => 'primary', 'class' => 'success', 'tag' => 'input'));
		echo $Tbs->button('Active danger button', '#button', array('type' => 'danger', 'class' => 'active'));
		echo $Tbs->button('Small info button', '#button', array('size' => 'small', 'type' => 'info'));
		echo $Tbs->button($Tbs->icon('star') . ' I have an icon !!', '#button', array('size' => 'xsmall', 'type' => 'warning'));
		?>
	</div>
</div>