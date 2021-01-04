<x-layouts.profile-layout :user="$user" tab="comments">
    <div>
        <div class="w-75 mx-auto mt-5">
            <div class="font-weight-bold mb-3">
                {{$user->name}} <span class="text-muted">commented</span> 
            </div>
        </div>
        @forelse ($user->comments as $comment)
            @include('profile._commentCard', ['comment' => $comment])
        @empty
            <div class="w-50 mx-auto text-center mt-5">
                <img src="{{asset('appImage/kingdom-premium-upgrade.png')}}" alt="">
                <span class="text-info">{{$user->name}}</span> is lazy to left comment!.<br> NO Comments to display. Come Back later <i class="fas fa-smile-wink fa-lg text-info"></i>
            </div>
        @endforelse
    </div>
</x-layouts.profile-layout>