<x-layouts.profile-layout :user="$user" tab="posts">
    <div>
        <div class="w-75 mx-auto mt-5">
            <div class="font-weight-bold mb-3">Latest Posts</div>
        </div>
        @forelse ($user->posts as $post)
            @include('profile._postCard', ['post' => $post])
        @empty
            <div class="w-50 mx-auto text-center mt-5">
                <img src="{{asset('appImage/kingdom-premium-upgrade.png')}}" alt="">
                <span class="text-info">{{$user->name}}</span> is lazy to publish blog post! <br> No posts to display. Come Back later <i class="fas fa-smile-wink fa-lg text-info"></i>
            </div>
        @endforelse
    </div>
</x-layouts.profile-layout>