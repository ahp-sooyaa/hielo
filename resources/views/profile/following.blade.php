<x-layouts.profile-layout :user="$user">
    <div class="w-75 mx-auto mt-5">
        <h4 class="text-white-50">
            {{$user->name}} follows
        </h4>
        @foreach ($user->follows as $follow)
            @include('layouts.._card', ['user' => $follow])
        @endforeach
    </div>
</x-layouts.profile-layout>