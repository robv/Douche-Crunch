<h1><?php echo $douche->getTwitterName(); ?></h1>
<img src="<?php echo $douche->getImageUrl(); ?>" alt="<?php echo $douche->getTwitterScreenName(); ?>" />
<?php echo link_to('Yeah, they are!', 'douche_confirm', $douche); ?> | <?php echo link_to('No way!!11!1', 'douche_deny', $douche); ?>