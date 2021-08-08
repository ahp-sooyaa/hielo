<x-layouts.fullpage>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center">
                <a class="navbar-brand brand mb-3" href="{{ url('/posts') }}">
                    <h1 class="m-0 text-info">{{ config('app.name', 'Hielo') }}</h1>
                </a>
                <div class="card shadow-sm border-0">
                    <div class="d-flex">
                        <div class="d-none d-lg-block d-xl-block col-6 p-0 position-relative">
                            <img class="h-100 b-l-tb object-contain" src="{{ asset('appImage/3255309.jpg') }}" alt="" data-toggle="tooltip" title="Idea vector created by stories - www.freepik.com">
                        </div>
                        <div class="col-lg-6 col-md-12 p-5">
                            <div class="d-flex justify-content-end mt-n4 mb-5">
                                <div class="bg-info shadow-sm b-l-tb px-2">
                                    <a class="text-white" href="{{route('login')}}">SignIn</a>
                                </div>
                                <div class="bg-white shadow-sm b-r-tb px-2">
                                    <a class="text-info" href="{{route('register')}}">SignUp</a>
                                </div>
                            </div>
                            <h1 class="text-center mb-4">
                                Hello there, welcome Back
                            </h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
    
                                <div class="form-group mx-auto">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-bottom-1 border-0" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                                <div class="form-group mx-auto">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-bottom-1 border-0" name="password" placeholder="Password" autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
    
                                <div class="d-flex align-items-center mb-2">
                                    <div class="form-check mr-auto">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <div>
                                        @if (Route::has('password.request'))
                                        <a class="pr-0" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    </div>
                                </div>
    
                                <div class="mx-auto mb-4">
                                    <button type="submit" class="btn btn-info w-100">
                                        SignIn
                                    </button>
                                </div>
    
                                <div class="mb-2">
                                    SignIn with Social media 
                                    {{-- or <a class="text-info" href="{{route('register')}}">SignUp</a> --}}
                                </div>
    
                                <div class="d-flex align-items-center mt-1"> 
                                    <a href="/login/facebook" class="btn btn-sm btn-warning badge-pill mr-2">
                                        <i class="fab fa-facebook-f mr-1"></i>Facebook
                                    </a>
                                    <a href="/login/github" class="btn btn-sm btn-dark badge-pill">
                                        <i class="fab fa-github"> GitHub</i> 
                                    </a> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.fullpage>
