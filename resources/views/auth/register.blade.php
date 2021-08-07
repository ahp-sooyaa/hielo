<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card shadow border-0">
                    <div class="d-flex">
                        <div class="d-none d-lg-block d-xl-block col-6 p-0 position-relative">
                            <img class="h-100 b-l-tb object-contain" src="{{ asset('appImage/3255469.jpg') }}" alt="" data-toggle="tooltip" title="Idea vector created by stories - www.freepik.com">
                        </div>
                        <div class="col-lg-6 col-md-12 p-5">
                            <div class="d-flex mx-auto justify-content-end mt-n4 mb-5">
                                <div class="bg-white shadow-sm b-l-tb px-2">
                                    <a class="text-info" href="{{route('login')}}">SignIn</a>
                                </div>
                                <div class="bg-info shadow-sm b-r-tb px-2">
                                    <a class="text-white" href="{{route('register')}}">SignUp</a>
                                </div>
                            </div>
                            <h1 class="text-center mb-4">Create Account</h1>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group mx-auto">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border-bottom-1 border-0" name="name" value="{{ old('name') }}" placeholder="Name" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mx-auto">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-bottom-1 border-0" name="email" value="{{ old('email') }}" placeholder="Email Address" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                       
                                </div>

                                <div class="form-group mx-auto">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-bottom-1 border-0" name="password" placeholder="Password" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mx-auto">
                                    <input id="password-confirm" type="password" class="form-control border-bottom-1 border-0" name="password_confirmation" placeholder="Password Comfirmation" autocomplete="new-password">
                                </div>

                                <div class="form-group mx-auto mb-5">
                                    <button type="submit" class="btn btn-info w-100">
                                        SignUp
                                    </button>
                                </div>

                                {{-- <div>
                                    Already have an account? <a class="text-info" href="{{route('login')}}">SignIn</a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
