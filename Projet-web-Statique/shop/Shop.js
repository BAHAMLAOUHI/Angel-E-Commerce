
let product=document.getElementsByClassName('product');
//console.log(icons); get getElementsByClassName taatina Htmlcollection !!!! //
//console.log(Array.from(icons));// 
Array.from(product).forEach((prd)=>{
    prd.addEventListener('click', () => {
        console.log("nakhdem");
        window.location.href = "./item/item.html";
    })
})