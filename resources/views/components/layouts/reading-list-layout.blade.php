<x-layouts.app>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="mb-4">
                <h3 class="mr-auto font-weight-bold mb-3 text-white">
                    Reading List 
                </h3>
                <div class="py-3 px-4 border rounded-20 d-inline-block">
                    <ul class="list-group">
                        <li class="list-item">
                            <a 
                                class="d-block {{request('type') == 'saved' ? 'active' : ''}} py-2 px-3" 
                                href="{{'/'.$user->name.'/readingList?type=saved'}}"
                            >Saved</a>
                        </li>
                        <li class="list-item">
                            <a 
                                class="d-block {{request('type') == 'archieved' ? 'active' : ''}} py-2 px-3" 
                                href="{{'/'.$user->name.'/readingList?type=archieved'}}"
                            >Archieved</a>
                        </li>
                        <li class="list-item">
                            <a 
                                class="d-block {{request('type') == 'recentlyViewed' ? 'active' : ''}} py-2 px-3" 
                                href="{{'/'.$user->name.'/readingList?type=recentlyViewed'}}"
                            >Recently Viewed</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <h3 class="mr-auto font-weight-bold mb-3 text-white">
                    Collection 
                </h3>
                <div class="py-3 px-4 border rounded-20 d-inline-block w-218-px">
                    <ul class="list-group">
                        @foreach ($user->collections as $collection)
                            <li class="list-item {{$loop->last ? 'mb-3' : ''}}">
                                <a 
                                    href="{{'/'.$user->name.'/readingList/'.$collection->name}}" 
                                    class="d-block {{request()->segment(3) == $collection->name ? 'active' : ''}} py-2 px-3"
                                >
                                    {{$collection->name}}
                                </a>
                            </li>
                        @endforeach
                        <form action="{{'/'.$user->name.'/collection'}}" method="POST">
                            @csrf
                            <input class="form-control" name="name" type="text" placeholder="create new collection">
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            {{ $slot }}
        </div>
    </div>
</div>
</x-layouts.app>