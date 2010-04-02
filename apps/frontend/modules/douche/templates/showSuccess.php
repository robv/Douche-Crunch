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
				echo '<p>"' . $phrases[$key] . '" - @' . $douche->getTwitterScreenName() . ' </p>';
?>