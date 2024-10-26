<?php
function ignoreSpecificTags($html, $tag = 'div') {
    return preg_replace('/<\/?' . $tag . '[^>]*>/', '', $html);
}

include 'components/header.php';
?>

<h1><?= htmlspecialchars($selectedArtwork['title']); ?></h1>

<div class="artwork-description">
    <?= ignoreSpecificTags($selectedArtwork['description']); ?>
</div>

<?php
include 'components/artworks.php';
?>
