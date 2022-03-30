@extends('backend.layouts.master')

@section('title','USER-List')
@section('page-header')
    <i class="fa fa-list"></i> USER List
@stop

@push('css')
    <style>
        table th,
        td {
            text-align: center !important;
            vertical-align: middle !important;
        }
    </style>
@endpush

@section('content')
    @include('backend.components.page_header', [
       'fa' => 'fa fa-pencil',
       'name' => 'List customer',
       'route' => route('backend.customer.index')
    ])
    <form class="form-horizontal"
    method="get"
    action=""
    role="form"
    enctype="multipart/form-data">
  <table class="table table-bordered">
      <tr>
          <th class="bg-dark" style="width: 22%"><label for="origin">Division</label></th>
          <th class="bg-dark" style="width: 22%"><label for="brand">City</label></th>
          <th class="bg-dark" style="width: 22%"><label for="category">PostCode</label></th>
          <th class="bg-dark" style="width: 22%"><label for="name">Name</label></th>
          <th class="bg-dark" style="width: 12%;">Actions</th>
      </tr>
      <tr>
          <td>
              <select class="chosen-select" id="division_id" name="division_id">
                  <option value="">- Division -</option>
                    @foreach($divisions as $division)
                      <option value="{{ $division->id }}"
                          {{ request()->query('division_id') == $division->id ? 'selected' : '' }}>
                          {{ $division->name }}
                      </option>
                    @endforeach
              </select>
          </td>
          <td>
              <select class="chosen-select" id="city_id" name="city_id">
                  <option value="">- City -</option>
              </select>
          </td>
          <td>
              <select class="chosen-select" id="post_code_id" name="post_code_id">
                  <option value="">- Post Code -</option>
              </select>
          </td>
          <td>
            <select class="chosen-select" id="blood_id" name="blood_id">
                <option value="">- Blood Group -</option>
                  @foreach($bloods as $blood)
                    <option value="{{ $blood->id }}"
                        {{ request()->query('blood_id') == $blood->id ? 'selected' : '' }}>
                        {{ $blood->name }}
                    </option>
                  @endforeach
            </select>
          </td>
          <td>
              <div class="btn-group btn-group-mini btn-corner">
                  <button type="submit"
                          class="btn btn-xs btn-primary"
                          title="Search">
                      <i class="ace-icon fa fa-search"></i>
                  </button>

                  <a href="{{ route('backend.product.items.index') }}"
                     class="btn btn-xs btn-info"
                     title="Show All">
                      <i class="ace-icon fa fa-list"></i>
                  </a>
              </div>
          </td>
      </tr>
  </table>
</form>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th class="bg-dark" style="width: 10%">SL</th>
            <th class="bg-dark" style="width: 20%">Name</th>
            <th class="bg-dark" style="width: 20%">Mobile</th>
            <th class="bg-dark" style="width: 20%">Email</th>
            <th class="bg-dark" style="width: 20%">Blood Group</th>
            <th class="bg-dark" style="width: 20%">Image</th>
            {{-- <th class="bg-dark" style="">Action</th> --}}
        </tr>
        @forelse($users as $key => $user)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $user->name??" "}}</td>
                <td> {{ $user->mobile??" "}}</td>
                <td> {{ $user->email??" "}}</td>
                <td> {{ optional($user->blood)->name??"-"}}</td>
                <td>
                    <img src="{{ asset( $user->image??'assets/images/avatars/profile-pic.jpg') }}"
                         height="80"
                         width="120"
                         alt="No Image">
                </td>
                {{-- <td>
                    <div class="btn-group btn-group-mini btn-corner">
                        <a href="{{ route('backend.customer.show') }}"
                           class="btn btn-xs btn-info"
                           title="Edit">
                            <i class="ace-icon fa fa-pencil"></i>
                        </a>

                        <button type="button" class="btn btn-xs btn-danger"
                                onclick="delete_check()"
                                title="Delete">
                            <i class="ace-icon fa fa-trash-o"></i>
                        </button>
                    </div>
                    <form action=""
                          id="deleteCheck_{{ $banner->id }}" method="GET">
                        @csrf
                    </form>
                </td> --}}
            </tr>
        @empty
            <tr>
                <td colspan="6">No data available in table</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    @include('backend.partials._paginate', ['data' => $users])
@endsection

@push('js')
    <script type="text/javascript">
        jQuery(function ($) {
            if (!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect: true, search_contains: true});
                //resize the chosen on window resize
                $(window).on('resize.chosen', function () {
                    $('.chosen-select').each(function () {
                        let $this = $(this);
                        $this.next().css({'width': '100%'});
                    })
                }).trigger('resize.chosen');
            }
        });

        $('#city_id').change(function () {
            var divId = $(this).val();
            var url = "{{ route('backend.area.post_code.getPostCode', ":divId") }}";
            url = url.replace(':divId', divId);
            $.ajax({
                url      : url,
                method   : 'GET',
                dataType : 'json',
                success  : function(data) {
                    $("#post_code_id").empty();
                    $.each(data.cities, function (key, value) {
                        $("#post_code_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $("#post_code_id").trigger("chosen:updated");
                },
                error: function(errorMessage) {
                    alert(errorMessage);
                },
            });
        });
        $('#division_id').change(function () {
            var divId = $(this).val();
            var url = "{{ route('backend.area.city.getCity', ":divId") }}";
            url = url.replace(':divId', divId);
            $.ajax({
                url      : url,
                method   : 'GET',
                dataType : 'json',
                success  : function(data) {
                    $("#post_code_id").empty();
                    $.each(data.cities, function (key, value) {
                        $("#city_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $("#city_id").trigger("chosen:updated");
                },
                error: function(errorMessage) {
                    alert(errorMessage);
                },
            });
        });

        function delete_check(id) {
            Swal.fire({
                title: 'Are you sure?',
                html: "<b>You will delete it permanently!</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                width: 400,
            }).then((result) => {
                if (result.value) {
                    $('#deleteCheck_' + id).submit();
                }
            })
        }
    </script>
@endpush
