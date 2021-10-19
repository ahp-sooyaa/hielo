<template>
  <i 
    @click="toggleBookmark"
    class="fa-bookmark fa-lg"
    :class="isBookmarked ? 'fas' : 'far'"
    :style="isLoggedIn ? { cursor: 'pointer' } : ''"
  />
</template>

<script>
export default {
    props: {
        bookmarked: {
            type: Boolean,
            required: true,
        },
        postId: {
            type: Number,
            required: true,
        },
        loggedIn:{
            type: Boolean,
            required: true,
        }
    },
    data(){
        return {
            isBookmarked: this.bookmarked,
            isLoggedIn: this.loggedIn,
            endpoint: `/readingList/${this.postId}`
        }
    },
    methods: {
        toggleBookmark(){
            if (this.isLoggedIn) {
                window.axios
                    .post(this.endpoint)
                    .then(() => {
                        this.isLoading = false

                        this.isBookmarked = !this.isBookmarked
                    })
                    .catch(() => {
                        this.isLoading = false
                    })
            } else {
                window.flash('Please sign in to bookmark!')
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>