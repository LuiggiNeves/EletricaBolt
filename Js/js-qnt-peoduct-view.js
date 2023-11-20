/*Div de quantidade dos produtos da tela que abre o menu overlay*/
//OVERLAY
// Função para aumentar a quantidade
function increaseQuantity() {
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value);
    quantityInput.value = currentQuantity + 1;
  }
  
  // Função para diminuir a quantidade
  function decreaseQuantity() {
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 0) {
        quantityInput.value = currentQuantity - 1;
    }
  }
  
  /*Div de quantidade dos produtos da tela que abre o menu overlay*/
  //OVERLAY
  //---------------Fim overlay ----------------//
  

