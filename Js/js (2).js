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



let slideIndex = 1;
let slideTimer; // Variável para armazenar o temporizador

showSlides(slideIndex);

// Função para avançar/retroceder manualmente
function plusSlides(n) {
  showSlides(slideIndex += n);
  restartTimer(); // Reinicia o temporizador quando a navegação manual é acionada
}

// Função para exibir slides automaticamente
function autoSlides() {
  showSlides(slideIndex += 1);
  slideTimer = setTimeout(autoSlides, 10000); // Muda o slide a cada 5 segundos
}

// Função para mostrar slides
function showSlides(n) {
  const slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) { slideIndex = 1; }
  if (n < 1) { slideIndex = slides.length; }
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}

// Função para reiniciar o temporizador
function restartTimer() {
  clearTimeout(slideTimer);
  slideTimer = setTimeout(autoSlides, 5000);
}

autoSlides(); // Inicia o efeito automático


const selectHead = document.querySelector('.select_head');

selectHead.addEventListener('mouseenter', function() {
  this.querySelector('select').style.display = 'block';
});

selectHead.addEventListener('mouseleave', function() {
  this.querySelector('select').style.display = 'none';
});








function openModal() {
  document.getElementById("modal").style.display = "flex";
}

function closeModal() {
  document.getElementById("modal").style.display = "none";
}

function openModal() {
  document.getElementById("modal").style.display = "flex";

  // Adiciona um ouvinte de clique no overlay
  document.getElementById("modal").addEventListener("click", function(event) {
      if (event.target === this) {
          closeModal();
      }
  });
}

function closeModal() {
  document.getElementById("modal").style.display = "none";
}