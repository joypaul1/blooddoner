@extends('backend.layouts.master')
@section('title','Division List')
@section('page-header')
    <i class="fa fa-list"></i> Area Division List
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
       'name' => 'Create Division',
       'route' => route('backend.area.create-division')
    ])


    <table class="table table-bordered">
        <tbody>
        <tr>
            <th class="bg-dark" style="width: 5%">SL</th>
            <th class="bg-dark" style="width: 30%">Division</th>
            <th class="bg-dark" style="width: 10%">Action</th>
        </tr>
        @foreach($divisions as $key => $division)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $division->name }}</td>
            <td>
                <div class="btn-group btn-group-mini btn-corner">
                   
                        <a href="{{ route('backend.area.edit',['id' => $division->id]) }}"class="btn btn-xs btn-info"
                            title="Edit"><i class="ace-icon fa fa-pencil"></i>
                        </a>

                        <button type="button" class="btn btn-xs btn-danger" onclick="delete_check({{ $division->id }})"
                            title="Delete"><i class="ace-icon fa fa-trash-o"></i>
                        </button>

                </div>
                <form action="{{ route('backend.area.destroy', ['id' => $division->id]) }}"
                      id="deleteCheck_{{ $division->id }}" method="GET">
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach



        </tbody>
    </table>

    @include('backend.partials._paginate', ['data' => $divisions])
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
