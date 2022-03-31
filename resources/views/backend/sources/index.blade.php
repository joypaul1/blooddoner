@extends('backend.layouts.master')
@section('title','Blood Request')
@section('page-header')
    <i class="fa fa-list"></i> Blood Request
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
       'name' => 'Blood Request',
    ])

    <table class="table table-bordered">
        <tbody>
        <tr>
            <th class="bg-dark" >SL</th>
            <th class="bg-dark">Name</th>
            <th class="bg-dark">Number Of Bags</th>
            <th class="bg-dark">Number</th>
            <th class="bg-dark">Date</th>
            <th class="bg-dark">Description</th>
            <th class="bg-dark" >Division</th>
            <th class="bg-dark" >City</th>
            <th class="bg-dark" >PostCode</th>
        </tr>
        @forelse($sources as $key => $source)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ optional($source->user)->name??' ' }}</td>
                <td>{{ $source->number_of_bags??' ' }}</td>
                <td>{{ $source->extra_number??' ' }}</td>
                <td>{{ date('d-m-y', strtotime($source->date??'-')) }}</td>
                <td>{{ $source->description??' ' }}</td>
                <td>{{ optional($source->division)->name??' ' }}</td>
                <td>{{ optional($source->city)->name??' ' }}</td>
                <td>{{ optional($source->postcode)->name??' ' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="9">No data available in table</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @include('backend.partials._paginate', ['data' => $sources])
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
