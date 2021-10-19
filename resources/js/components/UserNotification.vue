<template>
  <li class="nav-item dropdown">
    <a
      class="nav-link dropdown-toggle mb-2 mb-md-0"
      href="#"
      data-toggle="dropdown"
      role="button"
    >
      <i class="fas fa-bell fa-lg bell" /> 
      <span
        v-if="notifications.length"
        class="badge badge-info noti-badge"
      >{{ notifications.length }}</span>
    </a>
    <ul
      v-if="notifications.length"
      class="dropdown-menu dropdown-menu-right scrollable py-0"
    >
      <span 
        class="noti-header dropdown-item p-3"
      >Unread Notification {{ notifications.length }}</span>
      <li
        v-for="notification in notifications"
        :key="notification.id"
        class="dropdown-item p-3"
      >
        <a
          @click="markAsRead(notification)"
          class="text-dark"
          :href="notification.data.link"
          v-text="notification.data.message"
        />
      </li>
    </ul>
    <ul
      v-else
      class="dropdown-menu dropdown-menu-right p-3"
    >
      <li class="dropdown-item">
        No unread notifications yet!
      </li>
    </ul>
  </li>
</template>

<script>
export default { 
    props: {
        user: {
            type: String,
            required: true
        }
    },
    data(){
        return {
            notifications: false
        }
    },
    created(){
        window.axios.get('/notifications')
            .then(
                response => {
                    this.notifications = response.data
                } 
            )
    },
    methods:{
        markAsRead(notification){
            window.axios.delete(`/${this.user}/notifications/` + notification.id)
        }
    }
}
</script>

<style lang="scss" scoped>
    .bell{
        position: relative;
    }

    .noti-badge{
        position: absolute;
        top: 4px;
        left: 17px;
        border-radius: 50%;
        border: 1px solid #fff;
    }

    .noti-header{
        background-color: #ff4f5a;
        font-weight: 600;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
        color: #fff;
        position: sticky;
        top: 0;
    }

    .scrollable {
        height: auto;
        max-height: 500px;
        overflow-x: hidden;
    }
</style>
