<template>
    <div class="mt-5">  
        <h4 class="mb-4">Leave a Comment</h4>  
        <textarea 
            class="form-control" rows="5" name="body" placeholder="Contribute in Discussion ..." v-model="body"
        ></textarea>
        <button 
            class="btn btn-info mt-2"
            @click="addComment"
        >
        Post Comment</button>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: {
            postId: {
                type: Number,
                required: true
            }
        },
        data(){
            return {
                isLoading: false,
                body: '',
                endpoint: `/posts/${this.postId}/comment`
            }
        },
        methods: {
            addComment(){
                this.isLoading = true
                axios
                    .post(this.endpoint, {body: this.body})
                    .then(response => {
                        window.events.$emit('created', response.data)
                        this.body = ''
                        this.isLoading = false
                        flash('Success! comment posted')
                    })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>