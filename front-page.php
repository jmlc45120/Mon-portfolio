<?php
get_header();
?>
<main>
    <div class="ma_photo">
        <?php
        $image_id = 68;
        $image_url = wp_get_attachment_url($image_id);
        if ($image_url): ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="Portrait Jean-Michel LE COUVIOUR">
        <?php
        endif;?>
    </div>
    <section class="hero">
        <div class="titre-accueil">
            <h1 class="page-title">Bienvenue sur mon portfolio</h1>
        </div>
        <div class="présentation">
            <h2>Présentation</h2>
            <p>Jean-Michel LE COUVIOUR &nbsp; - &nbsp; Développeur Web WordPress<br>
            Passionné par mon métier,&nbsp;&nbsp;je crée des expériences numériques uniques.</p>
        </div>
    </section>
    <section class="compétences">
        <h2>Mes champs de compétences</h2>
        <p> De la passion naissent la curiosité et l'envie d'exploration ...<br> L'univers du développement web est en perpétuelle évolution, en continuelle mutation.<br> Veiller aux évolutions technologiques, enrichir continuellement ses connaissances<br>et explorer de nouvelles perspectives définissent l'essence même du développeur.</p>
        <div class="swiper-container">
    <div class="swiper-wrapper">
        <?php
        // Requête pour récupérer les compétences
        $args = array(
            'post_type' => 'competences', // Remplace par le slug de ton CPT
            'posts_per_page' => -1 // Récupère toutes les compétences
        );
        $competences = new WP_Query($args);

        if ($competences->have_posts()):
            while ($competences->have_posts()): $competences->the_post();
                // Récupère le nom du fichier logo via ACF
                $logo_name = get_field('competence'); 
                if ($logo_name): // Si le champ est rempli
                    $logo_path = get_template_directory_uri() . '/assets/logos/' . strtolower($logo_name) . '.png';
                else: // Si le champ est vide, affiche un logo par défaut
                    $logo_path = get_template_directory_uri() . '/assets/logos/default.png';
                endif;
                ?>
                <div class="swiper-slide">
                    <img src="<?php echo esc_url($logo_path); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <p><?php echo esc_html(get_the_title()); ?></p>
                </div>
        <?php
            endwhile;
            wp_reset_postdata(); // Réinitialise la requête WordPress
        endif;
        ?>
    </div>
    <!-- Boutons de navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
    </section>
    <section class="services">
        <div class="descript_services">
            <h2>Mes offres de services</h2>
            <p>Développement de sites web : Création de sites vitrine, e-commerce.</p>
            <p>Personnalisation WordPress : Thèmes et plugins sur mesure.</p>
            <p>Optimisation de performance : Accélérer les temps de chargement.</p>
            <p>Intégration responsive : Sites adaptés à tous les écrans.</p>
        </div>
        <button class="btn_modale"> ME CONTACTER</button>
    </section>
</main>
<?php
get_footer();
?>