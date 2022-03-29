@extends('frontend.layouts.app')

@section('content')
<main>
    <section id="login-form">
      <div class="container">
        <div class="row m-auto">
          <div class="col-lg-6 col-12 register-form m-lg-auto">
            <div class="login_form">
              <div class="">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                {{-- <form action="{{ route('login') }}" method="Post" class="w-100">
                    @csrf --}}
                    <input id="email" type="email" class="form-control  form-control-lg mb-2 w-100 @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input id="password" type="password"
                        class="form-control form-control-lg mb-2 w-100 @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  {{-- <input class="form-control form-control-lg mb-2 w-100" type="email" placeholder="Email" aria-label=".form-control-lg example" required=""> --}}
                  {{-- <input class="form-control form-control-lg mb-2 w-100" type="password" placeholder="Password" aria-label=".form-control-lg example" required=""> --}}
                  <div class="mx-auto text-center mt-3">
                      <button type="submit" class="btn submit-btn shadow-lg">
                          LOG IN
                        </button>
                  </div>
                </form>
                <a class="text-white  mt-2" href="/user-registration">New User?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
@endsection
