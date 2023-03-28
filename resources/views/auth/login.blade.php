<x-guest-layout>
    <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{asset('rt.jpeg')}}" alt="looginpage"></div>
    <div class="col-xl-7 p-0">
        <div class="login-card">
            <form class="theme-form login-form needs-validation" novalidate="" method="POST" action="{{ route('log') }}">
                @csrf
                <center>
              <img width="100" src="{{asset('bn.jpeg')}}"/>
                <h6>Welcome back! Log in to your account.</h6>
                </center>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="form-group">
                    <label>Email Address</label>
                    <div class="input-group"><span class="input-group-text">
{{--                            <i class="fa fa-envelope"></i>--}}
                        </span>
                        <input class="form-control" type="email"  placeholder="admin@gmail.com" name="email"  required="" autofocus autocomplete="username">
                        <div class="invalid-tooltip">Please enter proper email.</div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

        <!-- Email Address -->

        <!-- Password -->
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
{{--                            <i class="icon-lock"></i>--}}
                        </span>
                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                        <div class="invalid-tooltip">Please enter password.</div>
{{--                        <div class="show-hide"><span class="show">                         </span></div>--}}
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


        <!-- Remember Me -->

                <div class="form-group">
                    <div class="checkbox">
                        <input id="checkbox1" type="checkbox" name="remember">
                        <label class="text-muted" for="checkbox1">Remember password</label>
                        @if (Route::has('password.request'))
                    </div><a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-block" type="submit">Sign in</button>
                </div>
                <div class="login-social-title">
                    <h5>Sign in with</h5>
                </div>
                <div class="form-group">
                    <ul class="login-social">
                        <li><a href="https://www.linkedin.com/login" target="_blank"><i data-feather="linkedin"></i></a></li>
                        <li><a href="https://twitter.com/" target="_blank"><i data-feather="twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/" target="_blank"><i data-feather="facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/login" target="_blank"><i data-feather="instagram">                  </i></a></li>
                    </ul>
                </div>
{{--                <p>Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p>--}}
            </form>
        </div>
    </div>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</x-guest-layout>
