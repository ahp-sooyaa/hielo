<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <h3 class="font-weight-bold text-center">
                    Just One more Step, <br>Let's verify your email
                </h3>
                <div class="mt-4">
                    <div class="mb-3">
                        We already send a verification link to <span class="font-weight-bold">{{current_user()->email}}</span>, please check your email. 
                    </div>
                        
                    Note: If you did not receive the email
                    <ul class="p-3">
                        <li>
                            check spam folder
                        </li>
                        <li>
                            check if you typed your email address correctly
                        </li>
                        <li>
                            if you already check the above step, plz wait a few minutes or 
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
