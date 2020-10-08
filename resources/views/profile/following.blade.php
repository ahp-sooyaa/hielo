<x-layouts.profile-layout :user="$user">
    <div class="w-75 mx-auto mt-5">
        <div class="font-weight-bold mb-3">
            {{$user->name}} <span class="text-black-50">follows</span>
        </div>
        @foreach ($user->follows as $follow)
            @include('profile._card', ['user' => $follow])
        @endforeach
    </div>
</x-layouts.profile-layout>