@extends('frontend.layouts.app')

@section('content')
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Become Donors
                        </strong></h2>
                    <p>Fill all form field to go to next step</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form action="{{ url('profile-save') }}" method="POST" id="msform">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Setp-1</strong></li>
                                    <li id="personal"><strong>Setp-2</strong></li>
                                    <li id="payment"><strong>Setp-3</strong></li>
                                    <li id="confirm"><strong>Setp-4</strong></li>
                                </ul> <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Account Information</h2>
                                        <label for="">User Name</label>

                                        <input type="text" name="name" value="{{ auth()->user()->name ?? ' ' }}"
                                            placeholder="User Name" />
                                        <label for="">Blood Group</label>
                                        <select class="form-select" name="blood_id">
                                            <option selected="">Select Blood Group </option>
                                            @foreach ($bloodGroups as $group)
                                                <option value="{{ $group->id }}"
                                                    {{ auth()->user()->blood_id ?? 0 == $group->id ? 'Selected' : ' ' }}>
                                                    {{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <label for="">Gender</label>
                                        <select class="form-select" aria-label="Default select example" name="gender">
                                            <option value="{{ null }}">Select Gender </option>
                                            <option value="male" {{ auth()->user()->gender == "male"?'Selected': ' ' }}>Male</option>
                                            <option value="female"  {{ auth()->user()->gender == "female"?'Selected': ' ' }}>Female</option>
                                            <option value="others"  {{ auth()->user()->gender == "others"?'Selected': ' ' }}>Others</option>
                                        </select>
                                        <br>
                                        <label for="">Date Of Birth</label>
                                        <input type="date" name="dob" id="dob" value="{{ date('Y-m-d',strtotime(auth()->user()->dob??date('Y-m-d') )) }}"
                                            placeholder="date of birth" />
                                    </div>
                                    <input type="button" class="next action-button" disabled value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    @php
                                        $divisions = App\Models\Division::orderby('id')->get(['id', 'name']);
                                    @endphp
                                    <div class="form-card">
                                        <h2 class="fs-title">Prasent Address</h2>
                                        <select name="division_id" class="form-control" id="division_id">
                                            <option> - select division- </option>
                                            @forelse ($divisions as $division)
                                                <option value="{{ $division->id }}"
                                                    {{ auth()->user()->division_id   == $division->id ? 'Selected' : ' ' }}>
                                                    {{ $division->name }}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                        <br>
                                        <select name="city_id" class="form-control" id="city_id">
                                            <option value="{{ null }}"> - select city- </option>
                                            <option value="{{ auth()->user()->city_id }}"@if ( auth()->user()->city_id)
                                                Selected
                                            @endif >
                                                {{ optional(auth()->user()->city)->name ?? ' ' }}</option>

                                        </select>
                                        <br>
                                        <select name="postcode_id" class="form-control" id="postcode_id">
                                            <option value="{{ null }}"> - select postcode- </option>
                                            <option value="{{ auth()->user()->postcode_id }}"@if ( auth()->user()->postcode_id)
                                                Selected
                                            @endif >
                                                {{ optional(auth()->user()->postcode)->name ?? ' ' }}</option>
                                        </select>

                                        <label for="">Present Address</label>
                                        <input type="text" name="present_address"
                                            value="{{ auth()->user()->present_address ?? ' ' }}"
                                            placeholder="present_address" />



                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="button" class="next action-button" value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <label> Donate Date </label>
                                        <input type="date" name="donatedate" value="{{ date('Y-m-d',strtotime(auth()->user()->donatedate)?? date('Y-m-d') ) }}" class="form-control">

                                    </div> <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" /> <input type="submit" name="make_payment"
                                        class="next action-button" value="Confirm" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Success !</h2> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <img src="{{ asset(auth()->user()->image ?? '') }}" class="fit-image">
                                            </div>

                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>You Have Successfully Signed Up</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            dob = new Date($(this).val());
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                if (age >= 18) {
                    $('#dob').css("border","1px solid black");
                    $('.next').prop('disabled', false);
                }else{
                    $('#dob').css("border","1px solid red");
                    $('.next').prop('disabled', true);

                }
             $(document).on('change', '#dob', function(){
                dob = new Date($(this).val());
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                if (age >= 18) {
                    $('#dob').css("border","1px solid black");
                    $('.next').prop('disabled', false);
                }else{
                    $('#dob').css("border","1px solid red");
                    $('.next').prop('disabled', true);

                }
            });
        });





        $('#division_id').change(function() {
            var divId = $(this).val();
            var url = "{{ url('getCity') }}";
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                data: {
                    'id': divId
                },
                success: function(data) {
                    $("#city_id").empty();
                    $.each(data, function(key, value) {
                        $("#city_id").append('<option value="' + value.id + '">' + value.name +
                            '</option>');
                    });
                },
                error: function(errorMessage) {
                    alert(errorMessage);
                },
            });
        });
        $('#city_id').change(function() {
            var divId = $(this).val();
            var url = "{{ url('getPostCode') }}";
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                data: {
                    'id': divId
                },
                success: function(data) {
                    $("#postcode_id").empty();
                    $.each(data, function(key, value) {
                        $("#postcode_id").append('<option value="' + value.id + '" >' + value.name +'</option>');
                    });
                },
                error: function(errorMessage) {
                    alert(errorMessage);
                },
            });
        });
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function() {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $("input[type='submit']").click(function(event) {
                // console.log('form');
                // $('form').submit() ;
                var $target = $(event.target);
                $target.closest("form").submit();
            })

        });
    </script>
@endpush
@push('css')
    <style>
        #grad1 {
            background-color: : #9C27B0;
            background-image: linear-gradient(120deg, #FF4081, #81D4FA)
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #msform input,
        #msform textarea {
            padding: 0px 8px 4px 8px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: none;
            font-weight: bold;
            border-bottom: 2px solid skyblue;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: skyblue;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: skyblue
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

    </style>
@endpush
