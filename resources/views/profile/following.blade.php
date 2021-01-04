<x-layouts.profile-layout :user="$user" tab="following">
    <div class="w-75 mx-auto mt-5">
        <div class="font-weight-bold mb-3">
            {{$user->name}} <span class="text-black-50">follows</span>
        </div>
        @forelse ($user->follows as $follow)
            @include('profile._followCard', ['user' => $follow])
        @empty 
            <div class="w-50 mx-auto text-center mt-5">
                <img src="{{asset('appImage/kingdom-premium-upgrade.png')}}" alt="">
                Until now <span class="text-info">{{$user->name}}</span> didn't follow anyone! Come Back later <i class="fas fa-smile-wink fa-lg text-info"></i>
            </div>
        @endforelse
    </div>
</x-layouts.profile-layout>