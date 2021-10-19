<template>
  <div>
    <form @submit.prevent="Update">
      <h1 class="text-dark">
        Edit Post
      </h1>
      <div class="form-group">
        <input
          @change="imageSelected"
          type="file"
          class="border-0 mb-3"
        >
        <div v-if="post.previewImage">
          <img
            :src="post.previewImage"
            style="height: 200px"
            class="rounded"
          >
        </div>
        <span
          class="text-danger"
          v-text="errors.get('featured_image')"
        />
      </div>
      <div class="form-group text-dark">
        Schedule your publish time
        <input
          v-model="post.published_at"
          type="datetime-local"
          step="1"
          class="form-control"
        >
        <span
          class="text-danger"
          v-text="errors.get('published_at')"
        />
      </div>
      <div class="form-group">
        <input
          v-model="post.title"
          type="text"
          placeholder="Title"
          class="form-control"
        >
        <span
          class="text-danger"
          v-text="errors.get('title')"
        />
      </div>
      <div class="form-group">
        <input
          v-model="post.excerpt"
          type="text"
          placeholder="Write a excerpt for post ..."
          class="form-control"
        >
        <span
          class="text-danger"
          v-text="errors.get('excerpt')"
        />
      </div>
      <div class="form-group">
        <vue-editor v-model="post.content" />
        <span
          class="text-danger"
          v-text="errors.get('content')"
        />
      </div>
      <div class="form-group">
        <multiselect
          v-model="post.selectedTags"
          :options="tagOptions"
          :multiple="true"
          track-by="id"
          label="name"
          placeholder="Search or add tags"
        />
        <span
          class="text-danger"
          v-text="errors.get('tags')"
        />
      </div>
      <button class="btn btn-sm btn-success mb-3">
        Update
      </button>
    </form>
  </div>
</template>

<script>
import Errors from '../form'
import Multiselect from 'vue-multiselect'
import { VueEditor } from 'vue2-editor'

export default {
    components: {
        VueEditor,
        Multiselect,
    },

    props: {
        postId: {
            type: Number,
            required: true
        }
    },

    data() {
        return {
            featured_image: '',
            tagOptions: [],
            post: {},
            errors: new Errors()
        }
    },

    created() {
        this.fetchPost()
        this.fetchTags()
    },

    methods: {
        imageSelected(e) {
            this.featured_image = e.target.files[0]
            let reader = new FileReader()
            reader.readAsDataURL(this.featured_image)
            reader.onload = (e) => {
                this.post.previewImage = e.target.result
            }
        },
        Update() {
            let fd = new FormData()
            fd.append('_method', 'PATCH')
            if (this.featured_image) {
                fd.append('featured_image', this.featured_image)
            }
            fd.append('title', this.post.title)
            fd.append('excerpt', this.post.excerpt)
            fd.append('content', this.post.content)
            fd.append('published_at', this.post.published_at)
            fd.append('tags', JSON.stringify(this.post.selectedTags))

            window.axios
                .post(`/posts/${this.postId}`, fd)
                .then((res) => {
                    window.location.href = `/posts/${res.data.postId}`
                })
                .catch((err) => this.errors.record(err.response.data.errors))
        },
        fetchPost() {
            window.axios
                .get(`/api/posts/${this.postId}`)
                .then((res) => (this.post = res.data.post))
        },
        fetchTags() {
            window.axios
                .get('/api/tags')
                .then((res) => (this.tagOptions = res.data.data))
        },
    },
}
</script>

<style lang="scss" scoped>
</style>