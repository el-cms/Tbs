<div class="inToc"><h2>Pagination</h2></div>

<div class="panel panel-default">
	<div class="panel-heading panel-example-heading">
		Usage: <code>alert($content, $options)</code>
	</div>
	<div class="panel-body panel-example-body">
		<pre class="syntax html">&lt;?php
$links = array(
		$Tbs-&gt;paginatorLink('&amp;laquo;', '#', array('disabled' =&gt; true)),
		$Tbs-&gt;paginatorLink('1', '#'),
		$Tbs-&gt;paginatorLink('2', '#'),
		$Tbs-&gt;paginatorLink('3', '#', array('current' =&gt; true)),
		$Tbs-&gt;paginatorLink('4', '#'),
		$Tbs-&gt;paginatorLink('5', '#'),
		$Tbs-&gt;paginatorLink('&amp;raquo;', '#'),
);
echo $Tbs-&gt;paginator($links, array('size'=&gt;'big'));
echo $Tbs-&gt;paginator($links);
echo $Tbs-&gt;paginator($links, array('size'=&gt;'small'));
?&gt;</pre>
	</div>
	<div class="panel-footer panel-example-footer">
		<?php
		$links = array(
				$Tbs->paginatorLink('&laquo;', '#', array('disabled' => true)),
				$Tbs->paginatorLink('1', '#'),
				$Tbs->paginatorLink('2', '#'),
				$Tbs->paginatorLink('3', '#', array('current' => true)),
				$Tbs->paginatorLink('4', '#'),
				$Tbs->paginatorLink('5', '#'),
				$Tbs->paginatorLink('&raquo;', '#'),
		);
		echo $Tbs->paginator($links, array('size'=>'big'));
		echo $Tbs->paginator($links);
		echo $Tbs->paginator($links, array('size'=>'small'));
		?>
	</div>
</div>