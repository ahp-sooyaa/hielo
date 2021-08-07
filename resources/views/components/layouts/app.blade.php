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
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md sticky-top shadow-sm bg-white navbar-light">
            <div class="container">
                <a class="navbar-brand brand" href="{{ url('/posts') }}">
                    <h2 class="m-0 text-info">{{ config('app.name', 'Hielo') }}</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @auth 
                            <div class="d-flex align-items-center">
                                <li class="nav-item">
                                    <a href="/search" class="nav-link text-decoration-none mb-2 mb-md-0" data-toggle="tooltip" title="Go to Search page">
                                        <i class="fas fa-search text-dark align-self-center">
                                        </i>
                                    </a>
                                </li>
                                <user-notification :user={{auth()->id()}}>
                                </user-notification>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img 
                                            src="{{current_user()->avatar}}" alt="avatar" class="avatar-sm mr-2"
                                        >
                                        {{ str_limit(Auth::user()->name, 9, '') }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right mw-200" aria-labelledby="navbarDropdown">
                                        <div class="d-flex dropdown-item align-items-center py-2">
                                            {{-- <img 
                                                src="{{current_user()->avatar}}" alt="avatar" class="avatar mr-2"
                                            > --}}
                                            <a href="{{current_user()->path()}}" class="text-dark">
                                                {{current_user()->name}}
                                            </a>
                                        </div>
                                        <div class="text-center">
                                            <a href="/posts/create" class="text-decoration-none">
                                                <button type="button" class="btn btn-sm btn-outline-info rounded-pill px-2 mx-auto">
                                                    <i class="fas fa-plus"></i> New Post
                                                </button>
                                            </a>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a 
                                            class="dropdown-item mb-2" 
                                            href="/{{current_user()->name}}/posts?type=all">
                                            Posts
                                        </a>
                                        <a 
                                            class="dropdown-item mb-2" 
                                            href="/{{current_user()->name}}/readingList?type=saved">
                                            ReadingList
                                        </a>
                                        <a 
                                            class="dropdown-item mb-2" 
                                            href="{{current_user()->path()}}">
                                            Profile
                                        </a>
                                        <a 
                                            class="dropdown-item mb-2" 
                                            href="{{current_user()->path('edit')}}">
                                            Setting
                                        </a>
                                        <a class="dropdown-item pb-2" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </div>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            {{ $slot }}
        </main>

        <footer class="text-center py-5">
            Made with <i class="fas fa-grin-hearts text-danger"></i> by Aung Htet Paing.
            &#169; Hielo 2020
        </footer>

        <flash message="{{ session('status') }}"></flash>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function(){
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if(activeTab){
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>        
</body>
</html>
