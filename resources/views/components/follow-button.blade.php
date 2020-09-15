<form 
action="{{ '/'. $user->name. '/follow'}}" method="POST"
>
@csrf
    <button 
        type="submit" 
        class="btn btn-sm {{auth()->user()->isFollowing($user) ? 'btn-success' : 'btn-outline-success'}} py-0"
    >
        {{auth()->user()->isFollowing($user) ? 'Following' : 'Follow'}}
    </button>
</form>