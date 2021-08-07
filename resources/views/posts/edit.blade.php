<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card w-100 p-4">
                    <edit-blog :post-id={{ $post->id }}></edit-blog>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>