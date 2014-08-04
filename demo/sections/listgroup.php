<a id="listgroup"></a>
<div class="inToc"><h2>List groups</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>listgroup($items, $options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
$items = array(
		array('Item1'),
		array($Tbs-&gt;icon('home') . ' Icon'),
		array($Tbs-&gt;icon('home') . ' Icon', array('badge' =&gt; $Tbs-&gt;badge('12'))),
		array($Tbs-&gt;icon('flag') . ' Icon', array('badge' =&gt; $Tbs-&gt;badge('0'), 'url' =&gt; '#')),
		array($Tbs-&gt;icon('user') . ' Icon', array('badge' =&gt; $Tbs-&gt;badge('2'), 'url' =&gt; '#', 'type' =&gt; 'success')),
		array($Tbs-&gt;icon('warning-sign') . ' Icon', array('badge' =&gt; $Tbs-&gt;badge('27'), 'url' =&gt; '#', 'type' =&gt; 'warning', 'content' =&gt; 'subcontent')),
		array($Tbs-&gt;icon('eye-close') . ' Icon', array('badge' =&gt; $Tbs-&gt;badge('3'), 'type' =&gt; 'success', 'content' =&gt; 'subcontent', 'disabled' =&gt; true)),
);
echo $Tbs-&gt;listGroup($items, array('linked' =&gt; true));
?&gt;</pre>
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-4">
				<?php
				$items = array(
						array('Item1'),
						array($Tbs->icon('home') . ' Icon'),
						array($Tbs->icon('home') . ' Icon', array('badge' => $Tbs->badge('12'))),
						array($Tbs->icon('flag') . ' Icon', array('badge' => $Tbs->badge('0'), 'url' => '#')),
						array($Tbs->icon('user') . ' Icon', array('badge' => $Tbs->badge('2'), 'url' => '#', 'type' => 'success')),
						array($Tbs->icon('warning-sign') . ' Icon', array('badge' => $Tbs->badge('27'), 'url' => '#', 'type' => 'warning', 'content' => 'subcontent')),
						array($Tbs->icon('eye-close') . ' Icon', array('badge' => $Tbs->badge('3'), 'type' => 'success', 'content' => 'subcontent', 'disabled' => true)),
				);
				echo $Tbs->listGroup($items, array('linked' => true));
				?>
			</div>
		</div>
	</div>
</div>