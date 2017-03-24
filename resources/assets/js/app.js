
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));

Vue.component('register-form', require('./components/auth/RegisterForm.vue'));

const app = new Vue({
  el: '#app',

  data: {
    messages: []
  },

  created() {
    this.fetchMessages();

    Echo.channel('chat')
      .listen('MessageSent', (e) => {
        this.messages.push({
          message: e.message.message,
          user: e.user
        });
      });
  },

  methods: {
    fetchMessages() {
      axios.get('/user/messages').then(response => {
        this.messages = response.data
      });
    },

    addMessage(message) {
      this.messages.push(message)

      axios.post('/messages', message).then(response => {
        console.log(response.data)
      })
    }
  }

});
