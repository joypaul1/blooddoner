@extends('backend.layouts.master')
@section('title','Item List')
@section('page-header')
    <i class="fa fa-list"></i> Item List
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
       'name' => 'Create Item',
       'route' => route('backend.product.items.create')
    ])

    <form class="form-horizontal"
          method="get"
          action="{{route('backend.product.items.index')}}"
          role="form"
          enctype="multipart/form-data">
        <table class="table table-bordered">
            <tr>
                <th class="bg-dark" style="width: 22%"><label for="origin">Origin</label></th>
                <th class="bg-dark" style="width: 22%"><label for="brand">Brand</label></th>
                <th class="bg-dark" style="width: 22%"><label for="category">Category</label></th>
                <th class="bg-dark" style="width: 22%"><label for="name">Name</label></th>
                <th class="bg-dark" style="width: 12%;">Actions</th>
            </tr>
            <tr>
                <td>
                    <select class="chosen-select" id="origin" name="origin">
                        <option value="">- Origin -</option>
                        @foreach($origins as $origin)
                            <option value="{{ $origin->id }}"
                                {{ request()->query('origin') == $origin->id ? 'selected' : '' }}>
                                {{ $origin->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="chosen-select" id="brand" name="brand">
                        <option value="">- Brand -</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}"
                                {{ request()->query('brand') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    @php
                        $category = request()->query('category') ?? '';
                        $catSub = explode('-', $category);
                        $subcategory = null;
                        if(count($catSub) == 2)
                        {
                            $category = $catSub[0];
                            $subcategory = $catSub[1];
                        }
                    @endphp
                    <select class="chosen-select" id="category" name="category">
                        <option value="">- Category / Subcategory -</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}"
                                    class="bolder bigger-110"
                                    style="{{$loop->first ? '' : 'margin-top: 5px'}}"
                                {{ !$subcategory && $category == $cat->id ? 'selected' : ''}}>
                                {{ $cat->title }}
                            </option>
                            @foreach($cat->sub_categories as $sub)
                                <option value="{{ $cat->id . '-' . $sub->id }}"
                                        style="border-top: 1px solid #eee"
                                    {{ $subcategory == $sub->id ? 'selected' : ''}}>
                                    {{ $sub->title }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text"
                           id="name"
                           name="name"
                           placeholder="Name"
                           value="{{request()->query('name')}}"
                           class="input-sm form-control text-center">
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

    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th class="bg-dark" style="width: 4%">SL</th>
                <th class="bg-dark" style="width: 14%">Name</th>
                <th class="bg-dark" style="width: 14%">Origin</th>
                <th class="bg-dark" style="width: 14%">Brand</th>
                <th class="bg-dark" style="width: 14%">Category</th>
                <th class="bg-dark" style="width: 14%">Slug</th>
                <th class="bg-dark" style="width: 14%">Image</th>
                <th class="bg-dark" style="width: 12%">Action</th>
            </tr>
            @forelse($items as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->origin->name??'' }}</td>
                    <td>{{ $item->brand->name??'' }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        <img src="{{ asset($item->feature_image) }}"
                             height="30"
                             width="120"
                             alt="No Image">
                    </td>
                    <td>
                        <div class="btn-group btn-group-mini btn-corner">
                            <a href="{{ route('backend.product.items.edit', $item->id) }}"
                               class="btn btn-xs btn-info"
                               title="Edit">
                                <i class="ace-icon fa fa-pencil"></i>
                            </a>

                            <button type="button" class="btn btn-xs btn-danger"
                                    onclick="delete_check({{$item->id}})"
                                    title="Delete">
                                <i class="ace-icon fa fa-trash-o"></i>
                            </button>
                        </div>
                        <form action="{{ route('backend.product.items.destroy', $item->id)}}"
                              id="deleteCheck_{{ $item->id }}" method="GET">
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No data available in table</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    @include('backend.partials._paginate', ['data' => $items])
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
                        // $this.next().css({'width': $this.parent().width()});
                    })
                }).trigger('resize.chosen');
            }
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
