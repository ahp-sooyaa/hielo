<template>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <ais-panel>
            <h5 slot="header" class="text-white">Blog Posts</h5>
            <ais-refinement-list class="text-white" attribute="author.name" />
            </ais-panel>
        </div>
        <div class="col-md-7">
            <!-- <ais-index index-name='posts'> -->
            <h3>Posts</h3>
            <ais-state-results>
                <template slot-scope="{ query, hits }">
                <p v-if="!hits.length">Not found for: <q>{{ query }}</q> post</p>
                <p v-else />
                <ais-infinite-hits>
                    <div slot-scope="{ items, isLastPage, refineNext }">
                    <div v-for="item in items" :key="item.objectID" class="px-3">
                        <ais-menu attribute="name" />
                        <div class="card rounded-20 p-4 mb-4 shadow-sm border-0">
                            <div class="m-n4">
                                <img :src="item.featured_image" alt="Featured Image" class="rounded-top-20 h-200-px w-100">
                            </div>
                            <div class="d-flex mt-5">
                                <h4 class="mr-auto">
                                    <a :href="item.path" class="text-dark text-decoration-none">
                                        <ais-highlight :hit="item" attribute="title" />
                                    </a>
                                </h4>
                            </div>
                            <div class="text-dark mb-auto">                    
                                <ais-highlight :hit="item" attribute="excerpt" />
                            </div>
                            <div class="d-flex text-dark align-items-center mt-3">
                                <i class="fas fa-user-circle fa-2x mr-2"></i>
                                <div class="mr-auto">{{ item.author.name}}</div>
                                {{ moment(item.published_at).format("LL") }}
                            </div>
                        </div>
                    </div>  
                    <button
                        :disabled="isLastPage"
                        @click="refineNext"
                    >
                        Show more results 
                    </button>
                    </div>
                </ais-infinite-hits>
                </template>
            </ais-state-results>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'
    export default {    
        data(){
            return {
                moment
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>