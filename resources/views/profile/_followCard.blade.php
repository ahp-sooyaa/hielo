<div class="card rounded-20 px-4 py-3">
    <div class="d-flex">
        <div class="mr-4">
            <img src="{{$user->avatar}}" alt="avatar"
            class="rounded-circle" style="width: 60px; height: 60px">
        </div>
        <div>
            <a href="{{$user->path()}}">{{$user->name}}</a>
            <div class="text-black-50">{{$user->short_bio ? $user->short_bio : 'No bio'}}</div>
        </div>
    </div>
</div>