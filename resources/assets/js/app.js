
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

import VueRouter from 'vue-router';
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
require('./bootstrap');

Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});


const passport =Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

const router = new VueRouter({
    routes: [
        // dynamic segments start with a colon
        { path: '/example', component: Vue.component('example', require('./components/Example.vue')) },
        { path: '/upload', component: Vue.component('upload', require('./components/Upload.vue'))},
        { path: '/passport', component: passport},

    ],
    components: {
        'PulseLoader': PulseLoader
    }

})
//Router Mounted
const app = new Vue({
    router,


}).$mount('#app');
