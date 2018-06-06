
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

Vue.component('message', require('./components/Message.vue'));
Vue.component('send-message', require('./components/SendMessage.vue'));
Vue.directive('init', {
  bind: function(el, binding, vnode) {
    vnode.context[binding.arg] = binding.value;
  }
})

const app = new Vue({
    el: '#app',
    data: {
      chatid: -1,
      messages: []
    },
    mounted(){
      this.fetchMessages();
      Echo.private(`chat.${this.chatid}`)
          .listen('MessageSendEvent', (e) => {
            this.messages.push({
              message: e.message.message,
              user: e.user,
              created_at: e.message.created_at
            });
          });
    },
    methods: {
      addMessage(message){
        axios.post('/messages/'+this.chatid,message).then((response) => {
            this.messages.push(message);
        })
        .catch(function(error){
         alert("no se envio tu mensaje");
        });
      },
      fetchMessages(){
        axios.get('/messages/'+this.chatid+'/all').then((response) => {
          this.messages = response.data;
        })
      }
    }
});
