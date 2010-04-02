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
				<li><a href="#">About DoucheCrunch</a></li>
			</ul>
		</div>
	</div>
	
	<div id="container_container">
		
		<h1>DoucheCrunch</h1>
    
	<?php echo $sf_content ?>

	</div>

</body>

</html>