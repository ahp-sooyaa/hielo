<x-layouts.profile-layout :user="$user">
    <div>
        <div class="w-75 mx-auto mt-5">
            <div class="font-weight-bold mb-3">
                {{$user->name}} <span class="text-muted">liked</span> 
            </div>
        </div>
        @forelse ($user->likes as $post)
            @if ($post->published_at != NULL)
                @include('profile._postCard', ['post' => $post])
            @endif
        @empty
            <div class="w-50 mx-auto text-center mt-5">
                <img src="https://hielo.dev/appImage/kingdom-premium-upgrade.png" alt="">
                Until now <span class="text-info">{{$user->name}}</span> didn't give like to blog post! Come Back later <i class="fas fa-smile-wink fa-lg text-info"></i>
            </div>
        @endforelse
    </div>
</x-layouts.profile-layout>