<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>
</head>
<body class="bg-primary text-white">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-secondary shadow-sm">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="{{ url('/posts') }}">
                    {{ config('app.name', 'Laravel') }}
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
                            <user-notification :user={{auth()->id()}}></user-notification>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Illuminate\Support\Str::limit(Auth::user()->name, 9, '') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div class="d-flex dropdown-item align-items-center py-2">
                                        <a 
                                            href="/{{current_user()->name}}">
                                            <i class="fas fa-user-circle fa-2x mr-2"></i>
                                        </a>
                                        <a href="/{{current_user()->name}}">
                                            {{current_user()->name}}
                                        </a>
                                    </div>
                                    <hr class="my-2">
                                    <a 
                                        class="dropdown-item mb-2" 
                                        href="/{{current_user()->name}}/posts?type=all">
                                        Posts
                                    </a>
                                    <a 
                                        class="dropdown-item mb-2" 
                                        href="/{{current_user()->name}}/posts?type=all">
                                        Setting
                                    </a>
                                    <a 
                                        class="dropdown-item mb-2" 
                                        href="/{{current_user()->name}}/readingList?type=saved">
                                        ReadingList
                                    </a>
                                    <a 
                                        class="dropdown-item mb-2" 
                                        href="/{{current_user()->name}}">
                                        Profile
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
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            {{ $slot }}
        </main>

        <flash message="{{ session('status') }}"></flash>
    </div>
</body>
</html>
