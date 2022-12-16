const slider = document.querySelector("#slider");

let sliderSection = document.querySelectorAll(".slider__section");

let sliderSectionLast = sliderSection[sliderSection.length-1];


const  btnIzquierda =document.querySelector("#btn-izquierda");
const btnDerecha =document.querySelector("#btn-derecha");

slider.insertAdjacentElement("afterbegin", sliderSectionLast);

function moverDerecha(){
    let sliderSectionFirst =document.querySelectorAll(".slider__section")[0];
    slider.style.marginLeft="-200%";
    slider.style.transition = "all 1.5s";
    setTimeout(() => {
        slider.style.transition = "none";
        slider.insertAdjacentElement("beforeend", sliderSectionFirst);
        slider.style.marginLeft="-100%";
    }, 1500);
}

function moverIzquierda(){
    let sliderSection = document.querySelectorAll(".slider__section");
    let sliderSectionLast = sliderSection[sliderSection.length-1];
    slider.style.marginLeft="0";
    slider.style.transition = "all 1.5s";
    setTimeout(() => {
        slider.style.transition = "none";
        slider.insertAdjacentElement("afterbegin", sliderSectionLast);
        slider.style.marginLeft="-100%";
    }, 1500);
}


btnDerecha.addEventListener("click", function(){
    moverDerecha();
})

btnIzquierda.addEventListener("click", function(){
    moverIzquierda();
})

setInterval(() => {
    moverDerecha()
}, 5000);


