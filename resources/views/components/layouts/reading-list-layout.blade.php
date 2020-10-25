<x-layouts.app>
<div class="container">
    <h4 class="text-dark-50 mb-3 mt-4">
        Reading List 
    </h4>
    <div class="row">
        <div class="col-md-3">
            <div class="mb-4">
                <div class="py-3 px-4 border border-info bg-white rounded-20 d-inline-block">
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
        </div>
        <div class="col-md-8">
            {{ $slot }}
        </div>
    </div>
</div>
</x-layouts.app>