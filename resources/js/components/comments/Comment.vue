<template>
  <div class="bg-white shadow-sm mt-3 px-4 py-3 comment-container">
    <div class="d-flex align-items-top">
      <img
        :src="comment.author.avatar"
        alt="avatar"
        class="avatar mr-3"
      >
      <div class="w-100">
        <div class="mb-2 d-flex">
          <div class="mr-auto">
            <a
              :href="'/profiles/'+comment.author.name"
              class="font-weight-bold"
              style="cursor: pointer"
            >
              {{ comment.author.name }}
            </a>
            <div
              v-if="comment.author.name == $parent.name"
              class="d-inline"
            >
              .   
              <span 
                class="badge badge-secondary secondary-color mr-2"
              >
                author
              </span>
            </div>
          </div>
          <div class="text-dark-50">
            {{ moment(comment.created_at).format('MMM DD,Y HH:mma') }}
          </div>
        </div>
        <div v-if="isEditing">
          <textarea 
            v-model="body"
            class="form-control mb-2"
            name="body"
            placeholder="Contribute in Discussion ..."
          />
          <button
            @click="updateComment"
            class="btn btn-sm btn-secondary"
          >
            Update
          </button>
          <button
            @click="isEditing = false"
            class="btn btn-sm btn-link"
          >
            Cancel
          </button>
        </div>
        <div v-else>
          <div
            class="mb-2"
            v-text="body"
          />
          <div v-if="comment.author.id == auth.id">
            <button
              @click="isEditing = true"
              class="btn btn-sm btn-outline-secondary ml-auto"
            >
              Edit
            </button>
            <button
              @click="removeComment"
              class="btn btn-sm btn-outline-danger ml-2"
            >
              Delete
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
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
            window.axios
                .delete(this.endPoint)
                .then(() => {
                    this.$emit('deleted', this.comment.id)
                })
                .catch(err => console.log(err))
        },
        updateComment(){
            window.axios
                .patch(this.endPoint, {body: this.body})
                .then(() => {
                    this.isEditing = false
                    window.flash('success! comment updated')
                })
                .catch(err => console.log(err))
        },
    }
}
</script>

<style lang="scss" scoped>

</style>