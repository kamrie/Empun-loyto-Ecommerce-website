// let mainImg = document.getElementById("mainImg");
// let smallImg = document.getElementsByClassName("small-img");
// console.log(smallImg)


// for(let i=0; i<4 ; i++){
//     smallImg[i].onclick =  function(){
//      mainImg.src = smallImg[i].src;

// }
// }

const products = document.querySelectorAll('.product,  .single-product');

products.forEach(product => {
    const mainImg = product.querySelector("#mainImg");
    const smallImgs = product.querySelectorAll(".small-img");

    smallImgs.forEach(img => {
        img.onclick = () => {
            mainImg.src = img.src;
        }
    });
});



// smallImg[0].addEventListener('click', () =>{
//         console.log("clicked babyy")

// })