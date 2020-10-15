<div class="card p-3 mt-4 text-center">
    <div class="mx-auto">
        <div class="mb-4">Activity Feed</div>
        <ul class="mb-0 list-unstyled">
            @foreach ($activities->slice(0,5) as $activity)
            <li class="{{$loop->last ? '' : 'mb-2'}}">
                @if ($activity->subject_type == 'App\Post')
                    <x-activity.post :activity="$activity"></x-activity.post>
                @elseif ($activity->subject_type == 'App\User') 
                    <x-activity.user :activity="$activity"></x-activity.user>
                @elseif ($activity->subject_type == 'App\Comment') 
                    <x-activity.comment :activity="$activity"></x-activity.comment>
                @endif   
                {{-- @if (!$loop->last)
                    <hr>
                @endif --}}
            </li>       
            @endforeach
        </ul>
    </div>
</div>