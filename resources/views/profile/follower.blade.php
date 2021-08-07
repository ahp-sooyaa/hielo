<x-layouts.profile-layout :user="$user" tab="follower">
    <div class="w-75 mx-auto mt-5">
        <div class="font-weight-bold mb-3">
            {{$user->name}} <span class="text-black-50">is followed by</span>
        </div>
        @forelse ($user->followers as $follower)
            @include('profile._followCard', ['user' => $follower])
        @empty 
            <div class="w-50 mx-auto text-center mt-5">
                <img src="{{asset('appImage/kingdom-premium-upgrade.png')}}" alt="">
                No Followes yet! Come Back later <i class="fas fa-smile-wink fa-lg text-info"></i>
            </div>
        @endforelse
    </div>
</x-layouts.profile-layout>