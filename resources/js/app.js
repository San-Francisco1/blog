window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('article-component', require('./components/ArticleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
