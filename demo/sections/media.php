<a id="media"></a>
<div class="inToc"><h2>Media objects</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>mediaItem($source, $content, $options)</code>, <code>mediaList($list, $options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
$content = "&lt;strong&gt;Well done!&lt;/strong&gt; You successfully read this important alert message.";
echo $Tbs-&gt;alert($content, array('type' =&gt; 'success'));
echo $Tbs-&gt;alert($content, array('type' =&gt; 'success', 'dismiss' =&gt; 'Close'));
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<h3>Simple media items</h3>
		<?php
		$source = "http://lorempixel.com/64/64/cats/64x64/";
		$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id venenatis odio. Phasellus varius vulputate mi suscipit accumsan. Pellentesque tortor dui, placerat nec dolor ut, semper aliquet lectus.';
		$options = array('url' => '#', 'title' => 'Some title', 'alt' => 'Replacement text');
		// Simple media item
		echo $Tbs->mediaItem($source, $content);
		echo $Tbs->mediaItem($source, $content, $options);
		?>
		<h3>Nested list</h3>
		<em>Not done yet...</em>
	</div>
</div>