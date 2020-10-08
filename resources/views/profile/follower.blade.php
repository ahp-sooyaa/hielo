<x-layouts.profile-layout :user="$user">
    <div class="w-75 mx-auto mt-5">
        <div class="font-weight-bold mb-3">
            {{$user->name}} <span class="text-black-50">is followed by</span>
        </div>
        @foreach ($user->followers as $follower)
            @include('profile._card', ['user' => $follower])
        @endforeach
    </div>
</x-layouts.profile-layout>