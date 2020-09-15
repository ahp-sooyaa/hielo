<div class="d-flex">
    <div class="mr-3">
        <div class="text-primary"> 
            <h4 class="d-inline-block">
                {{$activity->causer->name}}
            </h4>
            <span class="badge badge-success align-top">
                {{$activity->causer_type}}
            </span>                      
        </div>
        {{$activity->description}} user
        <span class="text-info">{{$activity->subject->name}}</span>
    </div>
    <span class="text-muted">
        {{$activity->created_at->diffForHumans(null, true, true)}}
    </span>
</div>