<div class="d-flex align-items-center">
    <div class="mr-auto pr-4 font-weight-bold">
        {{-- <span class="badge badge-success align-center">
            {{$activity->causer_type}}
        </span> --}}
        {{
            $activity->causer->name == current_user()->name ? "You" : $activity->causer->name
        }}
        <span class="text-muted">
            {{$activity->description}} comment
        </span>
        {{$activity->subject->body}}
    </div>
    <span class="text-muted pl-3">
        {{$activity->created_at->diffForHumans(null, true, true)}}
    </span>
</div>