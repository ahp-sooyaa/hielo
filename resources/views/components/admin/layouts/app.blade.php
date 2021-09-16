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
    
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
      <div class="d-flex">
          {{-- side bar menu --}}
          <div class="shadow px-3" id="sidebar">
              <div class="d-flex align-items-center mt-3">
                  <a class="navbar-brand brand mr-auto" href="{{ url('/posts') }}">
                    <h2 class="m-0">{{ config('app.name', 'Hielo') }}</h2>
                  </a>
              </div>
              <div class="text-center py-4">
                  <img 
                    class="border-info-3 p-1 avatar-2x"
                    src="{{auth_user()->avatar}}" alt="avatar"
                  >
                  <div class="">
                      <span class="badge badge-success mt-2">
                        {{auth_user()->roles[0]->label}}
                      </span>   
                      <div>
                        {{auth_user()->name}}
                      </div>                  
                  </div>
              </div>
              <ul class="navbar-nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link {{ $tab == 'dashboard' ? 'active' : '' }}" href="/admin/dashboard">
                      <i class="fas fa-tachometer-alt mr-2"></i>DashBoard
                    </a>
                  </li>
                  @can('access_roles', auth_user())
                  <li class="nav-item {{ $tab == 'abilities' || $tab == 'roles' ? 'active' : '' }}">
                    <a class="nav-link">
                      <i class="fas fa-user-tag mr-2"></i>Roles & Abilities
                    </a>
                    <ul style="display: none" class="submenu">
                      <li>
                        <a href="/admin/roles" class="nav-link {{ $tab == 'roles' ? 'active' : '' }}">
                          Roles
                        </a>
                      </li>
                      <li>
                        <a href="/admin/abilities" class="nav-link {{ $tab == 'abilities' ? 'active' : '' }}">
                          Abilities
                        </a>
                      </li>
                    </ul>
                  </li>
                  @endcan
                  <li class="nav-item">
                    <a class="nav-link {{ $tab == 'users' ? 'active' : '' }}" href="/admin/users">
                      <i class="fas fa-users mr-2"></i>Users
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ $tab == 'posts' ? 'active' : '' }}" href="/admin/posts">
                      <i class="fas fa-file-alt mr-2"></i>Posts
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ $tab == 'comments' ? 'active' : '' }}" href="/admin/comments">
                      <i class="fas fa-comments mr-2"></i>Comments
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ $tab == 'tags' ? 'active' : '' }}" href="/admin/tags">
                      <i class="fas fa-tags mr-2"></i>Tags
                    </a>
                  </li>
                  <hr class="border w-100">
                  <li class="nav-item">
                    <a class="nav-link {{ $tab == 'profile' ? 'active' : '' }}" href="/admin/profile">
                      <i class="fas fa-user-cog mr-2"></i>My account
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link">
                      <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </a>
                  </li>
              </ul>
          </div>
          <main class="container-fluid p-5">
              <button type="button" id="sidebarCollapse" class="btn btn-info mt-n4">
                <i class="fas fa-bars fa-1x"></i>
              </button>
              <div class="mt-4">
                {{ $slot }}
              </div>
              <footer class="text-center py-5">
                Made with <i class="fas fa-grin-hearts text-info"></i> by 
                <span class="text-info"> Aung Htet Paing</span>.
                &#169; Hielo 2020
              </footer>
          </main>
      </div>
      <flash message="{{ session('status') }}"></flash>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" defer></script>
<script>
  $(document).ready(function() {
      $('#datatable').DataTable({
        "fnDrawCallback": function(oSettings) {
            if ($('.paginate_button').length < 2) {
                $('.dataTables_paginate').hide();
            } else {
                $('.dataTables_paginate').show();
            }
        },
        "pagingType": "numbers",
        "oLanguage": {
          "sLengthMenu": "_MENU_ entries per page",
          "sInfo": "Showing (_START_ - _END_) of _TOTAL_ entries"
        }
      });
      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
      });
      $('.nav-link').on('click', function(){
        var parent = $(this).parent();
        $('ul', parent).slideToggle('fast');
        $('ul', parent).toggleClass('d-block');
        $(parent).toggleClass('active');
      })
  } );
</script>
</html>