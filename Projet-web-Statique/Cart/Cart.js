



/* la partie du control de prix*/



// selectionner l commandet lkol
let rows = document.querySelectorAll('.cart tbody tr');

// nloopi f kol commande
rows.forEach(row => {

    //console.log(row)

    // nhez lrice o lquantity o somme bsh njm nmanipulehom
    let priceElement = row.querySelector('.price');
    let quantityElement = row.querySelector('.quantity');
    let subtotalElement = row.querySelector('.subtotal');
    //console.log(priceElement)
    //console.log(quantityElement)

    //console.log(subtotalElement)


    // zedna event listener lel quantity bsh nehseb somme
    quantityElement.addEventListener('input', (event) => {
        // nhez lvaleur mtaa  price o quantity 
        let price = parseFloat(priceElement.textContent);
        let quantity = parseInt(quantityElement.value);

        // ncalculi somme
        let subtotal = price * quantity;

        // tbadeli lvaleur fl html
        subtotalElement.textContent = `${subtotal}Dt`;
    });
});








// to remove the item


let removeIcons = document.querySelectorAll('.bi-x-circle');

removeIcons.forEach(function(icon) {
    icon.addEventListener('click', function() {
        let row = icon.parentNode.parentNode; 
        row.parentNode.removeChild(row);
    });
});




// to order

 let btncomm = document.querySelector('.order');
  btncomm.addEventListener('click' , function(){
    window.location.href = "./Formulaire/Formulaire.html";
  })







