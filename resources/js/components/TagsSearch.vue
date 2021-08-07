<template>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <ais-index index-name="tags" class="mb-5">
          <!-- <h3>Tags</h3> -->
          <ais-state-results>
            <template slot-scope="{ query, hits }">
              <p v-if="!hits.length">Not found for: <q>{{ query }}</q> tag</p>
              <p v-else />
              <ais-hits>
                <div slot-scope="{ items }" class="d-flex flex-wrap">
                  <div v-for="item in items" :key="item.objectID">
                    <a :href="item.path" class="text-white text-decoration-none pr-3 d-block">
                      <div class="btn btn-sm btn-outline-info mb-2">
                        <ais-highlight :hit="item" attribute="name" />
                      </div>
                    </a>
                  </div>
                </div>
              </ais-hits>
            </template>
          </ais-state-results>
        </ais-index>
      </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>

</style>