import './bootstrap';

import Alpine from 'alpinejs';
import { update } from 'lodash';

window.Alpine = Alpine;

Alpine.start();

const burgerBtn = document.getElementById('burger-btn')
const nav = document.getElementById('nav')
const arrowBtn = document.getElementById('arrow-up')
const playBtn = document.getElementById('play-btn')
const pauseBtn = document.getElementById('pause-btn')
const slider = document.getElementById('slider');
const progressBar = document.getElementById('progress-bar')
const modalBtn = document.getElementById('modal-btn')
const closeModalBtn = document.getElementById('close-modal-btn')
const modal = document.getElementById('modal')
let autoScroll

if (slider != null) {
   autoScroll = setInterval(play, 3000)

   slider.addEventListener("scroll", updateScrollProgress)



   function updateScrollProgress() {
      const sliderScroll = slider.scrollLeft
      const sliderWidth = slider.scrollWidth - slider.clientWidth
      const scrolled = (sliderScroll / sliderWidth) * 100
      progressBar.style.width = scrolled + "%"
   }
}
if (pauseBtn != null) {
   pauseBtn.addEventListener('click', function (e) {
      clearInterval(autoScroll)
      display(this)
      display(playBtn)
   })
}
if (playBtn != null) {
   playBtn.addEventListener('click', function (e) {
      autoScroll = setInterval(play, 3000)
      display(this)
      display(pauseBtn)
   })
}

if(modalBtn!=null){
   modalBtn.addEventListener('click',function(e){
      modal.classList.remove('hidden')
   } )
}
if(closeModalBtn!=null){
   closeModalBtn.addEventListener('click',function(e){
      modal.classList.add('hidden')
   } )
}

function display(element) {
   element.classList.toggle('hidden')
}




if (burgerBtn != null) {
   burgerBtn.addEventListener('click', function () { display(nav) })
   // burgerBtn.addEventListener('click',function(){display(burgerBtn)})
}

if (arrowBtn != null) {
   arrowBtn.addEventListener('click', function (e) {
      if (this.style.transform === "rotate(180deg)") {
         this.style.transform = `rotate(0deg)`
      } else {
         this.style.transform = `rotate(180deg)`
      }
      upFooter()
   })
}
function play() {
   if (slider != null) {
      if (slider.scrollLeft + slider.clientWidth == slider.scrollWidth) {
         slider.scrollLeft = 0

      } else {
         slider.scrollLeft += slider.clientWidth
      }
   }
}
function upFooter() {
   document.getElementById('footer').classList.toggle('-bottom-10')
}







