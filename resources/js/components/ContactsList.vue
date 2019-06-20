<template>
    <div class="contacts-list">
        <ul class="list-unstyled">
            <li v-for="contact in contacts" :key="contact.id">

                <div class="avatar">
                    <img :src="contact.profile_image" :alt="contact.name">
                </div>
                <div class="contact">
                    <div class="name"><p>{{contact.name}}</p></div>
                    <div class="email"><p>{{contact.email}}</p></div>
                </div>

            </li>
        </ul>  

    </div>
</template>

<script>
export default {
    props:{
        contacts:{
            type: Array,
            default:[]
        }
    }
}
</script>