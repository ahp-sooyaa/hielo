<template>
    <div>
        <li class="nav-item dropdown" v-if="notifications.length">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button">
                <i class="fas fa-bell"></i> Notification
            </a>
            <ul class="dropdown-menu">
                <li v-for="notification in notifications" class="dropdown-item">
                    <a :href="notification.data.link" v-text="notification.data.message" @click="markAsRead(notification)"></a>
                </li>
            </ul>
        </li>
    </div>
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
