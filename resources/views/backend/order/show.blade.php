@extends('backend.layouts.master')

@section('title','Order-Show')
@section('page-header')
    <i class="fa fa-list"></i> Order Show
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
       'name' => 'List Show',
    ])


    <div class="col-xs-12 col-sm-9">
        <div class="profile-user-info profile-user-info-striped">
            <div class="profile-info-row">
                <div class="profile-info-name"> Product Name </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="username">Loreal Shampoo <br>P/Code : A2320Z </span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Product Price </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="price">140.60 TK </span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Quantity </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="price">10 /p </span>
                </div>
            </div>
            
            <div class="profile-info-row">
                <div class="profile-info-name"> customer Name </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="username">Alexdoe</span>
                </div>
            </div>
            

            <div class="profile-info-row">
                <div class="profile-info-name"> Location </div>

                <div class="profile-info-value">
                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                    <span class="editable editable-click" id="country">Netherlands</span>
                    <span class="editable editable-click" id="city">Amsterdam</span>
                </div>
            </div>

            <div class="profile-info-row">
                <div class="profile-info-name"> District </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="age">Alaxa</span>
                </div>
            </div>
            <div class="profile-info-row">
                <div class="profile-info-name"> Area </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="age">A/2,H:398</span>
                </div>
            </div>
            

            <div class="profile-info-row">
                <div class="profile-info-name">Oder Date </div>

                <div class="profile-info-value">
                    <span class="editable editable-click" id="signup">19-03-2021 <br>19 hours Ago</span>
                </div>
            </div>

            
        </div>
    </div>
    {{-- @include('backend.partials._paginate', ['data' => $Orders]) --}}
@endsection

@push('js')
    <script type="text/javascript">
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
