const menuButtons = document.querySelectorAll('.menu-button');
const openMenuButtons = document.querySelectorAll('.openMenu');
const closeMenuButton = document.getElementById('closeMenu');
const menuOverlay = document.getElementById('menuOverlay');
const body = document.body;

function openModal() {
    menuOverlay.style.display = 'block';
    body.classList.add('modal-open'); // Adiciona a classe para fazer a página de fundo fixa
}

function closeModal() {
    menuOverlay.style.display = 'none';
    body.classList.remove('modal-open'); // Remove a classe para restaurar o comportamento normal da página de fundo
}

openMenuButtons.forEach(button => {
    button.addEventListener('click', openModal);
});

closeMenuButton.addEventListener('click', closeModal);

menuOverlay.addEventListener('click', function(e) {
    if (e.target === menuOverlay) {
        closeModal();
    }
});
