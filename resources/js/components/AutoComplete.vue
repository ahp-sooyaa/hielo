<template>
    <div>
        <li class="nav-item dropdown">
            <form method="GET" action="/search">
                <div class="d-flex search-box rounded-20">
                    <input type="text" placeholder="Search something..." name="posts[query]" class="mr-2 search-text" autocomplete="off">
                    <a href="#" class="search-btn">
                        <i class="fas fa-search text-dark"></i>
                    </a>
                </div>
            </form>
        </li>
    </div>
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