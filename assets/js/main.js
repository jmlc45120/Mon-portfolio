document.addEventListener('DOMContentLoaded', function () {
    // Sélection des éléments
    const openModalButtons = document.querySelectorAll('.open-modal, .btn_modale'); // Les deux boutons
    const closeModalButton = document.querySelector('.close-modal'); // Bouton pour fermer la modale
    const modalOverlay = document.querySelector('#contact-modal'); // La modale complète

    // Fonction pour ouvrir la modale
    function openModal() {
        if (modalOverlay) {
            modalOverlay.classList.add('active');
        }
    }

    // Fonction pour fermer la modale
    function closeModal() {
        if (modalOverlay) {
            modalOverlay.classList.remove('active');
        }
    }

    // Ajouter un événement "click" à TOUS les boutons pour ouvrir la modale
    openModalButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Empêche le comportement par défaut des liens ou boutons
            openModal();
        });
    });

    // Ajouter un événement pour fermer la modale via le bouton "fermer"
    if (closeModalButton) {
        closeModalButton.addEventListener('click', closeModal);
    }

    // Fermer la modale en cliquant sur l'overlay
    if (modalOverlay) {
        modalOverlay.addEventListener('click', function (e) {
            if (e.target === modalOverlay) {
                closeModal();
            }
        });
    }

    // Fermer la modale avec la touche Échap
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
});