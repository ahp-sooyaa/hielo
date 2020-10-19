<div class="card py-3 px-5 mt-4">
    <div class="mx-auto">
        <h4 class="mb-4">Recent Activity</h4>
        <ul class="mb-0 list-unstyled">
            @foreach ($activities->slice(0,5) as $activity)
            <li class="{{$loop->last ? '' : 'mb-2 pb-2 border-bottom-1'}}">
                @if ($activity->subject_type == 'App\Post')
                    <x-activity.post :activity="$activity"></x-activity.post>

                @elseif ($activity->subject_type == 'App\User') 
                    <x-activity.user :activity="$activity"></x-activity.user>

                @elseif ($activity->subject_type == 'App\Comment') 
                    <x-activity.comment :activity="$activity"></x-activity.comment>
                    
                @endif
            </li>       
            @endforeach
        </ul>
    </div>
</div>