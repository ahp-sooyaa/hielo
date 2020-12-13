<template>
    <i 
        class="fa-bookmark fa-lg"
        :class="isBookmarked ? 'fas' : 'far'"
        :style="isLoggedIn ? { cursor: 'pointer' } : ''"
        @click="toggleBookmark"
    ></i>
</template>

<script>
    import axios from 'axios'
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
            LoggedIn:{
                type: Boolean,
                required: true,
            }
        },
        data(){
            return {
                isBookmarked: this.bookmarked,
                isLoggedIn: this.LoggedIn,
                endpoint: `/readingList/${this.postId}`
            }
        },
        methods: {
            toggleBookmark(){
                axios
                    .post(this.endpoint)
                    .then((response) => {
                        this.isLoading = false;

                        this.isBookmarked = !this.isBookmarked;
                    })
                    .catch(() => {
                        this.isLoading = false;
                    });
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>