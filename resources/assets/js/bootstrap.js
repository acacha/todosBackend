
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

require('admin-lte');
window.toastr = require('toastr');
require('icheck');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
// require('vue-resource');

window.axios = require('axios');
Vue.prototype.$http = axios;

require('sweetalert');

/**
 * We'll register a HTTP interceptor to attach the "CSRF" header to each of
 * the outgoing requests issued by this application. The CSRF middleware
 * included with Laravel will automatically verify the header's value.
 */

//Vue.http.interceptors.push((request, next) => {
//    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
//
//    next();
//});

//X-CSRF-TOKEN is used by javascript frameworks like Vue or Angular t avoid CSRF attacks.
//X-CSRF-TOKEN has to be the token unencripted because encripted cookies only works with Laravel (server side no client
// side javascript frameworks). XSRF-TOKEN is the same CSRF token but encripted
//https://laravel.com/docs/5.0/routing#csrf-protection
//Note: The difference between the X-CSRF-TOKEN and X-XSRF-TOKEN is that the first uses a plain text value and the
// latter uses an encrypted value, because cookies in Laravel are always encrypted.
// If you use the csrf_token() function to supply the token value, you probably want to use the X-CSRF-TOKEN header.

console.log(Laravel.csrfToken);
axios.defaults.headers.common['X-CSRF-TOKEN'] = Laravel.csrfToken;

// axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common[''] = access_token;


// if (Cookies.get('XSRF-TOKEN') !== undefined) {
//     request.headers.set('X-XSRF-TOKEN', Cookies.get('XSRF-TOKEN'));
// }

window.Cookies = require('js-cookie');
if (Cookies.get('XSRF-TOKEN') !== undefined) {
    console.log("SHIT!");
    axios.defaults.headers.common['XSRF-TOKEN'] = Cookies.get('XSRF-TOKEN');
}


/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
