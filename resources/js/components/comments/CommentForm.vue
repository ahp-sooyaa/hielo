<template>
    <div class="mt-5">  
        <div v-if="isLoggedIn">
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
        <div v-else class="bg-info py-3 rounded-10 text-center text-white">
            Please sign in to comment
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data(){
            return {
                isLoading: false,
                isLoggedIn: window.App.signIn,
                body: '',
                endpoint: `${location.pathname}/comment`
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
                    .catch(err => {
                        flash(err.response.data.errors.body[0])
                    })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>