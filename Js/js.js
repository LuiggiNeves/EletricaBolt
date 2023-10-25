const menuButtons = document.querySelectorAll('.menu-button');

// Adicione um evento de clique a cada botão
menuButtons.forEach(button => {
    button.addEventListener('click', () => {
        const target = button.getAttribute('data-target');
        const menu = document.querySelector(`.${target}`);
        const content = document.querySelector(`.content-${target}`);

        menu.classList.toggle('active');
        content.classList.toggle('active');
    });
});