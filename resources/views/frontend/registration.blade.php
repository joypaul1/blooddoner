@extends('frontend.layouts.app')

@section('content')
<main>
    <section id="login-form">
        <div class="container">
            <div class="row m-auto">
                <div class="col-lg-6 col-12 register-form m-lg-auto">
                    <div class="login_form">
                        <div class="">
                            <form method="POST" action="{{ route('register') }}" class="w-100">
                                @csrf
                                <input
                                    class="form-control form-control-lg mb-2 w-100  @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" type="text" placeholder="name"
                                    aria-label=".form-control-lg example" required="">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <input class="form-control form-control-lg mb-2 w-100 @error('mobile') is-invalid @enderror" name="mobile"
                                    type="number"
                                    placeholder="Mobile Number" aria-label=".form-control-lg example" required="">
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <input class="form-control form-control-lg mb-2 w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" placeholder="Email"
                                    aria-label=".form-control-lg example" required="">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <input class="form-control form-control-lg mb-2 w-100 @error('password') is-invalid @enderror" name="password"  type="password"
                                    placeholder="Password" aria-label=".form-control-lg example" required="">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <input class="form-control form-control-lg mb-2 w-100" name="password_confirmation"  type="password"
                                    placeholder="Password" aria-label=".form-control-lg example" required>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn submit-btn shadow-lg">
                                        REGISTER
                                    </button>
                                </div>
                            </form>
                            <a class="text-white  mt-2" href="/login">Already have an Account?</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
