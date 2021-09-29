<template>
    <div class="bg-white shadow-sm mt-3 px-4 py-3 comment-container">
        <div class="d-flex align-items-top">
            <img :src="comment.author.avatar" alt="avatar" class="avatar mr-3">
            <div class="w-100">
                <div class="mb-2 d-flex">
                    <div class="mr-auto">
                        <a :href="'/profiles/'+comment.author.name" class="font-weight-bold" style="cursor: pointer">
                            {{comment.author.name}}
                        </a>
                        <div v-if="comment.author.name == $parent.name" class="d-inline">
                            .   
                            <span 
                                class="badge badge-secondary secondary-color mr-2"
                            >
                            author
                            </span>
                        </div>
                    </div>
                    <div class="text-dark-50">
                        {{moment(comment.created_at).format('MMM DD,Y HH:mma')}}
                    </div>
                </div>
                <div v-if="isEditing">
                    <textarea 
                        class="form-control mb-2" name="body" placeholder="Contribute in Discussion ..." v-model="body"
                    ></textarea>
                    <button class="btn btn-sm btn-secondary" @click="updateComment">Update</button>
                    <button class="btn btn-sm btn-link" @click="isEditing = false">Cancel</button>
                </div>
                <div v-else>
                    <div class="mb-2" v-text="body"></div>
                    <div v-if="comment.author.id == auth.id">
                        <button class="btn btn-sm btn-outline-secondary ml-auto" @click="isEditing = true">
                            Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger ml-2"
                        @click="removeComment">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import moment from 'moment'
    export default {
        props: {
            comment: {
                type: Object,
                required: true
            }
        },
        data(){
            return {
                moment: moment,
                body: this.comment.body,
                isEditing: false,
                canUpdate: this.comment.can_update,
                endPoint: `/comments/${this.comment.id}`,
                auth: window.App.user
            }
        },
        methods: {
            removeComment(){
                axios
                    .delete(this.endPoint)
                    .then(response => {
                        this.$emit('deleted', this.comment.id)
                    })
                    .catch(err => console.log(err))
            },
            updateComment(){
                axios
                    .patch(this.endPoint, {body: this.body})
                    .then(response => {
                        this.isEditing = false
                        flash('success! comment updated')
                    })
                    .catch(err => console.log(err))
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>