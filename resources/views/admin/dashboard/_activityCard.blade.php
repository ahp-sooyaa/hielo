<div class="card py-3 mt-4">
    <div class="mx-auto">
        <h2 class="text-info mb-4">Activity Feed</h2>
        <ul class="mb-0 list-unstyled">
            @foreach ($activities as $activity)
            <li class="{{$loop->last ? '' : 'mb-2'}} pl-2">
                @if ($activity->subject_type == 'App\Post')
                    <x-post-activity :activity="$activity"></x-post-activity>
                @elseif ($activity->subject_type == 'App\User') 
                    <x-user-activity :activity="$activity"></x-user-activity>
                @elseif ($activity->subject_type == 'App\Comment') 
                    <x-comment-activity :activity="$activity"></x-comment-activity>
                @endif   
                @if (!$loop->last)
                    <hr>
                @endif
            </li>       
            @endforeach
        </ul>
    </div>
</div>