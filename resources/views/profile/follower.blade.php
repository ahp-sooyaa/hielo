<x-layouts.profile-layout :user="$user">
    <div class="w-75 mxlayouts.-auto mt-5">
        <h4 class="text-white-50">
            {{$user->name}} is followed by
        </h4>
        @foreach ($user->followers as $follower)
            @include('profile._card', ['user' => $follower])
        @endforeach
    </div>
</x-layouts.profile-layout>