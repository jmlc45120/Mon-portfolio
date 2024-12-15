<?php
/* Template Name: Mes Réalisations */
get_header(); ?>

<main class="projects-page">
    <h1>Mes Réalisations</h1>

    <div class="projects-list">
        <?php
        // Récupérer les projets du CPT
        $args = array(
            'post_type' => 'projets', // Custom Post Type
            'posts_per_page' => -1, // Récupère tous les projets
            'orderby' => 'date', // Tri par date
            'order' => 'DESC', // Du plus récent au plus ancien
        );
        $projects = new WP_Query($args);

        if ($projects->have_posts()):
            while ($projects->have_posts()): $projects->the_post(); ?>
                <article class="project">
                    <!-- Nom du projet -->
                    <h2 class="project-title"><?php the_title(); ?></h2>

                    <div class="project-content">
                        <!-- Image du projet -->
                        <?php if (get_field('visuel')): ?>
                            <div class="project-image">
                                <img src="<?php echo esc_url(get_field('visuel')['url']); ?>" alt="<?php the_title(); ?>">
                            </div>
                        <?php endif; ?>

                        <!-- Description -->
                        <div class="project-details">
                            <div class="project-description">
                                <p><?php the_field('description'); ?></p>
                            </div>

                            <!-- Technologies utilisées -->
                            <?php if (get_field('technologies')): ?>
                                <div class="technologies">
                                    <h3>Technologies utilisées :</h3>
                                    <div class="technology-list">
                                        <?php foreach (get_field('technologies') as $tech): ?>
                                            <div class="technology">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/<?php echo strtolower($tech); ?>.png" alt="<?php echo esc_attr($tech); ?>" class="tech-logo">
                                                <span><?php echo esc_html($tech); ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
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