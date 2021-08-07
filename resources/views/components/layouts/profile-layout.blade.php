<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <img 
                    class="border-info-3 p-1 rounded-circle position-absolute profile mx-auto" 
                    src="{{ $user->avatar }}" alt="avatar"
                >
                <div class="card border-0 shadow-lg rounded-20 h-283-px p-4 position-relative mt-5">
                    <div class="d-flex justify-content-between mb-5">
                        <div class="d-flex text-black-50 font-weight-bold">
                            <div class="mx-3 text-center">
                                <div class="text-dark">{{$user->followers->count()}}</div>
                                <a 
                                    href="{{'/'.$user->name.'/follower'}}"
                                    class="{{$tab == 'follower' ? 'text-black' : 'text-black-50'}}"
                                >followers</a>
                            </div>
                            <div class="mx-3 text-center">
                                <div class="text-dark">{{$user->follows->count()}}</div>
                                <a 
                                    href="{{'/'.$user->name.'/following'}}"
                                    class="{{$tab == 'following' ? 'text-black' : 'text-black-50'}} font-weight-bold"
                                >following</a>
                            </div>
                            <div class="mx-3 text-center">
                                <div class="text-dark">{{$user->posts->count()}}</div>
                                posts
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            @can ('edit_user', $user)
                                <a href="{{ $user->path('edit')}}">
                                    <button type="submit" class="btn btn-sm btn-info py-0">
                                        Edit
                                    </button>
                                </a>
                            @else
                                <follow-button 
                                    :user="{{$user}}" class="pr-3"
                                ></follow-button>
                                {{-- <button class="btn btn-sm btn-outline-danger mx-3 py-0">
                                    Block
                                </button>  --}}
                                <a 
                                    href="/userReports/{{$user->id}}/create"
                                    class="text-danger"
                                >Report</a>
                            @endcan
                        </div>
                    </div>
                    <div class="text-center w-50 mx-auto mt-3">
                        <div>
                            <div class="font-weight-bold mr-3 d-inline-block text-dark">{{$user->name}}</div>
                        </div>
                        <p class="text-dark">{{$user->short_bio ?: ''}}</p>
                    </div>
                    <div class="mx-auto mt-auto mb-n3">
                        <div class="d-flex">
                            <div class="{{ $tab == 'posts' ? 'border-bottom-3' : ''}} px-2">
                                <a 
                                    href="{{$user->path()}}"
                                >Posts</a>
                            </div>
                            <div class="{{ $tab == 'likes' ? 'border-bottom-3' : ''}} mx-5 px-2">
                                <a 
                                    href="{{$user->path().'/likes'}}"
                                >Likes</a>
                            </div>
                            <div class="{{ $tab == 'comments' ? 'border-bottom-3' : ''}} px-2">
                                <a 
                                    href="{{$user->path().'/comments'}}"
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