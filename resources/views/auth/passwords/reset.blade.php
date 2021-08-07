<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0 p-5 mt-5">
                    <div class="w-75 mx-auto">
                        <h5>Reset Your Password</h5>
                        <hr>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="email">
                                    {{ __('E-Mail Address') }}</label>
                                <input 
                                    id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">
                                    {{ __('Password') }}
                                </label>
                                <input 
                                    id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                                >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">
                                    {{ __('Confirm Password') }}
                                </label>
                                <input 
                                    id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                                >
                            </div>

                            <button type="submit" class="btn btn-info w-100">
                                {{ __('Reset Password') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
