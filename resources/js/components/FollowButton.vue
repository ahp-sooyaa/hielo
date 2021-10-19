<template>
  <div>
    <button
      @click="follow"
      class="btn btn-sm py-0"
      :class="isFollowing ? 'btn-info' : 'btn-outline-info'"
      v-text="isFollowing ? 'unfollow' : 'follow'"
    />
  </div>
</template>

<script>
export default {
    props: {
        user: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            isFollowing: null,
        }
    },
    created(){
        this.fetchFollows()
    },
    methods: {
        follow() {
            window.axios
                .post(`/${this.user.name}/follow`)
                .then(() => {
                    this.isFollowing = !this.isFollowing
                })
                .catch((err) => console.log(err.response.data))
        },
        fetchFollows() {
            window.axios
                .get(`/${this.userName}/follow`)
                .then((response) => {
                    this.isFollowing = response.data.follows.includes(this.user.id)
                })
                .catch(error => console.log(error.response.data))
        }
    }
}
</script>

<style lang="stylus" scoped></style>