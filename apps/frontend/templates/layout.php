<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
<script type="text/javascript" charset="utf-8">Site.config.site_url = '/'; Site.config.base_url = '/';</script>
</head>

<body>
	
	<div id="header_nav" class="clearfix">
		<div id="header_nav_inner" class="clearfix">
			<ul class="clearfix">
				<li><?php echo link_to('About Us', 'about/us'); ?></li>
			</ul>
		</div>
	</div>
	
	<div id="container_container">
		
		<h1><?php echo link_to('DoucheCrunchg', 'homepage'); ?></h1>
<?php if ($sf_user->hasFlash('error')) { echo $sf_user->getFlash('error'); } ?>

			<div id="title_bar">
				<h2><?php echo get_slot('header', 'Social Media Douchebag or Not?'); ?></h2>
			</div>

		<div id="two_column_content">
			
			<div id="two_column_content_left">
				<?php echo $sf_content ?>

			</div>

			<div id="two_column_content_right">
				<h2>Are they a Douche?</h2>
				<?php include_component('douche', 'new'); ?>

				<h2>Douche Leaderboard</h2>
				<?php include_component('douche', 'leaderboard'); ?>

				<h2>Hey look, we're on the tweeter too!</h2>
				<p><a href="http://twitter.com/douchecrunch">@douchecrunch</a></p>
			</div>
			
		</div>
		
	</div>
<script src="http://static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">clicky.init(201669);</script>
</body>

</html>