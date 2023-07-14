
let btnAdd= document.getElementById("addToCartBtn");

btnAdd.addEventListener("click", function() {

let imageSrc = document.querySelector(".image-item img").src;
let productName = document.querySelector(".description-item h4").innerText;
let price = document.querySelector(".description-item h2").innerText;

  let newRow = document.createElement("tr");

 newRow.innerHTML = `
            <th>
                <i class="bi bi-x-circle"></i>
            </th>
            <th>
                <img src="${imageSrc}" alt="${productName}">
            </th>
            <th>
                ${productName}
            </th>
            <th class="price">
                ${price}
            </th>
            <th>
                <input type="number" value="1" class="quantity" min="1">
            </th>
            <th class="subtotal">${price}</th>
        `;

});

