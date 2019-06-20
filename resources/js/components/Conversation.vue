<template>
    <div class="conversation">
        <h1>{{  contact ?  contact.name : "Select a Contact"}}</h1>  
        <MessagesFeed :contact="contact" :messages="messages">
    </div>
</template>

<script>
export default {
    
}
</script>