<a id="badge"></a>
<h2>Badge</h2>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Usage: <code>badge($content, $options)</code></h3>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;p&gt;lorem ipsum &lt;?php echo $Tbs->badge('150');?&gt;&lt;/p&gt;
&lt;ul class="nav nav-pills nav-stacked" style="max-width:250px;"&gt;
  &lt;li class="active"&gt;
    &lt;a href="#"&gt;&lt;?php echo $Tbs->badge('150', array('class' => 'pull-right')); ?&gt;Home&lt;/a&gt;
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