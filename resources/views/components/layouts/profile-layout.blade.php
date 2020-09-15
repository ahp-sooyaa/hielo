<!-- Well begun is half done. - Aristotle -->
<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <img 
                    class="rounded-circle position-absolute profile mx-auto shadow-lg" 
                    src="{{ $user->avatar }}" alt="avatar"
                >
                <div class="card rounded-20 h-283-px p-4 text-primary position-relative mt-5">
                    <div class="d-flex justify-content-between mb-5">
                        <div class="d-flex text-black-50 font-weight-bold">
                            <div class="mx-3 text-center">
                                <div class="text-dark">{{$user->followers->count()}}</div>
                                <a 
                                    href="{{'/'.$user->name.'/follower'}}"
                                    class="text-black-50"
                                >followers</a>
                            </div>
                            <div class="mx-3 text-center">
                                <div class="text-dark">{{$user->follows->count()}}</div>
                                <a 
                                    href="{{'/'.$user->name.'/following'}}"
                                    class="text-black-50 font-weight-bold"
                                >following</a>
                            </div>
                            <div class="mx-3 text-center">
                                <div class="text-dark">{{$user->posts->count()}}</div>
                                posts
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            @can ('edit', $user)
                            <a href="{{ $user->path('edit')}}">
                                <button type="submit" class="btn btn-sm btn-primary py-0">
                                    Edit Profile
                                </button>
                            </a>
                            @else
                                <x-follow-button :user="$user"></x-follow-button>
                                {{-- <i class="fas fa-chevron-down"></i> --}}
                                <button class="btn btn-sm btn-outline-danger mx-3 py-0">
                                    Block
                                </button> 
                                <span class="text-danger">
                                    Report
                                </span>
                            @endcan
                        </div>
                    </div>
                    <div class="text-center w-50 mx-auto mt-3">
                        <div>
                            <h1 class="font-weight-bold mr-3 d-inline-block">{{$user->name}}</h1>
                            <span class="text-danger">
                                <a href="/userReports/{{$user->id}}/create">report</a>
                            </span>
                        </div>
                        <p>{{$user->short_bio ?? ''}}</p>
                    </div>
                    <div class="mx-auto mt-auto mb-n3">
                        <div class="d-flex">
                            <div class="{{ request()->is($user->name) ? 'border-bottom-3' : ''}} px-2">
                                <a 
                                    href="{{'/'.$user->name}}" class="text-decoration-none"
                                >Posts</a>
                            </div>
                            <div class="{{ request()->segment(2) == 'likes' ? 'border-bottom-3' : ''}} mx-5 px-2">
                                <a 
                                    href="{{'/'.$user->name.'/likes'}}"
                                    class="text-decoration-none"
                                >Likes</a>
                            </div>
                            <div class="{{ request()->segment(2) == 'comments' ? 'border-bottom-3' : ''}} px-2">
                                <a 
                                    href="{{'/'.$user->name.'/comments'}}"
                                    class="text-decoration-none"
                                >Comments</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
{{-- in close tag it work without layouts --}}
</x-layouts.app>