		<h2 class="screen_name">
			<a target="_blank" href="http://twitter.com/<?php echo $douche->getTwitterScreenName(); ?>">
				@<?php echo $douche->getTwitterScreenName(); ?>
			</a>
			<?php
				$message = 'Hey look! @' . $douche->getTwitterScreenName() . ' has ' . $douche->getUpVotes();
				if ($douche->getUpVotes() == 1) {
					$message .= ' person who thinks';
				} else {
					$message .= ' people who think';
				}
				$message .= ' they are a douche... ' . url_for('douche_view', $douche, true);
			?>
			<span style="position:absolute; margin:-8px 0 0 10px;">
				<a href="http://twitter.com/?status=<?php echo urlencode($message); ?>">
					<img src="/images/main/tweetthis.png" width="116" height="40" alt="Tweetthis" />
				</a>
			</span>
		</h2>
		
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
		<div class="default_format skip_this_douche"><center>or you can <?php echo link_to('skip this douche', 'douche/index'); ?>.</center></div>
		
		<div class="hr"><hr /></div>
		
		<h2>Their Latest Tweet</h2>
		
		<div class="default_format">
		
			<?php
				$phrases = array('I have to go get my Ed Hardy shirt.',
						"Why should I follow you back? You're a nobody.",
						"I can't be bothered right now. I'm synergizing.",
						'Retweet you? What will I get out of it?',
						"I'm a social media coach.",
						'My job title? Evangelist.',
						"Just sayin'",
						'#RememberTheTime I was awesome? #always',
						'Dear Internet...blah blah blah #complaint',
						"I just became the mayor of your mom's house on WhoreSquare.",
						'I love me some me.',
						"I'm going out on a limb here: Apple's new product is going to be really popular.",
						"Apple's new product is going to be lame sauce.",
						'Check out this posed pic of my dog driving my car: <a href="http://twitpic.com/1cn0hs">http://twitpic.com/1cn0hs</a>');
				$key = array_rand($phrases);
				//echo '<p>"' . $phrases[$key] . '" - @' . $douche->getTwitterScreenName() . ' </p>';
				echo '<p>' . $douche->getLatestTweet() . '</p>';
			?>

		</div>