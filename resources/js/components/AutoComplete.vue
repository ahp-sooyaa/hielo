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
    </ais-instant-search>
</template>

<script>
    import algoliasearch from 'algoliasearch/lite';
    export default {
        data() {
            return {
                searchClient: algoliasearch(
                    process.env.MIX_ALGOLIA_APP_ID,
                    process.env.MIX_ALGOLIA_SEARCH
                ),
            };
        }
    }
</script>

<style lang="scss" scoped>

</style>