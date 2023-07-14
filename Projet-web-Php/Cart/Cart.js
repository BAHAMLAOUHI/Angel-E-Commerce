document.addEventListener('DOMContentLoaded', () => {
  let rows = document.querySelectorAll('.cart tbody tr');

  rows.forEach(row => {
    let priceElement = row.querySelector('.price');
    let quantityElement = row.querySelector('.quantity');
    let subtotalElement = row.querySelector('.subtotal');

    quantityElement.addEventListener('input', (event) => {
      let price = parseFloat(priceElement.textContent);
      let quantity = parseInt(quantityElement.value);

      let subtotal = price * quantity;

      subtotalElement.textContent = `${subtotal}Dt`;
      calculateTotal();
    });
  });











  
  
    // let removeIcons = document.querySelectorAll('.bi.bi-x-circle');
  
    // removeIcons.forEach(function (icon) {
    //   icon.addEventListener('click', function () {
    //     let row = icon.parentNode.parentNode.parentNode;
    //     row.parentNode.removeChild(row);
    //     calculateTotal();
    //   });
    // });
  
    function calculateTotal() {
      const subtotals = document.querySelectorAll('.subtotal');
      const totalAmount = document.getElementById('totalAmount');
  
      let total = 0;
      subtotals.forEach(subtotal => {
        const subtotalValue = parseFloat(subtotal.textContent);
        total += subtotalValue;
      });
  
      totalAmount.textContent = `${total}Dt`;
    }
  
    let btncomm = document.querySelector('.order');
    btncomm.addEventListener('click', function() {
      window.location.href = "./Formulaire/Formulaire.html";
    });
  
    calculateTotal();
  ;
});