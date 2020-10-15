<div class="d-flex align-items-center">
    <div class="mr-auto py-2 font-weight-bold">
        {{-- <div class="text-primary">  --}}
            <span class="badge badge-success align-center">
                {{$activity->causer_type}}
            </span>
            {{-- <div class="d-inline-block"> --}}
                {{$activity->causer->name}}
            {{-- </div> --}}
        {{-- </div> --}}
        <span class="text-muted">
            {{$activity->description}} user
        </span>
        {{$activity->subject->name}}
    </div>
    <span class="text-muted pl-3">
        {{$activity->created_at->diffForHumans(null, true, true)}}
    </span>
</div>