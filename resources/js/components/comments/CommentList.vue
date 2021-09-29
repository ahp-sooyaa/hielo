<template>
    <div>
        {{comments.length | pluralize}}
        <div v-if="comments.length">
            <div v-for="(comment, index) in comments" :key="comment.id">
                <comment
                    :comment="comment"
                    @deleted="deleteComment(index)"
                />
            </div>
        </div>
        <div v-else class="text-center my-3">
            No comments Yet!
        </div>
        <comment-form></comment-form>
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
            author: {
                type: Object,
                required: true
            }
        },

        data(){
            return{
                comments: [],
                endpoint: `${location.pathname}/comments`,
            }
        },

        filters: {
            pluralize(length){
                return length > 1 ? length + " comments" : length + " comment"
            }
        },

        methods: {
            fetchComments(){
                axios
                    .get(this.endpoint)
                    .then((response) => {
                        this.comments = response.data;
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