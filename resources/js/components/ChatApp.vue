<template>
   <div class="chat-app">
       <Conversation :contact="selectedContact" :messages="messages"/>
       <ContactsList :contacts="contacts" />
   </div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactsList from './ContactsList';

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
                    console.log(response.data);
                    console.log(this.user);
                    console.log();
                    this.contacts = response.data
                })
        },
        components : {Conversation : Conversation , ContactsList :ContactsList}
    }
</script>
