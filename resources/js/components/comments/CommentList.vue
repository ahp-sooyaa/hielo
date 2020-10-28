<template>
    <div>
        {{comments.length}} comments
        <div v-if="comments.length">
            <comment
                v-for="comment in comments"
                :comment="comment"
                :postAuthor="postAuthor"
                :key="comment.id"
                :authUser="authUser"
                @deleted="deleteComment"
            />
        </div>
        <div v-else class="text-center my-3">
            No comments Yet!
        </div>
        <comment-form
            :post-id="this.postId"
        ></comment-form>
    </div>
</template>

<script>
    import axios from 'axios'
    import Comment from './Comment'
    export default {
        components: {Comment},
        props: {
            user: {
                type: Object,
                required: true
            },
            postId: {
                type: Number,
                required: true
            },
            author: {
                type: Object,
                required: true
            }
        },
        data(){
            return{
                comments: [],
                postAuthor: this.author,
                authUser: this.user,
                endpoint: `/api/${this.postId}/comments/`,
            }
        },
        methods: {
            fetchComments(){
                axios
                    .get(this.endpoint)
                    .then((response) => {
                        this.comments = response.data.data;
                    })
            },
            addComment (comment) {
                this.comments.push(comment)
            },
            deleteComment (id) {
                this.comments.splice(this.comments.findIndex(comment => comment.id === id), 1)
                // Vue.delete(this.comments, id)
            }
        },
        mounted() {
            this.fetchComments()
            window.events.$on('created' , comment => this.addComment(comment) );
        }
    }
</script>

<style lang="scss" scoped>

</style>