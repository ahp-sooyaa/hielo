<template>
  <ais-instant-search
    :search-client="searchClient"
    index-name="posts"
  >
    <header class="row justify-content-center">
      <div class="col-md-10">
        <ais-search-box 
          class="mb-3" placeholder="Search posts..." :autofocus='true'
          :show-loading-indicator='true'
        ></ais-search-box>
      </div>
      <div class="container-header container-options">
        <ais-hits-per-page
          class="container-option"
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
      </div>
    </header>

    <div class="container-menu">
      <router-link to="/search">BlogPosts</router-link>
      <router-link to="/search/tags">Tags</router-link>
      <router-link to="/search/people">People</router-link>
    </div>

    <router-view></router-view>
    
  </ais-instant-search>
</template>

<script>
import moment from 'moment'
import algoliasearch from 'algoliasearch/lite';
import { history as historyRouter } from 'instantsearch.js/es/lib/routers';
import { simple as simpleStateMapping } from 'instantsearch.js/es/lib/stateMappings';

export default {
  data() {
    return {
      moment,
      searchClient: algoliasearch(
        process.env.MIX_ALGOLIA_APP_ID,
        process.env.MIX_ALGOLIA_SEARCH
      ),
      routing: {
        router: historyRouter(),
        stateMapping: simpleStateMapping(),
      },
    };
  },
  methods: {
    getSelectedHitsPerPageValue() {
      const [, hitsPerPage] = document.location.search.match(/hitsPerPage=([0-9]+)/) || [];
      return Number(hitsPerPage);
    },
    makeActive: function(item){
        this.active = item;
    }
  }
};
</script>

<style lang="scss" scoped>
  .container-menu > a {
    text-decoration: none;
    color: white;
    margin-right: 5px;
  }
  .router-link-active{
    border-bottom: 2px solid black;
  }
</style>