<div class="d-flex align-items-center p-3">
    <div class="mr-auto py-2 font-weight-bold">
        {{-- <span class="badge badge-success align-center">
            {{$activity->causer_type}}
        </span> --}}
        {{
            $activity->causer->name == auth_user()->name ? "You" : $activity->causer->name
        }}
        <span class="text-muted">
        {{$activity->description}} post
        </span>
        @if ($activity->description != 'deleted')
            {{$activity->subject->title}}
        @endif
    </div>
    <span class="text-muted pl-3">
        {{$activity->created_at->diffForHumans(null, true, true)}}
    </span>
</div>
