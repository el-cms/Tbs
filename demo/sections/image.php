<a id="image"></a>
<div class="inToc"><h2>Images</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>image($path, $options = array())</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
// simple image
echo $Tbs->image('http://lorempixel.com/150/150/cats/150x150/');
// Circle
echo $Tbs->image('http://lorempixel.com/150/150/cats/150x150/', array('type'=>'circle'));
// Thumbnail
echo $Tbs->image('http://lorempixel.com/150/150/cats/150x150/', array('type'=>'thumb'));
// Rounded
echo $Tbs->image('http://lorempixel.com/150/150/cats/150x150/', array('type'=>'round'));
// Responsive
echo $Tbs->image('http://lorempixel.com/1600/400/cats/1600x400/', array('type'=>'round', 'responsive'=>true));
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<?php
		// simple image
		echo $Tbs->image('http://lorempixel.com/150/150/cats/150x150/');
		// Circle
		echo $Tbs->image('http://lorempixel.com/150/150/cats/150x150/', array('type'=>'circle'));
		// Thumbnail
		echo $Tbs->image('http://lorempixel.com/150/150/cats/150x150/', array('type'=>'thumb'));
		// Rounded
		echo $Tbs->image('http://lorempixel.com/150/150/cats/150x150/', array('type'=>'round'));
		// Responsive
		echo $Tbs->image('http://lorempixel.com/1600/400/cats/1600x400/', array('type'=>'round', 'responsive'=>true));
		?>
	</div>
</div>