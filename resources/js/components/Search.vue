<template>
  <ais-instant-search
    :search-client="searchClient"
    index-name="posts"
  >
    <header class="row justify-content-center">
      <div class="col-md-10">
        <ais-search-box 
          class="mb-3"
          placeholder="Search posts, tags & people"
          :autofocus="true"
          :show-loading-indicator="true"
        />
      </div>
    </header>

    <div class="row justify-content-center">
      <div class="col-md-10">
        <nav class="mb-3">
          <div
            id="myTab"
            class="nav"
            role="tablist"
          >
            <a
              id="posts-tab"
              class="nav-link active"
              data-toggle="tab"
              href="#posts"
              role="tab"
              aria-controls="posts"
              aria-selected="true"
            >Posts</a>
            <a
              id="profile-tab"
              class="nav-link"
              data-toggle="tab"
              href="#tags"
              role="tab"
              aria-controls="profile"
              aria-selected="false"
            >Tags</a>
            <a
              id="contact-tab"
              class="nav-link"
              data-toggle="tab"
              href="#people"
              role="tab"
              aria-controls="contact"
              aria-selected="false"
            >People</a>
          </div>
        </nav>
      </div>
    </div>
    
    <div
      id="myTabContent"
      class="tab-content"
    >
      <div
        id="posts"
        class="tab-pane fade show active"
        role="tabpanel"
        aria-labelledby="posts-tab"
      >
        <posts-search />
      </div>
      <div
        id="tags"
        class="tab-pane fade"
        role="tabpanel"
        aria-labelledby="profile-tab"
      >
        <tags-search />
      </div>
      <div
        id="people"
        class="tab-pane fade"
        role="tabpanel"
        aria-labelledby="contact-tab"
      >
        <people-search />
      </div>
    </div>
  </ais-instant-search>
</template>

<script>
import moment from 'moment'
import algoliasearch from 'algoliasearch/lite'
import { history as historyRouter } from 'instantsearch.js/es/lib/routers'
import { simple as simpleStateMapping } from 'instantsearch.js/es/lib/stateMappings'

export default {
    props: {
        user: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            moment,
            searchClient: algoliasearch(
                'C7TZ1DW92C',
                '0152fce4df945b2d72cf8329c56e4e05'
            ),
            routing: {
                router: historyRouter(),
                stateMapping: simpleStateMapping(),
            },
        }
    }
}
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