@extends('backend.layouts.master')
@section('name', 'Add Category')
@section('page-header')
    <i class="fa fa-plus"></i> Add Category
@endsection

@section('content')
    @include('backend.components.page_header', [
       'fa' => 'fa fa-list',
       'name' => 'Category List',
       'route' => route('backend.product.categories.index')
    ])

    <div class="col-sm-9">
        <form role="form"
              method="post"
              class="form-horizontal"
              enctype="multipart/form-data"
              action="{{route('backend.product.categories.store')}}">
        @csrf

        <!-- name -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="name">Name <sup class="red">*</sup></label>
                <div class="col-sm-4">
                    <input type="text"
                           id="name"
                           placeholder="Category"
                           class="form-control"
                           name="name"
                           value="{{old('name')}}">
                    <strong class="red">{{ $errors->first('name') }}</strong>
                </div>
            </div>

            <!-- Display On Home -->
            <div class="form-group" style="vertical-align: middle;">
                <label class="col-sm-2 bolder" for="display_on_home" style="padding-top: 7px">Display On Home </label>

                <div class="col-sm-4">
                    <input type="checkbox" id="display_on_home" class="form-control" name="display_on_home"
                           style="width: 20px">
                    <strong class="red">{{ $errors->first('display_on_home') }}</strong>
                </div>
            </div>

            <!-- Image -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="image">Image </label>
                <div class="col-sm-4">
                    <input name="image"
                           type="file"
                           id="image"
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
                    <button class="btn btn-sm btn-success submit create-button">
                        <i class="fa fa-save"></i> Add
                    </button>

                    <a href="{{route('backend.product.categories.index')}}" class="btn btn-sm btn-gray">
                        <i class="fa fa-refresh"></i> Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
