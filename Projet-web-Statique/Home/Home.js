
const servicesContainer = document.querySelector('.Services');
const leftButton = document.querySelector('.scroll-button-left-button');
const rightButton = document.querySelector('.scroll-button-right-button');

leftButton.addEventListener('click', () => {
    servicesContainer.scrollBy({ left: -250, behavior: 'smooth' }); // Scroll left by 100 pixels
});

rightButton.addEventListener('click', () => {
    servicesContainer.scrollBy({ left: 250, behavior: 'smooth' }); // Scroll right by 100 pixels
});




// Explore more // 

let btnGift=document.querySelector('.btn-gift');

btnGift.addEventListener('click',()=>{
    window.location.href = "./packs/packs.html"

})