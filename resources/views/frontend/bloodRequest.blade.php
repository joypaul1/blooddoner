@extends('frontend.layouts.app')

@section('content')
<section class="blood-request">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-5 m-auto">
                <div class="stepper">
                    <div class="stepper-one common-stepper">1</div>
                    <div class="line"></div>
                    <div class="stepper-two  common-stepper">2</div>
                </div>
                @if(Session::has('message'))
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('send-blood-request') }}" method="POST" class="blood-request-container">
                    @method('POST')
                    @csrf
                    <div class="form-group my-2">
                        <label for="exampleFormControlInput1" class="form-label">Blood Group
                        </label>
                        <select class="form-select" aria-label="Default select example" name="blood_id" required>
                            @forelse ($bloodGroups as $blood)
                                <option  value="{{ $blood->id??' ' }}">{{ $blood->name??""}} </option>
                            @empty
                            @endforelse

                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="exampleFormControlInput1" class="form-label">Numbers Of bag
                        </label>
                        <input type="number" min="1"  name="number_of_bags" class="form-control date" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="exampleFormControlInput1" class="form-label">When Needed blood?
                        </label>
                        <input type="date" class="form-control date" name="date" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="exampleFormControlInput1" class="form-label">Extra Contact Number.
                        </label>
                        <input type="text" placeholder="Contact Number" name="extra_number" class="form-control date" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="exampleFormControlInput1" class="form-label">Why Need Blood?
                        </label>
                        <textarea name="description" id="" class="form-control" placeholder="Your Message" cols="20"
                            rows="5" required></textarea>
                    </div>
                    <div class="form-group my-2">
                        <label for="exampleFormControlInput1" class="form-label">Division
                        </label>
                        <select class="form-select" aria-label="Default select example" name="division_id" id="division_id" required>
                            @forelse ($divisions as $division)
                                <option  value="{{ $division->id}}">{{ $division->name}} </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="exampleFormControlInput1" class="form-label">City
                        </label>
                        <select class="form-select" aria-label="Default select example" name="city_id" id="city_id" required>

                        </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="exampleFormControlInput1" class="form-label">Area
                        </label>
                        <select class="form-select" aria-label="Default select example" name="postcode_id" id="postcode_id" required>

                        </select>
                    </div>

                    <button  style="display: block;margin:0 auto" class="btn btn-md btn-danger text-center">Submit</button>

                </form>
            </div>
        </div>

    </div>


</section>
@endsection
@push('js')
<script>
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
                        $("#postcode_id").append('<option value="' + value.id + '" >' + value.name +
                            '</option>');
                    });
                },
                error: function(errorMessage) {
                    alert(errorMessage);
                },
            });
        });
</script>

@endpush
