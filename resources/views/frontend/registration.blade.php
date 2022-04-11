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
                                    type="number" id="mobile"
                                    placeholder="01*********" aria-label=".form-control-lg example" required="">
                                    @error('mobile')
                                        <span class="invalid-feedback error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <input class="form-control form-control-lg mb-2 w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" placeholder="example@email.com"
                                    aria-label=".form-control-lg example" id="email" required="">
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
                                    placeholder="Retype Password" aria-label=".form-control-lg example" required>

                                <div class="text-center mt-3">
                                    <button type="submit" disabled class="btn submit-btn shadow-lg">
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
@push('js')
<script>
    $(document).on('input', '#mobile',function(){
        var inputtxt= $(this).val();
        if(/^(01[6789])(\d{8})$/.test(inputtxt)){
            $('#mobile').css("border","1px solid black").trigger("change");
            $(':input[type="submit"]').prop('disabled', false);

        }else{
            $('#mobile').css("border","1px solid red").trigger("change");
            $(':input[type="submit"]').prop('disabled', true);
        }
    });
    $(document).on('input', '#email',function(){
        var inputtxt= $(this).val();
        if(/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(inputtxt)){
            $('#email').css("border","1px solid black").trigger("change");
            $(':input[type="submit"]').prop('disabled', false);
        }else{
            $('#email').css("border","1px solid red").trigger("change");
            $(':input[type="submit"]').prop('disabled', true);
        }
    });
</script>

@endpush
