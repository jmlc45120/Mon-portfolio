<?php
/* Template Name: Mes Réalisations */
get_header(); ?>

<main class="projects-page">
    <h1>Mes Réalisations</h1>

    <div class="projects-list">
        <?php
        // Récupérer les contenus associés à la page
        $args = array(
            'post_type' => 'page', // Type de contenu (si ce sont des pages)
            'posts_per_page' => -1, // Tous les projets associés
        );
        $projects = new WP_Query($args);

        if ($projects->have_posts()):
            while ($projects->have_posts()): $projects->the_post(); ?>
                <article class="project">
                    <!-- Titre du projet -->
                    <?php if (get_field('projet')): ?>
                        <h2><?php the_field('projet'); ?></h2>
                    <?php endif; ?>

                    <!-- Description -->
                    <?php if (get_field('description')): ?>
                        <p><?php the_field('description'); ?></p>
                    <?php endif; ?>

                    <!-- Technologies utilisées -->
                    <?php if (get_field('technologies')): ?>
                        <div class="technologies">
                            <h3>Technologies utilisées :</h3>
                            <ul>
                                <?php foreach (get_field('technologies') as $tech): ?>
                                    <li>
                                        <?php 
                                        // Affiche le logo PNG (optionnel) 
                                        $logo_path = get_template_directory_uri() . '/assets/logos/' . strtolower($tech) . '.png'; 
                                        ?>
                                        <img src="<?php echo $logo_path; ?>" alt="<?php echo esc_attr($tech); ?>" class="tech-logo">
                                        <?php echo esc_html($tech); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Visuel du projet -->
                    <?php if (get_field('visuel')): ?>
                        <?php $image = get_field('visuel'); ?>
                        <div class="project-image">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                        </div>
                    <?php endif; ?>

                    <!-- Lien vers le projet -->
                    <?php if (get_field('lien_projet')): ?>
                        <a href="<?php the_field('lien_projet'); ?>" target="_blank" class="project-link">Voir le projet</a>
                    <?php endif; ?>
                </article>
            <?php endwhile;
            wp_reset_postdata();
        else:
            echo '<p>Aucun projet trouvé.</p>';
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>