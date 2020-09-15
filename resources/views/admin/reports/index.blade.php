<x-admin.layouts.app>
    <div class="card p-3">
        <header class="text-black">
            <div class="d-flex align-items-center">
                <h1 class="my-0 mr-3">Reports</h1>
            </div>
            <p class="text-dark-50">All of Reports are shown in below</p>
        </header>
        {{-- <table class="table table-striped table-responsive-md">
            <caption>
                <span class="text-dark font-weight-bold">
                    {{ $users->count() }} 
                </span> rows of total
            </caption>
            <thead>
                <tr>
                    <th>Reporter Name</th>
                    <th>Report type</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Reported at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($reports as $report)
                    @if ($report->subject_type == 'App\User')
                        <tr>
                            <td>{{ $report->reporter->name}}</td>
                            <td>{{ $report->subject_type }}</td>
                            <td>{{ $report->subject->name }}</td>
                            <td>{{ $report->description }}</td>
                            <td>{{ $report->created_at->format('d M,Y') }}</td>
                            <td>
                                <a class="mr-2" href="#">
                                    <button class="btn btn-info" type="submit" name="delete">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </a>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button class="btn btn-danger" type="submit" name="delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @elseif($report->subject_type == 'App\Post')
                        <tr>
                            <td>{{ $report->reporter->name}}</td>
                            <td>{{ $report->subject_type }}</td>
                            <td>{{ $report->subject->title }}</td>
                            <td>{{ $report->description }}</td>
                            <td>{{ $report->created_at->format('d M,Y') }}</td>
                            <td>
                                <a class="mr-2" href="#">
                                    <button class="btn btn-info" type="submit" name="delete">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </a>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button class="btn btn-danger" type="submit" name="delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                    
                @empty
                    <tr class="text-center">
                        <td colspan="5">no users yet!</td>
                    </tr>
                @endforelse
            </tbody>
        </table> --}}
        <ul class="list-unstyled">
            @forelse ($reports as $report)
                @if ($report->subject_type == 'App\User')
                    <x-reports.user-report :report="$report"></x-reports.user-report>
                @elseif($report->subject_type == 'App\Post')
                    <x-reports.post-report :report="$report"></x-reports.post-report>
                @endif
            @empty
                
            @endforelse
        </ul>
    </div>
</x-admin.layouts.app>