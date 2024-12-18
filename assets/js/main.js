document.addEventListener('DOMContentLoaded', function () {
    // 1. Gestion des modales
    const openModalButtons = document.querySelectorAll('.open-modal, .btn_modale'); // Les deux boutons
    const closeModalButton = document.querySelector('.close-modal'); // Bouton pour fermer la modale
    const modalOverlay = document.querySelector('#contact-modal'); // La modale complète
    const header = document.querySelector('header'); // Sélectionne le header
    const title = document.querySelector('.page-title');

    // animation verticale descendante du header
    if (header) {
        setTimeout(() => {
            header.classList.add('show');
        }, 100);
    }
    // animation verticale descendante du titre de chaque page
    if (title) {
        title.classList.add('animate');
    }

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

    // 2. Animation des projets au scroll
    const projects = document.querySelectorAll('.project'); // Sélectionne tous les projets

    function revealProjects() {
        const windowHeight = window.innerHeight; // Hauteur de la fenêtre visible
        const revealPoint = 150; // Distance avant déclenchement de l'animation

        projects.forEach((project, index) => {
            const projectTop = project.getBoundingClientRect().top; // Position par rapport à la fenêtre

            // Vérifie si l'élément est visible
            if (projectTop < windowHeight - revealPoint) {
                project.classList.add('visible'); // Ajoute la classe visible
                console.log(`Projet ${index + 1} révélé`);
            }
        });
    }

    // Assure que les projets sont contrôlés dès le chargement
    revealProjects();

    // Écoute du scroll
    window.addEventListener('scroll', revealProjects);
});