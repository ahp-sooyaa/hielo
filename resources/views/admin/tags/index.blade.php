<x-admin.layouts.app tab="tags">
    <div class="card p-3">
        <header>
            <div class="d-flex align-items-center">
                <h1 class="mb-0 mr-3">Tags</h1>
                <a href="/admin/tags/create">
                    <button class="btn btn-sm btn-info">
                        + ADD NEW
                    </button>
                </a>
            </div>
            <p class="text-dark-50">All tags are shown in below</p>
        </header>
        <table id="datatable" class="table table-striped table-hover table-responsive-md">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Tagged Post Count</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag)
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->posts_count }}</td>
                        <td class="d-flex">
                            <a class="mr-2" href="/admin/tags/{{$tag->id}}/edit">
                                <button class="btn btn-sm btn-link" type="submit">
                                    <i class="fas fa-pen text-primary"></i>
                                </button>
                            </a>
                            <form action="/admin/tags/{{$tag->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button class="btn btn-sm btn-link" type="submit">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="4">No tags yet!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Edit Ability</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @include('admin.abilities.edit')
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> 
          </div>
        </div>
      </div> --}}
</x-admin.layouts.app>