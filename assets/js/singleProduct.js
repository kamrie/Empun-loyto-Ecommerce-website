let mainImg = document.getElementById("mainImg");
let smallImg = document.getElementsByClassName("small-img");
console.log(smallImg)


for(let i=0; i<4 ; i++){
    smallImg[i].onclick =  function(){
     mainImg.src = smallImg[i].src;

}
}


// smallImg[0].addEventListener('click', () =>{
//         console.log("clicked babyy")

// })