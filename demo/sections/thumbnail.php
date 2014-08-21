<div class="inToc"><h2>Thumbnail</h2></div>

<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>thumbnail($url, $options)</code>, <code>thumbList($content, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
//
// Simple thumb
//
echo '&lt;h3&gt;Basic use&lt;/h3&gt;';
echo $Tbs-&gt;thumbnail('holder.js/100%x180');
?&gt;
By default,  creating a thumbnail alone will make it use the full page width. You better wrap your thumb in a col:
&lt;div class=&quot;row&quot;&gt;
	&lt;div class=&quot;col-md-3 col-sm-6&quot;&gt;
		&lt;?php echo $Tbs-&gt;thumbnail('holder.js/100%x180'); ?&gt;
	&lt;/div&gt;
&lt;/div&gt;
&lt;?php echo '&lt;h4&gt;Using a caption&lt;/h4&gt;'; ?&gt;
&lt;div class=&quot;row&quot;&gt;
	&lt;div class=&quot;col-md-3 col-sm-6&quot;&gt;
		&lt;?php echo $Tbs-&gt;thumbnail('holder.js/100%x180', array('caption' =&gt; 'Some caption here')); ?&gt;
	&lt;/div&gt;
	&lt;div class=&quot;col-md-3 col-sm-6&quot;&gt;
		&lt;?php echo $Tbs-&gt;thumbnail('holder.js/100%x180', array('caption' =&gt; '&lt;h3&gt;H3 title&lt;/h3&gt;&lt;p&gt;Some caption here&lt;/p&gt;')); ?&gt;
	&lt;/div&gt;
	&lt;div class=&quot;col-md-3 col-sm-6&quot;&gt;
		&lt;?php echo $Tbs-&gt;thumbnail('holder.js/100%x180', array('caption' =&gt; 'I have a custom title. If no title is provided, image name is used as title.', 'title' =&gt; 'The custom title')); ?&gt;
	&lt;/div&gt;
	&lt;div class=&quot;col-md-3 col-sm-6&quot;&gt;
		&lt;?php echo $Tbs-&gt;thumbnail('http://example.com/wrongImage.png', array('caption' =&gt; 'Alt attribute, for broken links, equals to the title of the image')); ?&gt;
	&lt;/div&gt;
&lt;/div&gt;
&lt;?php
//
// Lists
//
echo '&lt;h3&gt;List creation&lt;/h3&gt;';
$list = array(
		$Tbs-&gt;thumbnail('holder.js/196x196'),
		$Tbs-&gt;thumbnail('holder.js/196x196'),
		$Tbs-&gt;thumbnail('holder.js/196x196'),
		$Tbs-&gt;thumbnail('holder.js/196x196'),
);
echo $Tbs-&gt;thumbList($list);

//
// Size variations
echo '&lt;strong&gt;Size variation&lt;/strong&gt;';
$list=array(
		$Tbs-&gt;thumbnail('holder.js/117x117', array('caption'=&gt;'Some caption')),
		$Tbs-&gt;thumbnail('holder.js/117x117', array('caption'=&gt;'Some caption')),
		$Tbs-&gt;thumbnail('holder.js/117x117', array('caption'=&gt;'Some caption')),
		$Tbs-&gt;thumbnail('holder.js/117x117', array('caption'=&gt;'Some caption')),
		$Tbs-&gt;thumbnail('holder.js/117x117', array('caption'=&gt;'Some caption')),
		$Tbs-&gt;thumbnail('holder.js/117x117', array('caption'=&gt;'Some caption')),
		$Tbs-&gt;thumbnail('holder.js/117x117', array('caption'=&gt;'Some caption')),
		$Tbs-&gt;thumbnail('holder.js/117x117', array('caption'=&gt;'Some caption')),
		$Tbs-&gt;thumbnail('holder.js/117x117', array('caption'=&gt;'Some caption')),
		$Tbs-&gt;thumbnail('holder.js/117x117', array('caption'=&gt;'Some caption')),
);

echo $Tbs-&gt;thumbList($list, array('desktopWidth'=&gt;2));
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		//
		// Simple thumb
		//
		echo '<h3>Basic use</h3>';
		echo $Tbs->thumbnail('holder.js/100%x180');
		?>
		By default,  creating a thumbnail alone will make it use the full page width. You better wrap your thumb in a col:
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<?php echo $Tbs->thumbnail('holder.js/100%x180'); ?>
			</div>
		</div>
		<?php echo '<h4>Using a caption</h4>'; ?>
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<?php echo $Tbs->thumbnail('holder.js/100%x180', array('caption' => 'Some caption here')); ?>
			</div>
			<div class="col-md-3 col-sm-6">
				<?php echo $Tbs->thumbnail('holder.js/100%x180', array('caption' => '<h3>H3 title</h3><p>Some caption here</p>')); ?>
			</div>
			<div class="col-md-3 col-sm-6">
				<?php echo $Tbs->thumbnail('holder.js/100%x180', array('caption' => 'I have a custom title. If no title is provided, image name is used as title.', 'title' => 'The custom title')); ?>
			</div>
			<div class="col-md-3 col-sm-6">
				<?php echo $Tbs->thumbnail('http://example.com/wrongImage.png', array('caption' => 'Alt attribute, for broken links, equals to the title of the image')); ?>
			</div>
		</div>
		<?php
		//
		// Lists
		//
		echo '<h3>List creation</h3>';
		$list = array(
				$Tbs->thumbnail('holder.js/196x196'),
				$Tbs->thumbnail('holder.js/196x196'),
				$Tbs->thumbnail('holder.js/196x196'),
				$Tbs->thumbnail('holder.js/196x196'),
		);
		echo $Tbs->thumbList($list);

		//
		// Size variations
		echo '<strong>Size variation</strong>';
		$list=array(
				$Tbs->thumbnail('holder.js/117x117', array('caption'=>'Some caption')),
				$Tbs->thumbnail('holder.js/117x117', array('caption'=>'Some caption')),
				$Tbs->thumbnail('holder.js/117x117', array('caption'=>'Some caption')),
				$Tbs->thumbnail('holder.js/117x117', array('caption'=>'Some caption')),
				$Tbs->thumbnail('holder.js/117x117', array('caption'=>'Some caption')),
				$Tbs->thumbnail('holder.js/117x117', array('caption'=>'Some caption')),
				$Tbs->thumbnail('holder.js/117x117', array('caption'=>'Some caption')),
				$Tbs->thumbnail('holder.js/117x117', array('caption'=>'Some caption')),
				$Tbs->thumbnail('holder.js/117x117', array('caption'=>'Some caption')),
				$Tbs->thumbnail('holder.js/117x117', array('caption'=>'Some caption')),
		);

		echo $Tbs->thumbList($list, array('desktopWidth'=>2));
		?>
	</div>
</div>