<template>
  <div class="row">
    <div class="col-md-8 offset-md-1">
      <ais-index index-name="users" class="mb-5">
        <!-- <h3>People</h3> -->
        <ais-state-results>
          <template slot-scope="{ query, hits }">
            <p v-if="!hits.length">
              Not found for: <q>{{ query }}</q> people
            </p>
            <p v-else />
            <ais-infinite-hits>
              <div slot-scope="{ items, isLastPage, refineNext }" class="">
                <div v-for="item in items" :key="item.objectID">
                  <div
                    class="card rounded-20 border-0 border-bottom-3 shadow px-3 py-4 mb-5"
                  >
                    <div class="d-flex">
                      <div class="d-flex mr-auto">
                        <img
                          v-if="item.avatar"
                          :src="item.avatar"
                          alt=""
                          class="avatar-1x mr-3"
                        />
                        <div>
                          <a
                            :href="item.path"
                            class="text-dark font-weight-bold pr-3 d-block mb-3"
                          >
                            <ais-highlight :hit="item" attribute="name" />
                          </a>
                          <p class="text-dark" v-if="item.short_bio">
                            {{ item.short_bio }}
                          </p>
                        </div>
                      </div>
                      <div>
                        <follow-button
                          :user="item"
                        ></follow-button>
                      </div>
                    </div>
                  </div>
                </div>
                <button :disabled="isLastPage" @click="refineNext">
                  Show more results
                </button>
              </div>
            </ais-infinite-hits>
          </template>
        </ais-state-results>
      </ais-index>
    </div>
  </div>
</template>

<script>

</script>

<style lang="scss" scoped>
</style>