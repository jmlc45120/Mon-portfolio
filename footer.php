<footer>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tous droits réservés.</p>
</footer>
<?php wp_footer(); ?>

<!-- Modale de contact -->
<div id="contact-modal" class="modal-overlay">
    <div class="modal-content">
        <button class="close-modal" aria-label="Fermer la modale">&times;</button>
        <!-- Contact Form 7 -->
        <?php echo do_shortcode('[contact-form-7 id="123" title="Formulaire de contact"]'); ?>
    </div>
</div>
</div>
</body>
</html>