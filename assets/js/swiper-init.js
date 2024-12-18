document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 3, // Limite à 3 slides visibles en même temps
        spaceBetween: 20, // Espacement entre les slides
        centeredSlides: true, // Le slide actif est centré
        loop: true, // Défilement en boucle
        autoplay: {
            delay: 1000,
            disableOnInteraction: false, // Reprend après interaction
            pauseOnMouseEnter: true,
        },
        speed: 3000, // Transition lente entre les slides
        freeMode: true, // Permet un défilement fluide continu
        freeModeMomentum: true, // Désactive l'accélération
    });
    // Écouteur pour réactiver l'autoplay proprement après un glisser-déposer
    const swiperContainer = document.querySelector('.swiper-container');

    swiperContainer.addEventListener('mouseleave', function () {
        if (!swiper.autoplay.running) {
            swiper.autoplay.start(); // Redémarre l'autoplay si arrêté
        }
    });
});