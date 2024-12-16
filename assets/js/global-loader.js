document.addEventListener('DOMContentLoaded', function () {
    const loader = document.getElementById('page-loader');
    const contactForm = document.querySelector('.wpcf7-form');
    const modalOverlay = document.querySelector('.modal-overlay'); // Modale
    const closeModalButton = document.querySelector('.close-modal'); // Bouton fermer

    // Fonction pour désactiver le loader
    function stopLoader() {
        loader.classList.remove('active');
    }

    // Activer le loader pendant le chargement de la page
    loader.classList.add('active'); // Afficher le loader dès que le DOM est prêt
    window.addEventListener('load', function () {
        stopLoader(); // Désactiver le loader après le chargement complet
    });

    // Activer le loader pendant l'envoi du formulaire
    if (contactForm) {
        contactForm.addEventListener('wpcf7beforesubmit', function () {
            loader.classList.add('active'); // Activer le loader avant l'envoi
        });

        // Désactiver le loader dans tous les cas
        contactForm.addEventListener('wpcf7mailsent', stopLoader); // Envoi réussi
        contactForm.addEventListener('wpcf7invalid', stopLoader); // Validation échouée
        contactForm.addEventListener('wpcf7mailfailed', stopLoader); // Envoi échoué
    }

    // Réinitialiser le loader quand la modale est fermée
    function closeModal() {
        modalOverlay.classList.remove('active'); // Ferme la modale
        stopLoader(); // Réinitialise le loader
    }

    // Gérer la fermeture via le bouton
    if (closeModalButton) {
        closeModalButton.addEventListener('click', closeModal);
    }

    // Gérer la fermeture avec la touche Échap
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modalOverlay.classList.contains('active')) {
            closeModal();
        }
    });

    // Optionnel : Fermer en cliquant à l'extérieur de la modale
    if (modalOverlay) {
        modalOverlay.addEventListener('click', function (e) {
            if (e.target === modalOverlay) {
                closeModal();
            }
        });
    }
});