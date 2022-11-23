import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const burgerBtn=document.getElementById('burger-btn')
const nav=document.getElementById('nav')
if(burgerBtn){
   burgerBtn.addEventListener('click',function(){display(nav)})
}

//
 function display(element){
    element.classList.toggle('hidden')
 }
