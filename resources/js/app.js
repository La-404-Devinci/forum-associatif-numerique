import './bootstrap'
import '../scss/app.scss'
import AOS from "aos";
import "@fortawesome/fontawesome-free";
import Isotope from 'isotope-layout';
import ImagesLoaded from 'imagesloaded';
import GLightbox from 'glightbox';

/* COOKIES MANAGEMENT */
window.axeptioSettings = {
    clientId:"6129f18380c3c43c01d723dc",
    cookiesVersion:"forum associatif numerique-base",
};

(function(d,s) {
    var t = d.getElementsByTagName(s)[0], e = d.createElement(s);
    e.async = true; e.src = "//static.axept.io/sdk.js";
    t.parentNode.insertBefore(e, t);
})(document, "script");

void 0 === window._axcb && (window._axcb = []);
window._axcb.push(function(axeptio) {
    axeptio.on("cookies:complete", function(choices) {

    })
})


/* Init Animate on scroll */
AOS.init();

/* TOGGLE BURGER MENU */
document.querySelector('#navigation-burger').addEventListener('click', function(){
    this.classList.toggle('active')
    document.querySelector('.navigation__main-menu-content').classList.toggle('active')
})

/* FIX TEXT PLACEMENT ON CATEGORIES CARDS COMPONENT */

if(document.querySelectorAll('.home-theme__cat-card') != null) {
    let maxHeight = 0
    let query = document.querySelectorAll('.home-theme__cat-card > div p:first-of-type')
    query.forEach(function(item){
        if(maxHeight <= item.offsetHeight) {
            maxHeight = item.offsetHeight
        }
    })
    query.forEach(function(item){
        if(maxHeight != item.offsetHeight) {
            //let font = window.getComputedStyle(item).fontSize
            item.style.paddingTop = ((maxHeight - item.offsetHeight) / 2) + 15 + 'px'
        }
    })
}

/* MASONRY LAYOUT AND LIGHTBOX ON GALLERIES */

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

});


/* MARGIN ON SINGLE ASSOCIATION TITLE CARD (RESPONSIVE FIX WITH ABSOLUTE POSITION) */

var singleHeightSelector = document.querySelector('.associations-single__title');
if(singleHeightSelector != null) {
    var singleHeight = singleHeightSelector.offsetHeight - 50;
    singleHeightSelector.parentElement.style.marginBottom = singleHeight + 'px'

    window.addEventListener('resize', function(){
        var singleHeight = singleHeightSelector.offsetHeight
        singleHeightSelector.parentElement.style.marginBottom = singleHeight + 'px'
    });
}

/* ASSOCIATION LOGO ON LOGIN PAGE */

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

/* ON SINGLE EDIT PAGE - IMAGE THUMBNAIL SELECTOR */

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

/* BACK TO TOP COMPONENT */

if(document.querySelector('.button-up') != null) {
    document.querySelector('.button-up').addEventListener("click", function(){
        window.scrollTo({ top: 0, behavior: 'smooth' });
    })
}
