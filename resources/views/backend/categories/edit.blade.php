@extends('backend.layouts.master')

@section('name','Edit Category')
@section('page-header')
    <i class="fa fa-pencil"></i> Edit Category
@stop
@push('css')
    <style>
        @media only screen and (min-width: 768px) {
            .widget-box.first {
                margin-top: 0 !important;
            }
        }
    </style>
@endpush

@section('content')
    @include('backend.components.page_header', [
       'fa' => 'fa fa-list',
       'name' => 'Category List',
       'route' => route('backend.product.categories.index')
    ])

    <div class="col-sm-9">
        <form class="form-horizontal" method="post"
              action="{{route('backend.product.categories.update', $category->id)}}"
              role="form" enctype="multipart/form-data">
        @csrf

        <!-- name -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="name">Name <sup class="red">*</sup></label>

                <div class="col-sm-4">
                    <input type="text" id="name" placeholder="Category" class="form-control" name="name"
                           value="{{$category->name}}">
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <strong class=" red">{{ $errors->first('name') }}</strong>
                </div>
            </div>

            <!-- Display On Home -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="display_on_home">Display On Home </label>

                <div class="col-sm-4">
                    <input type="checkbox" id="display_on_home" class="form-control" name="display_on_home"
                           style="width: 20px" {{ $category->display_on_home ? 'checked' : '' }}>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <strong class="control-label red">{{ $errors->first('display_on_home') }}</strong>
                </div>
            </div>

            <!-- Image -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="image">Image </label>
                <div class="col-sm-4">
                    <input name="image"
                           type="file"
                           class="form-control single-file">
                    @error('image')
                    <strong class="red">{{ $message }}</strong>
                    <br>
                    @enderror
                    <strong class="text-primary">Minimum 100x100 pixels</strong>
                </div>
            </div>

            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button class="btn btn-sm btn-success submit"><i class="fa fa-save"></i> Update</button>

                    <a href="{{ route('backend.product.categories.index') }}" class="btn btn-sm btn-gray"> <i
                            class="fa fa-refresh"></i>
                        Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-3">
        <div class="widget-box first">
            <div class="widget-header">
                <h4 class="widget-name">Uploaded Image</h4>
                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body"
                 style="display:flex; align-items: center; justify-content: center; height:100px;">
                <div class="widget-main">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <img src="{{asset($category->image)}}"
                                 width="100"
                                 height="100"
                                 class="img-responsive center-block"
                                 alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
