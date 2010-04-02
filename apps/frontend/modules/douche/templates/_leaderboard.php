		<ol>
<?php foreach ($douches as $douche) { ?>
			<li><?php echo link_to($douche, 'douche_view', $douche); ?></li>
<?php } ?>
		</ol>