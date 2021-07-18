/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';
import AOS from "aos";
import "@fortawesome/fontawesome-free";
AOS.init();


document.querySelector('#navigation-burger').addEventListener('click', function(){
    this.classList.toggle('active')
    document.querySelector('.navigation__main-menu-content').classList.toggle('active')
})

/*if(document.querySelectorAll('.home-theme__cat-card') != null) {
    let maxHeight = 0
    let query = document.querySelectorAll('.home-theme__cat-card > div p:first-of-type')
    query.forEach(function(item){
        console.log(item.offsetHeight)
        if(maxHeight <= item.offsetHeight) {
            maxHeight = item.offsetHeight
        }
    })
    query.forEach(function(item){
        if(maxHeight != item.offsetHeight) {
            //let font = window.getComputedStyle(item).fontSize
            //console.log('font ' + font)
            item.style.paddingTop = maxHeight / 4 + 'px'
        }
    })
}*/