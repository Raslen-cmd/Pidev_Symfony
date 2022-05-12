/*!
* Start Bootstrap - Shop Homepage v5.0.5 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

window.onload=()=>{

    const stars = document.querySelectorAll(".bi-star-fill");
//on va chercher l'input
const note = document.querySelector("#note");
//on boucle sur les etoiles pour ajouter des ecouteurs d'events
for(star of stars){
    star.addEventListener("mouseover", function(){
        resetStars();
        this.style.color= "yellow";

        let previousStar = this.previousElementSibling;
      while(previousStar){
          //on passe l'etoile qui precede en rouge
       previousStar.style.color = "yellow";
       // on recupere l'etoile qui la presede
       previousStar = previousStar.previousElementSibling;
      }
    });

star.addEventListener("click", function(){
    note.value = this.dataset.value;
});

star.addEventListener("mouseout", function(){
    resetStars(note.value);
})

}
/**
 * reset des etoiles en verifiant la note dans l'input caché
 * @param {number} note 
 */
function resetStars(note= 0){
    for(star of stars){
        if (star.dataset.value > note){
            star.style.color = "black";
        }else{
            star.style.color = "yellow";

        }
    }
}
}