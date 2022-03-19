@extends('backend.layouts.master')

@section('title','Order-List')
@section('page-header')
    <i class="fa fa-list"></i> Order List
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
       'name' => 'List Order',
       'route' => 's',
    ])

    <table class="table table-bordered">
        <tbody>
        <tr>
            <th class="bg-dark" style="">SL</th>
            <th class="bg-dark" style="">User-Name</th>
            <th class="bg-dark" style="">Product Name</th>
            <th class="bg-dark" style="">Price</th>
            <th class="bg-dark" style="">Quanity</th>
            <th class="bg-dark" style="">Address</th>
            <th class="bg-dark" style="">Order Date</th>
            <th class="bg-dark" style="">Action</th>
        </tr>
        {{-- @forelse($banners as $key => $banner) --}}
            <tr>
                <td>01</td>
                <td> Alex M. Doe</td>
                <td> loreal shampoo <br>P/Code : A2320Z </td>            
                <td>140.60 TK</td>
                <td>10 /p</td>
                <td>Netherlands,Amsterdam</td>
                <td>19-03-2021 <br>19 hours Ago</td>
                <td>
                    <div class="btn-group btn-group-mini btn-corner">
                        <a href="{{ route('backend.order.show') }}"
                           class="btn btn-xs btn-info"
                           title="Edit">
                            <i class="ace-icon fa fa-eye"></i>
                        </a>

                        <button type="button" class="btn btn-xs btn-danger"
                                onclick="delete_check()"
                                title="Delete">
                            <i class="ace-icon fa fa-trash-o"></i>
                        </button>
                    </div>
                    <form action=""
                          id="deleteCheck_{{-- {{ $banner->id }} --}}" method="GET">
                        @csrf
                    </form>
                </td>
            </tr>
        {{-- @empty --}}
            {{-- <tr> --}}
                {{-- <td colspan="3">No data available in table</td> --}}
            {{-- </tr> --}}
        {{-- @endforelse --}}
        </tbody>
    </table>
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
