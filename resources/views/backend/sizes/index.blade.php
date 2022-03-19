@extends('backend.layouts.master')
@section('title','Sizes List')
@section('page-header')
    <i class="fa fa-list"></i> Size List
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
    {{-- @if(hasAccess('size-create')) --}}
        @include('backend.components.page_header', [
        'fa' => 'fa fa-pencil',
        'name' => 'Create Size',
        'route' => route('backend.product.sizes.create')
        ])
    {{-- @endif --}}

    <form class="form-horizontal" method="post" action="{{ route('backend.product.sizes.search') }}" role="form" enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th  class="bg-dark" style="width: 22%"><label for="name">Sizes Name.. </label></th>
                    <th class="bg-dark" style="width: 12%;">Actions</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="myInput" name="search" placeholder="Sizes search here.." value="" class="input-sm form-control text-center" required>
                    </td>
                    <td>
                        <div class="btn-group btn-group-mini btn-corner">
                            <button type="submit" class="btn btn-xs btn-primary" title="Search">
                                <i class="ace-icon fa fa-search"></i>
                            </button>

                            <a href="{{ route('backend.product.sizes.index') }}" class="btn btn-xs btn-info" title="Show All">
                                <i class="ace-icon fa fa-list"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th class="bg-dark" style="width: 10%">SL</th>
            <th class="bg-dark" style="width: 30%">Name</th>
            <th class="bg-dark" style="width: 10%">Action</th>
        </tr>
        @forelse($sizes as $key => $size)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $size->name }}</td>
                <td>
                    <div class="btn-group btn-group-mini btn-corner">
                        {{-- @if(hasAccess('size-edit')) --}}
                            <a href="{{ route('backend.product.sizes.edit', $size->id) }}"
                            class="btn btn-xs btn-info"
                            title="Edit">
                                <i class="ace-icon fa fa-pencil"></i>
                            </a>
                        {{-- @endif --}}
                        {{-- @if(hasAccess('size-edit')) --}}
                            <button type="button" class="btn btn-xs btn-danger"
                                    onclick="delete_check({{$size->id}})"
                                    title="Delete">
                                <i class="ace-icon fa fa-trash-o"></i>
                            </button>
                        {{-- @endif --}}
                    </div>
                    <form action="{{ route('backend.product.sizes.destroy', $size->id)}}"
                          id="deleteCheck_{{ $size->id }}" method="GET">
                        @csrf
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No data available in table</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @include('backend.partials._paginate', ['data' => $sizes])
@endsection

@push('js')
    <script type="text/javascript">
        function delete_check(id) {
            Swal.fire({
                title: 'Are you sure?',
                html: "<b>You will delete it permanently!</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonSize: '#3085d6',
                cancelButtonSize: '#d33',
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
