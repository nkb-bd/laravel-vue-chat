<template>
   <div class="chat-app">
       <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage" :baseurl="this.baseurl"/>
       <ContactsList :contacts="contacts" @selected="startConversationWith" />
   </div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactsList from './ContactsList';
    // window.Laravel = {
    //       "csrfToken": "foo",
    //       "baseUrl": "http:\/\/localhost:8080\/"
    //     }

    export default {
        props:{
            user:{
                type    : Object,
                required: true
            },
            baseurl:{
                type: String,
                required: true
            }
        },
        data() {
            return {
                selectedContact:null,
                messages : [],
                contacts : []
            };
        },
        mounted() {
            console.log('Component mounteds.');
            

            axios.get(this.baseurl +'/contacts')
                .then((response) =>{
                    this.contacts = response.data
                })
        },
        methods :{
            startConversationWith(contact) {
                axios.get(this.baseurl+`/conversation/${contact.id}`)
                    .then((response) =>{
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })
            },
            saveNewMessage(text){
                this.messages.push(text);
            }
        },
        components : {Conversation : Conversation , ContactsList :ContactsList}
    }
</script>

<style lang="scss" scoped>
.chat-app {
    display :flex;
    max-height: 75vh;
} 
</style>       