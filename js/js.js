var radio = document.querySelector(`.manual-btn`)
var cont = 1

document.getElementById(`radio1`).checked = true

setInterval(() => {
    nextImg()
}, 7000);

function nextImg(){
    cont++

    if(cont > 3){
        cont = 1
    }
    document.getElementById(`radio${cont}`).checked = true

}
//Fim dos slides


//menu select

const selectHead = document.querySelector('.select_head');

selectHead.addEventListener('mouseenter', function() {
  this.querySelector('select').style.display = 'block';
});

selectHead.addEventListener('mouseleave', function() {
  this.querySelector('select').style.display = 'none';
});


//

