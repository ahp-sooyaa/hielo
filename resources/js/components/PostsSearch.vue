<template>
  <div class="row justify-content-center">
    <div class="col-md-3">
      <ais-panel>
        <h5 class="font-weight-bold">
          <i class="fas fa-signature" /> Author Name
        </h5>
        <ais-refinement-list 
          attribute="author.name" 
          :limit="5"
          show-more
          :sort-by="['name:asc']"
        />
      </ais-panel>
    </div>
    <div class="col-md-7">
      <ais-hits-per-page
        class="mx-3"
        :items="[
          {
            label: '16 hits per page',
            value: 16,
            default: getSelectedHitsPerPageValue() === 16 || !getSelectedHitsPerPageValue(),
          },
          {
            label: '32 hits per page',
            value: 32,
            default: getSelectedHitsPerPageValue() === 32,
          },
          {
            label: '64 hits per page',
            value: 64,
            default: getSelectedHitsPerPageValue() === 64,
          },
        ]"
      />
      <ais-state-results>
        <template slot-scope="{ query, hits }">
          <p v-if="!hits.length">
            Not found for: <q>{{ query }}</q> post
          </p>
          <p v-else />
          <ais-infinite-hits>
            <div slot-scope="{ items, isLastPage, refineNext }">
              <div
                v-for="item in items"
                :key="item.objectID"
                class="px-3"
              >
                <ais-menu attribute="name" />
                <div 
                  class="card border-0 border-bottom-3 rounded-20 p-4 mb-4 shadow"
                >
                  <div class="m-n4">
                    <img
                      :src="item.featured_image"
                      alt="Featured Image"
                      class="rounded-top-20 h-200-px w-100"
                    >
                  </div>
                  <div class="d-flex mt-5">
                    <h4 class="mr-auto">
                      <a
                        :href="item.path"
                        class="text-dark text-decoration-none"
                      >
                        <ais-highlight
                          :hit="item"
                          attribute="title"
                        />
                      </a>
                    </h4>
                  </div>
                  <div class="text-dark mb-auto">                    
                    <ais-highlight
                      :hit="item"
                      attribute="excerpt"
                    />
                  </div>
                  <div class="d-flex text-dark align-items-center mt-3">
                    <img
                      :src="item.author.avatar"
                      alt="avatar"
                      class="avatar mr-3"
                    >
                    <div class="mr-auto">
                      {{ item.author.name }}
                    </div>
                    {{ moment(item.published_at).format("MMM D,Y") }}
                  </div>
                </div>
              </div>  
              <button
                @click="refineNext"
                :disabled="isLastPage"
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
    },
    methods: {
        getSelectedHitsPerPageValue() {
            const [, hitsPerPage] = document.location.search.match(/hitsPerPage=([0-9]+)/) || []
            return Number(hitsPerPage)
        },
    }
}
</script>

<style lang="scss" scoped>

</style>