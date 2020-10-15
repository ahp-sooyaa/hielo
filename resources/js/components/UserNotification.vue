<template>
    <li class="nav-item dropdown ml-3" v-if="notifications.length">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button">
            <i class="fas fa-bell fa-lg"></i> <span class="badge badge-info">{{notifications.length}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li v-for="notification in notifications" class="dropdown-item">
                <a class="text-dark" :href="notification.data.link" v-text="notification.data.message" @click="markAsRead(notification)"></a>
            </li>
        </ul>
    </li>
</template>

<script>
    import axios from 'axios'
    export default { 
        props: {
            user: Number
        },
        data(){
            return {
                notifications: false
            }
        },
        created(){
            axios.get(`/${this.user}/notifications`)
            .then(
                response => this.notifications = response.data
            )
        },
        methods:{
            markAsRead(notification){
                axios.delete(`/${this.user}/notifications/` + notification.id)
            }
        }
    }
</script>
