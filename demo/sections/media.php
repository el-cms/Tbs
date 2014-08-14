<div class="inToc"><h2>Media objects</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>mediaItem($source, $content, $options)</code>, <code>mediaList($list, $options)</code>
	</div>
	<div class="panel-body">
		<h3>Simple media items:</h3>
		<pre class="syntax html">&lt;?php
// Source image
$source = &quot;http://lorempixel.com/64/64/cats/64x64/&quot;;
// Item content
$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id venenatis odio. Phasellus varius vulputate mi suscipit accumsan. Pellentesque tortor dui, placerat nec dolor ut, semper aliquet lectus.';
// Some options
$options = array('url' =&gt; '#', 'title' =&gt; 'Some title', 'alt' =&gt; 'Replacement text');

// Simple media item
echo $Tbs-&gt;mediaItem($source, $content);
// With options
echo $Tbs-&gt;mediaItem($source, $content, $options);
?&gt;</pre>

		<h3>Nested media items</h3>
		<pre class="syntax html">&lt;?php
//Define your $list as follow (source, content and options ARE needed, as they are passed to mediaItem)
$list = array(
		// Item 1
		array('source' => $source, 'content' => $content, 'options' => $options),
		// Item 2 with sublist
		array('source' => $source, 'content' => $content, 'options' => $options, 'list' => array(
						// Sub item 1
						array('source' => $source, 'content' => $content, 'options' => $options),
						// Sub item 2
						array('source' => $source, 'content' => $content, 'options' => $options),
						// ...
						array('source' => $source, 'content' => $content, 'options' => $options, 'list' => array(
										// Sub list
										array('source' => $source, 'content' => $content, 'options' => $options),
								)
						),
						// Sub item 3
						array('source' => $source, 'content' => $content, 'options' => $options),
				)
		)
);

echo $Tbs->mediaList($list);
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<h3>Simple media items</h3>
		<?php
		// Source image
		$source = "http://lorempixel.com/64/64/cats/64x64/";
		// Item content
		$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id venenatis odio. Phasellus varius vulputate mi suscipit accumsan. Pellentesque tortor dui, placerat nec dolor ut, semper aliquet lectus.';
		// Some options
		$options = array('url' => '#', 'title' => 'Some title', 'alt' => 'Replacement text');

		// Simple media item
		echo $Tbs->mediaItem($source, $content);
		// With options
		echo $Tbs->mediaItem($source, $content, $options);
		?>
		<h3>Nested list</h3>
		<?php
		//Define your $list as follow (source, content and options ARE needed, as they are passed to mediaItem)
		$list = array(
				// Item 1
				array('source' => $source, 'content' => $content, 'options' => $options),
				// Item 2 with sublist
				array('source' => $source, 'content' => $content, 'options' => $options, 'list' => array(
								// Sub item 1
								array('source' => $source, 'content' => $content, 'options' => $options),
								// Sub item 2
								array('source' => $source, 'content' => $content, 'options' => $options),
								// ...
								array('source' => $source, 'content' => $content, 'options' => $options, 'list' => array(
												// Sub list
												array('source' => $source, 'content' => $content, 'options' => $options),
										)
								),
						    // Sub item 3
								array('source' => $source, 'content' => $content, 'options' => $options),
						)
				)
		);

		echo $Tbs->mediaList($list);
		?>
	</div>
</div>