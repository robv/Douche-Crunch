<div id="title_bar">
	<h2>Social Media Douchebag or Not?</h2>
</div>


<div id="two_column_content">
	
	<div id="two_column_content_left">
		
		<div class="next_prev">
			<div class="prev"><a href="#">Previous</a></div>
			<div class="next"><a href="#">Next</a></div>
		</div>
		
		<h2 class="screen_name"><a href="http://twitter.com/<?php echo $douche->getTwitterScreenName(); ?>">@<?php echo $douche->getTwitterScreenName(); ?></a></h2>
		
		<div class="image_wrapper_wrapper">
			<div class="image_wrapper">
				<div class="image"><img src="<?php echo $douche->getImageUrl(); ?>" alt="<?php echo $douche->getTwitterName(); ?>" /></div>
			</div>
		</div>
		
		<div class="vote_buttons">
			<span class="vote_button_yes">
				<?php echo link_to('Yeah, they are!', 'douche_confirm', $douche); ?>
			</span>
			<span class="vote_button_no">
				<?php echo link_to('No way!!11!1', 'douche_deny', $douche); ?>
			</span>
		</div>
		
		<div class="hr"><hr /></div>
		
		<h2>Their Latest Tweet</h2>
		
		<p><?php echo $douche->getLatestTweet(); ?></p>
		
	</div>
	
	<div id="two_column_content_right">
		<h2>Are they a Douche?</h2>
		<?php include_component('douche', 'new'); ?>

		<h2>Douche Leaderboard</h2>
		<?php include_component('douche', 'leaderboard'); ?>
	</div>
	
</div>