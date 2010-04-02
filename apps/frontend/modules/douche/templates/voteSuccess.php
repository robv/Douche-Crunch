<?php
if (!$direction) {
	echo 'Whaaat?';
}

echo '<div class="upvotes">';
if ($upvotes == 0) {
	echo 'What? Nobody think\'s that ' . $name . ' is a douche!';
} else if ($upvotes == 1) {
	echo 'Only one person thinks ' . $name . ' is a douche...';
} else {
	echo $upvotes . ' people think ' . $name . ' is a douche.';
}
echo '</div>';


echo '<div class="downvotes">';
if ($downvotes == 0) {
	echo 'Hehe, nobody thinks that ' . $name . ' isn\'t a douche.';
} else if ($downvotes == 1) {
	echo 'A single moron says ' . $name . ' isn\'t a douche...';
} else {
	echo $downvotes . ' people think ' . $name . ' isn\'t a douche.';
}
echo '</div>';

?>

<div class="vote_buttons">
	<div class="next"><?php echo link_to('Next', 'douche/index'); ?></div>
</div>