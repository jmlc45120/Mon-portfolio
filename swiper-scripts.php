<?php
// Partiel pour inclure les scripts et styles de SwiperJS.
?>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- Initialisation de Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto', // Permet aux slides de s'adapter automatiquement
        spaceBetween: 20, // Espacement entre les slides
        centeredSlides: true, // Le slide actif est centré
        loop: true, // Boucle infinie
        loopedSlides: 10, // Nombre de slides dupliqués pour la boucle
        autoplay: {
            delay: 0, // Défilement continu sans pause
            disableOnInteraction: false, // Continue même après interaction
        },
        speed: 5000, // Durée du défilement (plus la valeur est grande, plus le défilement est lent)
        freeMode: true, // Active un mode libre pour éviter les interruptions
        freeModeMomentum: false, // Désactive l'inertie pour un contrôle précis
    });
});
</script>