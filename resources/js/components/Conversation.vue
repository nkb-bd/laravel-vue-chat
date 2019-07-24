<template>
    <div class="conversation">
        <h1>{{  contact ?  contact.name : "Select a Contact.."}}</h1>  
        <MessagesFeed :contact="contact" :messages="messages" />
        <MessaageComposer @send="sendMessage" />
        <!-- <MessagesFeed /> -->
    </div>
</template>

<script>
import MessagesFeed from './MessagesFeed';
import MessaageComposer from './MessaageComposer';

export default {

	props: {
		contact :{
			type: Object,
			default: null,
		},
		messages :{
			type : Array,
			default: ''
		},

        baseurl:{
                type: String,
                required: true
        }
		
	},
	mounted() {
		// console.log('x');
	},
	methods : {
			sendMessage(text) {
				console.log(text)

				if (!this.contact) {
					return;
				}
				axios.post(this.baseurl+'/conversation/send',{

					contact_id : this.contact.id,
					text : text	
				}).then((response)=> {
					this.$emit('new',response.data);
				})
			}
		},
		components : { MessagesFeed , MessaageComposer	}


    
}
</script>


<style lang="scss" scoped>
.conversation {
    flex:5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    h1{
    	font-size: 22px;
	    padding: 10px;
	    margin: 0px;
	    border-bottom: 1px solid #ddd;
    }
} 
</style>       