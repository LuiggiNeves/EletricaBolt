const menuButtons = document.querySelectorAll('.menu-button');

const openMenuButtons = document.querySelectorAll('.openMenu');
const closeMenuButton = document.getElementById('closeMenu');
const menuOverlay = document.getElementById('menuOverlay');

function openModal() {
    
    menuOverlay.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    menuOverlay.style.display = 'none';
    document.body.style.overflow = 'auto';
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
carregarCarrinhoDoLocalStorage(); // Carrega o carrinho do localStorage ao carregar a página