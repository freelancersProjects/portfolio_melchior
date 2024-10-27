<?php
function ignoreSpecificTags($html, $tag = 'div') {
    return preg_replace('/<\/?' . $tag . '[^>]*>/', '', $html);
}

include 'components/header.php';
?>

<section id="biography">
    <div class="bg-gray p-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center font-family-della-respira titre-glob mb-5"><?= $content[0]['title_bio']; ?></h2>
                <div class="col-md-7">
                    <p class="font-family-montserrat font-weight-semi-bold color-dark-blue fs-15px">
                    <?= ignoreSpecificTags($content[0]['description_bio'], 'div'); ?>
                    </p>
                </div>
                <div class="col-md-5">
                    <img src="/portfolio_melchior/public/img/melchior_1024.jpg" alt="Image photo de profil Melchior" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-5">
        <iframe src="<?= $content[0]['video_bio']; ?>" width="1280" height="720" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
    </div>

</section>

<section id="mes-oeuvres">
<div class="bg-gray p-5 mt-5">
        <?php
        include 'components/artworks.php';
        ?>
    </div>
</section>

<section id="contact" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="contact-title titre-glob">Formulaire de contact</h2>

                <form class="contact-form">
                    <div class="form-group">
                        <label for="name">Votre nom</label>
                        <input type="text" id="name" class="form-control" placeholder="Votre nom">
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse mail</label>
                        <input type="email" id="email" class="form-control" placeholder="Adresse mail">
                    </div>
                    <div class="form-group">
                        <label for="subject">Sujet</label>
                        <input type="text" id="subject" class="form-control" placeholder="Sujet">
                    </div>
                    <div class="form-group">
                        <label for="message">Votre message</label>
                        <textarea id="message" class="form-control" rows="4" placeholder="Votre message"></textarea>
                    </div>
                    <button type="submit" class="contact-submit-btn">Envoyer</button>
                </form>
            </div>

            <div class="col-md-6 container-social">
                <h3 class="contact-social-title">Réseaux sociaux</h3>
                <ul class="contact-social-list">
                    <li><a href="javascript:void(0);" class="contact-social-link"><i class="fas fa-envelope"></i></a></li>
                    <li><a href="https://www.instagram.com/melchior_reynaud/" class="contact-social-link" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://soundcloud.com/melchiorcompositeur" class="contact-social-link" target="_blank"><i class="fab fa-soundcloud"></i></a></li>
                    <li><a href="https://open.spotify.com/intl-fr/artist/1EcY671rk7p6B1BhKlTIPn?si=6RefckL3SDufBFfqzHjghQ" class="contact-social-link" target="_blank"><i class="fab fa-spotify"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
