<template>
  <div>
    <form @submit.prevent="Publish">
        <h1 class="text-dark">Create new Post</h1>
            <div class="form-group m-0">
                <input type="file" class="form-control border-0 p-0" @change="imageSelected" />
                <div v-if="previewImage">
                    <img :src="previewImage" style="height: 200px" class="rounded" />
                </div>
                <span 
                    class="text-danger" v-text="errors.get('featured_image')"
                ></span>
            </div>
            <div class="form-group text-dark">
                Schedule your publish time 
                <input 
                    type="datetime-local" step="1" class="form-control" v-model="published_at"
                >
                <span 
                    class="text-danger" v-text="errors.get('published_at')"
                ></span>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Title" class="form-control" v-model="title" />
                <span 
                    class="text-danger" v-text="errors.get('title')"
                ></span>
            </div>
            <div class="form-group">
                <input
                    type="text" placeholder="Write a excerpt for post ..."
                    class="form-control" v-model="excerpt"
                />
                <span 
                    class="text-danger" v-text="errors.get('excerpt')"
                ></span>
            </div>
            <div class="form-group">
                <vue-editor v-model="content"></vue-editor>
                <span 
                    class="text-danger" v-text="errors.get('content')"
                ></span>
            </div>
            <div class="form-group">
                <multiselect 
                    v-model="selectedTags" :options="tagOptions" :multiple="true" track-by="id"
                    label="name" placeholder="Search or add tags" @input="updateSelected"
                >
                </multiselect>
                <span 
                    class="text-danger" v-text="errors.get('tags')"
                ></span>
            </div>
        <button class="btn btn-sm btn-success mb-3">Publish</button>
    </form>
  </div>
</template>

<script>
import moment from 'moment';
import Errors from '../form'
import Multiselect from "vue-multiselect";
import { VueEditor } from "vue2-editor";
import axios from "axios";

export default {
    components: {
        VueEditor,
        Multiselect
    },
    data() {
        return {
            title: "",
            excerpt: "",
            content: "",
            featured_image: "",
            published_at: moment().format('yyyy-MM-DDThh:mm:ss'),
            previewImage: "",
            tags: null,
            selectedTags: [],
            tagOptions: [],
            errors: new Errors()
        };
    },
    methods: {
        imageSelected(e) {
            this.featured_image = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.featured_image);
            reader.onload = (e) => { this.previewImage = e.target.result };
        },
        Publish() {
            let fd = new FormData();
                fd.append("featured_image", this.featured_image);
                fd.append("title", this.title);
                fd.append("excerpt", this.excerpt);
                fd.append("content", this.content);
                fd.append("published_at", this.published_at);
                fd.append("tags", JSON.stringify(this.tags));

            axios.post(`/posts`, fd)
                .then(response => flash("post published") )
                .catch(err => this.errors.record(err.response.data.errors));
        },
        fetchTag() {
            axios.get(`/api/tags`)
                .then(res => this.tagOptions = res.data.data)
                .catch(err => this.errors.record(err.response.data));
        },
        updateSelected(selectedTags){
            let tags = [];

            selectedTags.forEach((tag) => {
                tags.push(tag.id);
            });

            this.tags = tags;
        }
    },
    created() {
        this.fetchTag();
    },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style lang="scss" scoped>
</style>