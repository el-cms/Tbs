<div class="inToc"><h2>Forms</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>formOpen($name, $options)</code>...<code>formClose($options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
// Inputs
$inputs = array(
		// Email address
		$Tbs-&gt;input('email', 'email', array('placeholder' =&gt; 'Enter email')),
		// Password
		$Tbs-&gt;input('pass', 'password', array('placeholder' =&gt; 'Password')),
		// File input
		$Tbs-&gt;input('aFile', 'file', array('caption' =&gt; 'Some help text')),
		// Checkbox
		$Tbs-&gt;input('chkbox', 'checkbox', array('caption' =&gt; 'Some help text')),
);

// Begin form
echo '&lt;h3&gt;Simple form&lt;/h3&gt;';
echo $Tbs-&gt;formOpen('testForm', array('file' =&gt; true));

// Inputs
foreach ($inputs as $i) {
	echo $i;
}

// End form
echo $Tbs-&gt;formClose(array('submit' =&gt; true, 'reset' =&gt; true));
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<?php
		// Inputs
		$inputs = array(
				// Email address
				$Tbs->input('email', 'email', array('placeholder' => 'Enter email')),
				// Password
				$Tbs->input('pass', 'password', array('placeholder' => 'Password')),
				// File input
				$Tbs->input('aFile', 'file', array('caption' => 'Some help text')),
				// Checkbox
				$Tbs->input('chkbox', 'checkbox', array('caption' => 'Some help text')),
		);

		// Begin form
		echo '<h3>Simple form</h3>';
		echo $Tbs->formOpen('testForm', array('file' => true));

		// Inputs
		foreach ($inputs as $i) {
			echo $i;
		}

		// End form
		echo $Tbs->formClose(array('submit' => true, 'reset' => true));
		?>
	</div>
</div>