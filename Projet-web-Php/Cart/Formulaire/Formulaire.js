//pour effacer l'etoile


const inputFields = document.querySelectorAll('input');

inputFields.forEach(input => {
  input.addEventListener('input', function() {
    const requiredSpan = this.parentNode.querySelector('.required');
      requiredSpan.parentNode.removeChild(requiredSpan);
  });
});





//controler les input de types text .

const placeOrderButton = document.querySelector('button[type="submit"]');
placeOrderButton.addEventListener('click', function() {

    

  inputFields.forEach(input => {
    if (input.value === '') {
      input.style.borderColor = 'red';
    } else {
      input.style.borderColor = '#dadada';
    }


  });

  // control de num tel
  const Numtel = document.querySelector('input[type="tel"]');
    if (Numtel.value.length !== 8) {
        
        Numtel.style.borderColor = 'red';
    } else {
        Numtel.style.borderColor = '#dadada';
        
    } 

    


});



// besh nrajaa lcouleur aadi ken tbadel ahmer
inputFields.forEach(input => {
    input.addEventListener('input', function() {
      if (this.style.borderColor === 'red'){
          this.style.borderColor = '#dadada';
  
      };
    })})




    


