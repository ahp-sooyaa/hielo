<form 
    action="{{ '/'. $user->name. '/follow'}}" method="POST"
>
@csrf
    <button 
        type="submit" 
        class="btn btn-sm {{auth()->user()->isFollowing($user) ? 'btn-info' : 'btn-outline-info'}} py-0"
    >
        {{auth()->user()->isFollowing($user) ? 'Following' : 'Follow'}}
    </button>
</form>