<?php
function ignoreSpecificTags($html, $tag = 'div') {
    return preg_replace('/<\/?' . $tag . '[^>]*>/', '', $html);
}

include 'components/header.php';
?>

<section id="artwork" class="bg-gray p-5">
    <div class="container-fluid mb-5">
        <div class="row">
        <h1 class="text-center font-family-della-respira titre-glob mb-5"><?= htmlspecialchars($selectedArtwork['title']); ?></h1>
            <div class="col-md-6">
                <img src="<?= htmlspecialchars($selectedArtwork['main_image']); ?>" class="artwork-main-image" alt="<?= htmlspecialchars($selectedArtwork['title']); ?>">
            </div>
            <div class="col-md-6">
                <p class="font-family-montserrat fs-15px">
                    <?= ignoreSpecificTags($selectedArtwork['description'], 'div'); ?>
                </p>
            </div>
        </div>
    </div>
    <?php
include 'components/artworks.php';
?>

</section>
