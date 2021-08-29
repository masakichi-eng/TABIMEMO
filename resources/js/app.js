// require('./bootstrap');
// import { library, dom } from '@fortawesome/fontawesome-svg-core'
// import { faAddressCard, faClock } from '@fortawesome/free-regular-svg-icons'
// import { faSearch, faStoreAlt, faShoppingBag, faSignOutAlt, faYenSign, faCamera } from '@fortawesome/free-solid-svg-icons'

// library.add(faSearch, faAddressCard, faStoreAlt, faShoppingBag, faSignOutAlt, faYenSign, faClock, faCamera);
// dom.watch();


import './bootstrap'
import Vue from 'vue'
import ArticleLike from './components/ArticleLike'
import ArticleTagsInput from './components/ArticleTagsInput'
import FollowButton from './components/FollowButton'

const app = new Vue({
    el: '#app',
    components: {
        ArticleLike,
        ArticleTagsInput,
        FollowButton,
    }
})

$(function () {
    /* SP menu */
    function toggleNav() {
        var body = document.body;
        var hamburger = document.getElementById('nav_btn');
        var blackBg = document.getElementById('nav_bg');
        hamburger.addEventListener('click', function () {
            body.classList.add('nav_open'); //メニュークリックでnav-openというクラスがbodyに付与
        });
        blackBg.addEventListener('click', function () {
            body.classList.remove('nav_open'); //もう一度クリックで解除
        });
    }
    toggleNav();
});

