document.addEventListener('DOMContentLoaded', function () {
    // Ouvrir la modale
    document.querySelector('.open-modal').addEventListener('click', function (e) {
        e.preventDefault(); // Empêche le comportement par défaut du lien
        document.querySelector('#contact-modal').classList.add('active');
    });

    // Fermer la modale en cliquant sur le bouton de fermeture
    document.querySelector('.close-modal').addEventListener('click', function () {
        document.querySelector('#contact-modal').classList.remove('active');
    });

    // Fermer la modale en cliquant à l'extérieur du contenu
    document.querySelector('#contact-modal').addEventListener('click', function (e) {
        if (e.target === this) { // Vérifie que le clic est sur l'overlay
            this.classList.remove('active');
        }
    });

    // Fermer la modale avec la touche Échap
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelector('#contact-modal').classList.remove('active');
        }
    });
});