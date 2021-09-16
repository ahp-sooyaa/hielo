<template>
  <ais-instant-search
    :search-client="searchClient"
    index-name="posts"
  >
    <header class="row justify-content-center">
      <div class="col-md-10">
        <ais-search-box 
          class="mb-3" placeholder="Search posts, tags & people" :autofocus='true'
          :show-loading-indicator='true'
        ></ais-search-box>
      </div>
    </header>

    <div class="row justify-content-center">
      <div class="col-md-10">
        <nav class="mb-3">
          <div class="nav" id="myTab" role="tablist">
            <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Posts</a>
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tags" role="tab" aria-controls="profile" aria-selected="false">Tags</a>
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#people" role="tab" aria-controls="contact" aria-selected="false">People</a>
            </div>
        </nav>
      </div>
    </div>
    
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
        <posts-search></posts-search>
      </div>
      <div class="tab-pane fade" id="tags" role="tabpanel" aria-labelledby="profile-tab">
        <tags-search></tags-search>
      </div>
      <div class="tab-pane fade" id="people" role="tabpanel" aria-labelledby="contact-tab">
        <people-search></people-search>
      </div>
    </div>
    
  </ais-instant-search>
</template>

<script>
import moment from 'moment'
import algoliasearch from 'algoliasearch/lite';
import { history as historyRouter } from 'instantsearch.js/es/lib/routers';
import { simple as simpleStateMapping } from 'instantsearch.js/es/lib/stateMappings';

export default {
  props: ['user'],
  data() {
    return {
      moment,
      searchClient: algoliasearch(
        "C7TZ1DW92C",
        "0152fce4df945b2d72cf8329c56e4e05"
      ),
      routing: {
        router: historyRouter(),
        stateMapping: simpleStateMapping(),
      },
    };
  }
};
</script>

<style lang="scss" scoped>
  .nav-pills a{
    color: black;
  }
  .nav-link{
    padding: 5px 10px 5px 10px !important;
  }
  .nav > .active{
    border-bottom: 3px solid #ff4f5a;
    background-color: #fff !important;
    border-radius: 0px;
    color: #ff4f5a;
  }
</style>