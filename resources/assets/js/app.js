
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

Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));


const ppap = new Vue({
    el: '#ppap',
    mounted() {
        console.log('Component mounted.')
    },
    data: {
        messages: [],
        usersInRoom: []
    },
    methods: {
    	addMessage(message) {
    		this.messages.push(message);
    		axios.post('/messages', message).then(response => {
                console.log(response);
    		})
    	}
    },
    created() {
    	axios.get('/messages').then(response => {
    		// console.log(response);
    		this.messages = response.data;

            Echo.channel('chatroom')
            .listen('.PublicChatroom', (e) => {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
            });
    	})
    }
});
