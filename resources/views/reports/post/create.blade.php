<x-layouts.app>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                    <h1>Report</h1>
                    <form action="/postReports/{{$post->id}}" method="POST">
                        @csrf
                        
                        You are reporting "{{$post->title}}" post to admin team
                    
                        <div class="form-group">
                            <input
                                type="text" name="description" rows="1" placeholder="Reason of reporting" 
                                class="form-control mt-3"
                            >
                        </div>
                        
                        <button type="submit" class="btn btn-success mr-3">
                            Submit
                        </button>
                        <a href="{{$post->path()}}">
                            back
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>