<div class="d-flex align-items-center">
    <div class="mr-auto pr-4 font-weight-bold">
        {{-- <div class="">  --}}
            <span class="badge badge-secondary align-center">
                {{$activity->causer_type}}
            </span>
            {{-- <div class="d-inline-block"> --}}
                {{$activity->causer->name}}
            {{-- </div> --}}
        {{-- </div> --}}
        <span class="text-muted">
            {{$activity->description}} comment
        </span>
        {{-- <span class=""> --}}
            {{$activity->subject->body}}
        {{-- </span> --}}
    </div>
    <span class="text-muted pl-3">
        {{$activity->created_at->diffForHumans(null, true, true)}}
    </span>
</div>