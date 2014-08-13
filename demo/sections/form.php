<div class="inToc"><h2>Forms</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>formOpen($name, $options)</code>...<code>formClose($options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html"></pre>
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