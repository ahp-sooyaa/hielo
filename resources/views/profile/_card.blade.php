<div class="card text-primary rounded-20 px-4 py-3">
    <div class="d-flex">
        <div class="mr-4">
            <img src="{{asset('storage/'. $user->image)}}" alt="avatar"
            class="rounded-circle" style="width: 60px; height: 60px">
        </div>
        <div>
            <h5>{{$user->name}}</h5>
            <span>{{$user->short_bio}}</span>
        </div>
    </div>
</div>