<div class="container-fluid">
    <div class="row">
        <h2 class="text-center font-family-della-respira titre-glob mb-5"><?= isset($content[0]['title_artwork']) ? $content[0]['title_artwork'] : 'Les œuvres'; ?></h2>

        <div class="filter-dropdown-container mb-4 p-0">
            <button class="filter-btn" onclick="toggleDropdown()">Filtrer par catégorie <span class="dropdown-arrow">▼</span></button>
            <ul class="dropdown-menu">
                <li><a href="index.php?route=filtered_artworks">Toutes les œuvres</a></li>
                <?php foreach ($filters as $filter): ?>
                    <li>
                        <a href="index.php?route=filtered_artworks&filter_id=<?= htmlspecialchars($filter['id']); ?>">
                            <?= mb_strtoupper(htmlspecialchars($filter['name_filter']), 'UTF-8'); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php if (isset($latestArtworks) && is_array($latestArtworks) && count($latestArtworks) > 0): ?>
            <?php foreach ($latestArtworks as $artwork): ?>
                <div class="col-md-4">
                    <div class="artwork-card">
                        <img src="https://ganfgsptxa.melchior-reynaud.fr/uploads/images/<?= htmlspecialchars($artwork['main_image']); ?>" class="artwork-img-top" alt="<?= htmlspecialchars($artwork['title']); ?>">
                        <h3 class="artwork-title"><?= htmlspecialchars($artwork['title']); ?></h3>
                        <p class="artwork-description">
                            <?= htmlspecialchars(strlen($artwork['description']) > 100 ? substr(stripHtmlTags($artwork['description']), 0, 200) . '...' : stripHtmlTags($artwork['description'])); ?>
                        </p>
                        <div class="artwork-btn-container">
                            <a href="index.php?route=oeuvre&id=<?= $artwork['id']; ?>" class="artwork-btn">En voir plus <span><img src="/img/arrow.svg" alt="Arrow"></span></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune œuvre trouvée.</p>
        <?php endif; ?>
    </div>
</div>

<script>
    function toggleDropdown() {
        const dropdownContainer = document.querySelector('.filter-dropdown-container');
        dropdownContainer.classList.toggle('active');
    }

    document.addEventListener('click', function(event) {
        const dropdownContainer = document.querySelector('.filter-dropdown-container');
        const isClickInside = dropdownContainer.contains(event.target);
        const filterBtn = document.querySelector('.filter-btn');

        if (!isClickInside && !filterBtn.contains(event.target)) {
            dropdownContainer.classList.remove('active');
        }
    });
</script>