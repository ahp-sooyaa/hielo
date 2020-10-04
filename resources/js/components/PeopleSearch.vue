<template>
    <div>
        <ais-index index-name="users" class="mb-5">
          <h3>People</h3>
          <ais-state-results>
            <template slot-scope="{ query, hits }">
              <p v-if="!hits.length">Not found for: <q>{{ query }}</q> people</p>
              <p v-else />
              <ais-infinite-hits>
                <div slot-scope="{ items, isLastPage, refineNext }" class="">
                  <div v-for="item in items" :key="item.objectID">
                    <div class="d-flex">
                      <img v-if="item.avatar" :src="item.avatar" alt="" class="avatar-1x">
                      <div>
                        <a :href="item.path" class="text-white text-decoration-none pr-3 d-block mb-3">
                          <ais-highlight :hit="item" attribute="name" />
                        </a>
                        <p class="text-white" v-if="item.short_bio">
                          {{item.short_bio}}
                        </p>
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
        </ais-index>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>

</style>