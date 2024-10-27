<div class="container-fluid">
    <div class="row">
        <h2 class="text-center font-family-della-respira titre-glob mb-5"><?= isset($content[0]['title_artwork']) ? $content[0]['title_artwork'] : 'Les œuvres'; ?></h2>

        <?php if (isset($latestArtworks) && is_array($latestArtworks) && count($latestArtworks) > 0): ?>
            <?php foreach ($latestArtworks as $artwork): ?>
                <div class="col-md-4">
                    <div class="artwork-card">
                        <img src="<?= htmlspecialchars($artwork['main_image']); ?>" class="artwork-img-top" alt="<?= htmlspecialchars($artwork['title']); ?>">
                        <h3 class="artwork-title"><?= htmlspecialchars($artwork['title']); ?></h3>
                        <p class="artwork-description">
                            <?= htmlspecialchars(strlen($artwork['description']) > 100 ? substr($artwork['description'], 0, 200) . '...' : $artwork['description']); ?>
                        </p>
                        <div class="artwork-btn-container">
                            <a href="index.php?route=oeuvre&id=<?= $artwork['id']; ?>" class="artwork-btn">En voir plus <span><img src="../public/img/arrow.svg" alt="Arrow"></span></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune œuvre trouvée.</p>
        <?php endif; ?>
    </div>
</div>
