<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hielo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body class="bg-primary">
    <div id="app">
        <div class="container-fluid">
            <div class="row vh-100">
                {{-- side bar menu --}}
                <div class="col-md-2 bg-white">
                    <div class="brand d-flex align-items-center">
                        <img 
                            class="my-3 mr-2"
                            style="width: 40px; height: 40px; border-radius: 50%" 
                            src="{{ asset('avatars/default.jpg')}}" alt=""
                        > 
                        <span style="font-size: 20px" class="d-inline-block font-weight-bold mr-auto">Hielo</span>
                        <i class="fas fa-bars fa-2x"></i>
                    </div>
                    <div class="text-center py-4">
                        <img 
                          class="shadow avatar-1x"
                          src="{{current_user()->avatar}}" alt=""
                        >
                        <div class="text-primary">
                            <span class="badge badge-success mt-2">
                              {{current_user()->roles[0]->label}}
                            </span>   
                            <h4>
                              {{current_user()->name}}
                            </h4>                  
                        </div>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item hover">
                          <a class="nav-link {{ request()->segment(2)=='dashboard' ? 'active' : ''}}" href="/admin/dashboard">DashBoard</a>
                        </li>
                        <li class="nav-item hover">
                          <a class="nav-link {{ request()->segment(2)=='reports' ? 'active' : ''}}" href="/admin/reports">Reports</a>
                        </li>
                        <li class="nav-item hover">
                          <a class="nav-link {{ request()->segment(2)=='roles' ? 'active' : ''}}" href="/admin/roles">Roles</a>
                        </li>
                        <li class="nav-item hover">
                          <a class="nav-link {{ request()->segment(2)=='users' ? 'active' : ''}}" href="/admin/users">Users</a>
                        </li>
                        <li class="nav-item hover">
                          <a class="nav-link {{ request()->segment(2)=='posts' ? 'active' : ''}}" href="/admin/posts">Posts</a>
                        </li>
                        <li class="nav-item hover">
                          <a class="nav-link {{ request()->segment(2)=='comments' ? 'active' : ''}}" href="/admin/comments">Comments</a>
                        </li>
                        <li class="nav-item hover">
                          <a class="nav-link {{ request()->segment(2)=='themes' ? 'active' : ''}}" href="/admin/themes">Themes</a>
                        </li>
                        <hr class="border border-primary w-100">
                        <li class="nav-item hover">
                          <a class="nav-link {{ request()->segment(2)=='profile' ? 'active' : ''}}" href="/admin/profile">My account</a>
                        </li>
                        <li class="nav-item hover">
                          <a href="{{ url('/logout') }}" class="nav-link">Logout</a>
                        </li>
                      </ul>
                </div>
                <main class="col-md-10 p-5">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" defer></script>
<script>
  $(document).ready(function() {
      $('#datatable').DataTable({
        "oLanguage": {
          "sLengthMenu": "_MENU_ entries per page",
          "sInfo": "Showing (_START_ - _END_) of _TOTAL_ entries"
        }
      });
  } );
</script>
</html>