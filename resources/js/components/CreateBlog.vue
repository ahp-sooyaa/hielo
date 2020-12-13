<template>
  <div>
    <form @submit.prevent="Publish">
      <div class="form-group">
        <input
          type="file"
          class="form-control border-0 p-0"
          @change="imageSelected"
        />
        <div v-if="previewImage">
          <img :src="previewImage" style="height: 200px" class="rounded" />
        </div>
        <span class="text-danger" v-text="errors.get('featured_image')"></span>
      </div>
      <div class="form-group">
        <input
          type="text"
          placeholder="Title"
          class="form-control"
          v-model="title"
        />
        <span class="text-danger" v-text="errors.get('title')"></span>
      </div>
      <div class="form-group">
        <input
          type="text"
          placeholder="Write a excerpt for post ..."
          class="form-control"
          v-model="excerpt"
        />
        <span class="text-danger" v-text="errors.get('excerpt')"></span>
      </div>
      <div class="form-group">
        <vue-editor v-model="content"/>
        <span class="text-danger" v-text="errors.get('content')"></span>
      </div>
      <div class="form-group">
        <multiselect
          v-model="selectedTags" :options="tagOptions"
          :multiple="true" track-by="id"
          label="name" placeholder="Search or add tags"
        >
        </multiselect>
        <span class="text-danger" v-text="errors.get('tags')"></span>
      </div>
      <div v-if="isSchedule" class="form-group text-dark mb-3">
        <label for="published_at">Schedule your publish time (* if you blank this field, post will publish with current time)</label>
        <!-- <input
          type="text" step="1" class="form-control"
          v-model="published_at" placeholder="dd/mm/yyyy, H:i:s"
          onfocus="(this.type='datetime-local')"
        /> -->
        <input
          type="datetime-local" step="1" class="form-control"
          v-model="published_at"
        />
        <span class="text-danger" v-text="errors.get('published_at')"></span>
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
        <a class="btn btn-sm btn-link pl-0" v-if="isSchedule" @click="isSchedule = false">
          Cancel scheduling
        </a>
        <a v-else class="btn btn-sm btn-link pl-0" @click="isSchedule = true">
          Schedule for later
        </a>
      </div>
    </form>
  </div>
</template>

<script>
// import Quill from 'quill'
import Errors from "../form";
import Multiselect from "vue-multiselect";
import { VueEditor } from "vue2-editor";
import axios from "axios";

export default {
  components: {
    VueEditor,
    Multiselect,
  },
  // props: ["current"],
  data() {
    return {
      title: "",
      excerpt: "",
      content: "",
      featured_image: "",
      published_at: "",
      previewImage: "",
      selectedTags: [],
      tagOptions: [],
      errors: new Errors(),
      isSchedule: false,
    };
  },
  methods: {
    imageSelected(e) {
      this.featured_image = e.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(this.featured_image);
      reader.onload = (e) => {
        this.previewImage = e.target.result;
      };
    },
    Publish() {
      let fd = new FormData();
      fd.append("featured_image", this.featured_image);
      fd.append("title", this.title);
      fd.append("excerpt", this.excerpt);
      fd.append("content", this.content);
      fd.append("published_at", this.published_at);
      fd.append("tags", JSON.stringify(this.selectedTags));

      axios
        .post(`/posts`, fd)
        .then((response) => {
          window.location.href = `https://hielo.test/posts/${response.data.postId}`;
        })
        .catch((err) => this.errors.record(err.response.data.errors));
    },
    fetchTag() {
      axios
        .get(`/api/tags`)
        .then((res) => (this.tagOptions = res.data.data))
        .catch((err) => this.errors.record(err.response.data));
    },
  },
  created() {
    this.fetchTag();
  },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style lang="scss" scoped>
</style>