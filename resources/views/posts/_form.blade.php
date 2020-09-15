@csrf
<input
    type="text" name="title" rows="1" placeholder="Title" 
    class="text-box text-box-title form-control mt-3"
    value="{{$post->title}}"
>
<input 
    type="text" name="excerpt" placeholder="Write a excerpt for post ..."  
    class="text-box form-control"
    value="{{$post->excerpt}}"
>
<textarea 
    name="content"
    class="text-box editable"
>{{$post->content}}
</textarea>