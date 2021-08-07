<div class="card shadow border-0 p-3">
    <div class="d-flex position-relative">
        <div class="mr-auto">
            <i 
                class="fas fa-comments fa-3x text-white bg-secondary position-absolute top-n35 p-3 shadow rounded-20"
            ></i>
        </div>
        <div class="text-center sp-1">
            <span class="text-dark-50">{{$comments->count()}}</span> 
            <h3>Comments</h3>
        </div>
    </div>
    <hr class="my-2 border">
    <footer>
        <a href="" class="d-flex align-items-center text-decoration-none">
            <span class="mr-auto">
                view details
            </span>
            <span><i class="fas fa-chevron-right"></i></span>
        </a>
    </footer>
</div>