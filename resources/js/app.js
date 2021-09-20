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
require('./jquery.jTinder');
require('./jquery.transform2d');
require('./jTinder');
require('./toggleNav');
require('./chat'); 
// require('./image-picker');

const app = new Vue({
    el: '#app',
    components: {
        ArticleLike,
        ArticleTagsInput,
        FollowButton,
    }
})

document.querySelector('.image-picker input')
    .addEventListener('change', (e) => {
        const input = e.target;
        const reader = new FileReader();
        reader.onload = (e) => {
            input.closest('.image-picker').querySelector('img').src = e.target.result
        };
        reader.readAsDataURL(input.files[0]);
    });
