<x-admin.layouts.app tab="abilities">
    <div class="card p-3">
        <header>
            <div class="d-flex align-items-center">
                <h1 class="mb-0 mr-3">Abilities</h1>
                <a href="/admin/abilities/create">
                    <button class="btn btn-sm btn-info">
                        + ADD NEW
                    </button>
                </a>
            </div>
            <p class="text-dark-50">All Abilities are shown in below</p>
        </header>
        <table id="datatable" class="table table-striped table-hover table-responsive-md">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Label</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($abilities as $ability)
                    <tr>
                        <td>{{ $ability->name }}</td>
                        <td>{{ $ability->label }}</td>
                        <td class="d-flex">
                            <a class="mr-2" href="/admin/abilities/{{$ability->id}}/edit">
                                <button class="btn btn-sm btn-link" type="submit">
                                    <i class="fas fa-pen text-primary"></i>
                                </button>
                            </a>
                            <form action="/admin/abilities/{{$ability->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button class="btn btn-sm btn-link" type="submit">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
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