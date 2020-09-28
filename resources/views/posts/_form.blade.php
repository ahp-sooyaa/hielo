@csrf
<div class="form-group">
    <input
        type="text" name="title" placeholder="Title" 
        class="form-control @error('title') is-invalid @enderror" value="{{$post->title}}"
    >
</div>
<div class="form-group">
    <input 
        type="text" name="excerpt" placeholder="Write a excerpt for post ..."  
        class="form-control @error('excerpt') is-invalid @enderror" value="{{$post->excerpt}}"
    >
</div>
<div class="form-group">
    <textarea 
        name="content" class="form-control @error('content') is-invalid @enderror" 
        rows="10" id="editor"
    >
    {{$post->content}}
    </textarea> 
</div>