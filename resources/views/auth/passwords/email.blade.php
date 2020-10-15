<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0 p-5 mt-5">
                    <div class="w-75 mx-auto">
                        <h3>Reset Password</h3>
                        <hr>
                        <div class="mb-3 text-justify">
                            Enter the email address associated with your account and we'll send you a link to reset your password.
                        </div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input 
                                    type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus
                                >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-info w-100">
                                {{ __('Email Me') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
