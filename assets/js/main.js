document.addEventListener('DOMContentLoaded', function () {
    // 1. Gestion des modales
    const openModalButtons = document.querySelectorAll('.open-modal, .btn_modale'); // Les deux boutons
    const closeModalButton = document.querySelector('.close-modal'); // Bouton pour fermer la modale
    const modalOverlay = document.querySelector('#contact-modal'); // La modale complète
    const header = document.querySelector('header'); // Sélectionne le header
    const title = document.querySelector('.page-title');
    const sections = document.querySelectorAll('section');
    const face = document.querySelector('.ma_photo');
    const burgerMenu = document.querySelector('.burger-menu');
    const headerNav = document.querySelector('.header__nav');

    function toggleNoScroll() {
        if (window.innerWidth <= 700 && headerNav.classList.contains('active')) {
            document.body.classList.add('no-scroll'); // Désactive le scroll
        } else {
            document.body.classList.remove('no-scroll'); // Réactive le scroll
        }
    }

    burgerMenu.addEventListener('click', function() {
        headerNav.classList.toggle('active');
        toggleNoScroll();
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth > 1000) {
            headerNav.classList.remove('active');
            document.body.classList.remove('no-scroll'); // Réactive le scroll si plus grand que 1000px
        } else {
            toggleNoScroll(); // Évalue si `no-scroll` doit être appliqué
        }
    });

    // animation verticale descendante du header
    if (header) {
        setTimeout(() => {
            header.classList.add('show');
        }, 300);
    }
    // animation verticale descendante du titre de chaque page
    if (title) {
        title.classList.add('animate');
    }

    sections.forEach((section, index) => {
        setTimeout(() => {
            section.classList.add('visible'); // Ajoute la classe visible avec un délai
        }, index * 400); // Décale l'apparition de chaque section de 400ms
    });
    if (face) {
        face.classList.add('visible');
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
        const revealPoint = 40; // Distance avant déclenchement de l'animation

        projects.forEach((project, index) => {
            const projectTop = project.getBoundingClientRect().top; // Position par rapport à la fenêtre

            // Vérifie si l'élément est visible
            if (projectTop < windowHeight - revealPoint) {
                project.classList.add('visible'); // Ajoute la classe visible
            }
        });
    }

    // Assure que les projets sont contrôlés dès le chargement
    revealProjects();

    // Écoute du scroll
    window.addEventListener('scroll', revealProjects);
});