		<ol>
<?php foreach ($douches as $douche) { ?>
			<li><span class="float_right"><?php echo $douche->getUpVotes(); ?> votes</span><?php echo link_to($douche->getTwitterScreenName(), 'douche_view', $douche); ?></li>
<?php } ?>
		</ol>