<template>
  <div>
    <form @submit.prevent="Publish">
      <div class="form-group">
        <input
          @change="imageSelected"
          type="file"
          class="form-control border-0 p-0"
        >
        <div v-if="previewImage">
          <img
            :src="previewImage"
            style="height: 200px"
            class="rounded"
          >
        </div>
        <span
          class="text-danger"
          v-text="errors.get('featured_image')"
        />
      </div>
      <div class="form-group">
        <input
          v-model="title"
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
          v-model="excerpt"
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
        <vue-editor v-model="content" />
        <span
          class="text-danger"
          v-text="errors.get('content')"
        />
      </div>
      <div class="form-group">
        <multiselect
          v-model="selectedTags"
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
      <div
        v-if="isSchedule"
        class="form-group text-dark mb-3"
      >
        <label for="published_at">Schedule your publish time (* if you blank this field, post will publish with current time)</label>
        <!-- <input
          type="text" step="1" class="form-control"
          v-model="published_at" placeholder="dd/mm/yyyy, H:i:s"
          onfocus="(this.type='datetime-local')"
        /> -->
        <input
          v-model="published_at"
          type="datetime-local"
          step="1"
          class="form-control"
        >
        <span
          class="text-danger"
          v-text="errors.get('published_at')"
        />
      </div>
      <div class="mt-3">
        <button class="btn btn-sm btn-success">
          Publish
        </button>
        <!-- for next improvement :)
          <button name="draft" type="submit" class="btn btn-sm btn-outline-success">
          Save as draft
        </button> -->
        -Or-
        <a
          v-if="isSchedule"
          @click="isSchedule = false"
          class="btn btn-sm btn-link pl-0"
        >
          Cancel scheduling
        </a>
        <a
          v-else
          @click="isSchedule = true"
          class="btn btn-sm btn-link pl-0"
        >
          Schedule for later
        </a>
      </div>
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
    data() {
        return {
            title: '',
            excerpt: '',
            content: '',
            featured_image: '',
            published_at: '',
            previewImage: '',
            selectedTags: [],
            tagOptions: [],
            errors: new Errors(),
            isSchedule: false,
        }
    },
    created() {
        this.fetchTag()
    },
    methods: {
        imageSelected(e) {
            this.featured_image = e.target.files[0]
            let reader = new FileReader()
            reader.readAsDataURL(this.featured_image)
            reader.onload = (e) => {
                this.previewImage = e.target.result
            }
        },
        Publish() {
            let fd = new FormData()
            fd.append('featured_image', this.featured_image)
            fd.append('title', this.title)
            fd.append('excerpt', this.excerpt)
            fd.append('content', this.content)
            fd.append('published_at', this.published_at)
            fd.append('tags', JSON.stringify(this.selectedTags))

            window.axios
                .post('/posts', fd)
                .then((response) => {
                    window.location.href = `/posts/${response.data.postId}`
                })
                .catch((err) => this.errors.record(err.response.data.errors))
        },
        fetchTag() {
            window.axios
                .get('/api/tags')
                .then((res) => (this.tagOptions = res.data.data))
                .catch((err) => this.errors.record(err.response.data))
        },
    },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
