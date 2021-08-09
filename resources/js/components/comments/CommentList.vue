<template>
    <div>
        <!-- {{comments.length}} comments -->
        {{comments.length | pluralize}}
        <div v-if="comments.length">
            <div v-for="(comment, index) in comments">
                <comment
                    :comment="comment"
                    :postAuthor="postAuthor"
                    :authUser="authUser"
                    @deleted="deleteComment(index)"
                />
            </div>
        </div>
        <div v-else class="text-center my-3">
            No comments Yet!
        </div>
        <comment-form
            :post-id="this.postId"
            :logged-in="this.authUser ? true : false"
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
        filters: {
            pluralize(length){
                return length > 1 ? length + " comments" : length + " comment"
            }
        },
        // computed: {
        //     pluralize(){
        //         if(this.comments)
        //         {
        //             return this.comments.length > 1 ? this.comments.length+" comments" : this.comments.length+" comment"
        //         }
        //     }
        // },

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
            deleteComment (index) {
                this.comments.splice(index, 1)
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