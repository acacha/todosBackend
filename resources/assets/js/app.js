
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

//Vm: view model
const app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue que tal!',
        seen: false,
        todos: [
            {
                name: 'Learn Javascript',
                done: true,
                priority: 4
            },
            {
                name: 'Learn PHP',
                done: false,
                priority: 5
            },
            {
                name: 'Comprar pa',
                done: false,
                priority: 1
            }
        ]
    },
    methods: {
        reverseMessage: function() {
            this.message = this.message.split('').reverse().join('');
        },
        fetchData: function() {
            var req = new XMLHttpRequest();
            req.open('GET', 'http://localhost:8081/api/v1/task', false);
            req.send(null);
            if (req.status == 200)
                console.log(req.responseText);
        }
    },
    created: function() {
        console.log('App created!');
        this.fetchData()
    }
});