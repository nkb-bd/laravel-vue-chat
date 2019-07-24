<template>
    <div class="contacts-list">
        <ul>
            <li v-for="(contact , index) in contacts" :key="contact.id" @click="selectContact(contact)" :class="{ 'selected': contact.id == selected.id }">
                <div class="avatar">
                    <img :src="contact.profile_image" :alt="contact.name">
                </div>
                <div class="contact">
                    <div class="name">{{ index }} {{ contact.name }}</div>
                    <div class="email">{{ contact.email }}</div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contacts: {
                type: Array,
                default: []
            }
        },
        data() {
            return {
               
                selected: this.contacts.length ? this.contacts[0] : 0
            };
        },
        methods: {
            selectContact(contact) {
                this.selected = contact;
               
                // console.log(this.contact )
                this.$emit('selected', contact);
            }
        },
        mounted()  {
              selected: this.contacts.length ? this.contacts[0] : 0
        }
      
    };
</script>


<style lang="scss" scoped>
.contacts-list  {
    flex:2;
    max-height : 600px;
    overflow-y       : scroll;
    border-left: 1px solid lightblue;

    ul{
        list-style-type: none;
        padding-left: 0;

        li{
            display:flex;
            border:1px solid #ddd;
            height: 80px;
            postion: relative;

            .avatar{
                flex :1;
                padding: 10px;
                display : flex;
                align-items : center;

                img {
                    width : 55px;
                    border-radius : 50%;
                    margin : 0 auto;
                }       
                   
                   
                }

                &.selected{

                    background: aliceblue;
                }
        }
    }

    .contact{
        flex : 3;
        font-size : 10px;
        overflow: hidden;
        display  : flex;
        flex-direction : column;
        justify-content : center;
        padding-left: 10px;
        padding: 15px 5px;

        .name {
            font-weight: bold;
        }
    }
} 
</style>   