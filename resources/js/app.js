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

const app = new Vue({
  el: '#app',
  components: {
    ArticleLike,
    ArticleTagsInput,
  }
})
