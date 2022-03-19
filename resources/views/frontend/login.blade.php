@extends('frontend.layouts.app')

@section('content')
<main>
    <section id="login-form">
      <div class="container">
        <div class="row m-auto">
          <div class="col-lg-6 col-12 register-form m-lg-auto">
            <div class="login_form">
              <div class="">
                <form action="" class="w-100">
                  <input class="form-control form-control-lg mb-2 w-100" type="email" placeholder="Email" aria-label=".form-control-lg example" required="">
                  <input class="form-control form-control-lg mb-2 w-100" type="password" placeholder="Password" aria-label=".form-control-lg example" required="">
                  <div class="mx-auto text-center mt-3">
                      <button type="submit" class="btn submit-btn shadow-lg">
                          LOG IN
                        </button>
                  </div>
                </form>
                <a class="text-white  mt-2" href="/register.html">New User?</a>

                <p class="text-white text-center mt-3">Continue with</p>

                <div class="all-btn text-center">

                  <div class="google-btn mb-2 mx-2">
                    <button class="btn rounded-circle" type="submit">
                      <i class="fa-brands fa-google"></i>
                    </button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
  </main>
@endsection
