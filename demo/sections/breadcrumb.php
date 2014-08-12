<div class="inToc"><h2>Breadcrumbs</h2></div>

<div class="panel panel-default">
	<div class="panel-heading">
		Usage: <code>breadcrumb($elements, $options)</code>
	</div>
	<div class="panel-body">
		<pre class="syntax html">&lt;?php
$list=array(
		$Tbs-&gt;icon('home').' Home'=&gt;'#',
		'Link 1'=&gt;'#',
		'Link 2'=&gt;'#',
		'Link 3'=&gt;'#',
		'Here'=&gt;null,
);
echo $Tbs-&gt;breadcrumbs($list);
?&gt;&lt;/pre&gt;
	</div>
	<div class="panel-footer">
		<?php
		$list=array(
				$Tbs->icon('home').' Home'=>'#',
				'Link 1'=>'#',
				'Link 2'=>'#',
				'Link 3'=>'#',
				'Here'=>null,
		);
		echo $Tbs->breadcrumbs($list);
		?>
	</div>
</div>