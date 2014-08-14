<div class="inToc"><h2>Badge</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>badge($content, $options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;p&gt;Lorem ipsum &lt;?php echo $Tbs-&gt;badge('150'); ?&gt;&lt;/p&gt;
&lt;ul class=&quot;nav nav-pills nav-stacked&quot; style=&quot;max-width:250px;&quot;&gt;
	&lt;li class=&quot;active&quot;&gt;
		&lt;a href=&quot;#&quot;&gt;&lt;?php echo $Tbs-&gt;badge('150', array('class' =&gt; 'pull-right')); ?&gt;Home&lt;/a&gt;
	&lt;/li&gt;
&lt;/ul&gt;</pre>
	</div>
	<div class="panel-footer">
		<p>Lorem ipsum <?php echo $Tbs->badge('150'); ?></p>
		<ul class="nav nav-pills nav-stacked" style="max-width:250px;">
			<li class="active">
				<a href="#"><?php echo $Tbs->badge('150', array('class' => 'pull-right')); ?>Home</a>
			</li>
		</ul>
	</div>
</div>