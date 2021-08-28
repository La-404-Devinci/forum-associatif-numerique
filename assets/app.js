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
import Isotope from 'isotope-layout';
import ImagesLoaded from 'imagesloaded';
import GLightbox from 'glightbox';

AOS.init();

document.querySelector('#navigation-burger').addEventListener('click', function(){
    this.classList.toggle('active')
    document.querySelector('.navigation__main-menu-content').classList.toggle('active')
})

if(document.querySelectorAll('.home-theme__cat-card') != null) {
    let maxHeight = 0
    let query = document.querySelectorAll('.home-theme__cat-card > div p:first-of-type')
    query.forEach(function(item){
        console.log(item.offsetHeight)
        if(maxHeight <= item.offsetHeight) {
            maxHeight = item.offsetHeight
        }

    })
    console.log(maxHeight)
    query.forEach(function(item){
        if(maxHeight != item.offsetHeight) {
            //let font = window.getComputedStyle(item).fontSize
            console.log((maxHeight - item.offsetHeight) / 2)

            item.style.paddingTop = ((maxHeight - item.offsetHeight) / 2) + 15 + 'px'
        }
    })
}
if(document.querySelector('.associations-single .galerie') != null) {
    var grid = document.querySelector('.associations-single .galerie');
    ImagesLoaded(grid, function () {
        new Isotope( grid, {
            itemSelector: '.galerie-image',
            percentPosition: true,

            masonry: {
                gutter: 15
            }
        })
    })
}

var lightbox = GLightbox();
lightbox.on('open', (target) => {
    console.log('lightbox opened');
});

var singleHeightSelector = document.querySelector('.associations-single__title');
if(singleHeightSelector != null) {
    var singleHeight = singleHeightSelector.offsetHeight - 50;
    singleHeightSelector.parentElement.style.marginBottom = singleHeight + 'px'

    window.addEventListener('resize', function(){
        var singleHeight = singleHeightSelector.offsetHeight
        singleHeightSelector.parentElement.style.marginBottom = singleHeight + 'px'
    });
}

if(document.querySelector('.login-page') != null) {
    document.querySelector('#inputName').addEventListener('input', function(){
        let inputVal = document.querySelector('#inputName').value.trim().replace(/\s+/g, '-').toLowerCase()
        let image = new Image()
        image.src = "/white/"+inputVal+".png"
        image.onload = function() {
            document.querySelector('#login-logo').src = "/white/"+inputVal+".png"
        }
        image.onerror = function() {
            document.querySelector('#login-logo').src = "/white/forum.png"
        }
    })
}

if(document.querySelector(".profil-asso") != null) {

    let defaultImg = document.querySelector('#profile_form_thumbnail').value
    if(document.querySelector('.form-gallery-content div img[src="'+defaultImg+'"]') != null) {
        document.querySelector('.form-gallery-content div img[src="'+defaultImg+'"]').classList.add('active')
    }


    document.querySelectorAll('.form-gallery-content div img').forEach(function (item){
        item.addEventListener('click', function(){

            document.querySelectorAll('.form-gallery-content div img').forEach(function (item){
                item.classList.remove('active')
            })
            this.classList.add('active')
            let imgLink = this.getAttribute('src')
            document.querySelector('#profile_form_thumbnail').value = imgLink

        })
    })

}

if(document.querySelector('.button-up') != null) {
    document.querySelector('.button-up').addEventListener("click", function(){
        window.scrollTo({ top: 0, behavior: 'smooth' });
    })
}