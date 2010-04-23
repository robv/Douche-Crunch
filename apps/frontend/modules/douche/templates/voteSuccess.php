<?php
// Were they a douche?
if (!$direction) {
	echo 'Whaaat?';
}
?>

<div class="upvotes">
<?php
if ($upvotes == 0) {
	echo 'What? Nobody think\'s that ' . $name . ' is a douche!';
} else if ($upvotes == 1) {
	echo 'Only one person thinks ' . $name . ' is a douche...';
} else {
	echo $upvotes . ' people think ' . $name . ' is a douche.';
}
?>
</div>


<div class="downvotes">
<?php
if ($downvotes == 0) {
	echo 'Hehe, nobody thinks that ' . $name . ' isn\'t a douche.';
} else if ($downvotes == 1) {
	echo 'A single moron says ' . $name . ' isn\'t a douche...';
} else {
	echo $downvotes . ' people think ' . $name . ' isn\'t a douche.';
}
?>
</div>

<div class="vote_buttons">
	<div class="next"><?php echo link_to('Next', 'douche/index'); ?></div>
</div>