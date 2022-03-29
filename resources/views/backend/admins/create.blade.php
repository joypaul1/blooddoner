@extends('backend.layouts.master')
@section('title', 'Add Admin')
@section('page-header')
    <i class="fa fa-plus"></i> Add Admin
@endsection

@section('content')
    @include('backend.components.page_header', [
       'fa' => 'fa fa-list',
       'name' => 'Admin List',
       'route' => route('backend.admins.index')
    ])

    <div class="col-sm-9">
        <form role="form"
              method="post"
              class="form-horizontal"
              enctype="multipart/form-data"
              action="{{route('backend.admins.store')}}">
        @csrf

        <!-- Name -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="name">Name <sup class="red">*</sup></label>
                <div class="col-sm-4">
                    <input type="text"
                           id="name"
                           name="name"
                           autocomplete="off"

                           placeholder="Admin"
                           class="form-control"
                           value="{{old('name')}}">
                    <strong class="red">{{ $errors->first('name') }}</strong>
                </div>
            </div>
        <!-- Name -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="email">Email <sup class="red">*</sup></label>
                <div class="col-sm-4">
                    <input type="email"
                           id="email"
                           name="email"
                           autocomplete="off"
                           placeholder="test@23498.com"
                           class="form-control"
                           value="{{old('email')}}">
                    <strong class="red">{{ $errors->first('email') }}</strong>
                </div>
            </div>
        <!-- desigination -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="designation">Designation <sup class="red">*</sup></label>
                <div class="col-sm-4">
                    <input type="text"
                           id="designation"
                           name="designation"
                           autocomplete="off"

                           placeholder="desigination"
                           class="form-control"
                           value="{{old('designation')}}">
                    <strong class="red">{{ $errors->first('designation') }}</strong>
                </div>
            </div>
            <!-- password -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="password">Password <sup class="red">*</sup></label>
                <div class="col-sm-4">
                    <input type="password"
                           id="password"
                           name="password"
                           autocomplete="off"

                           placeholder="password"
                           class="form-control"
                           value="{{old('password')}}">
                    <strong class="red">{{ $errors->first('password') }}</strong>
                </div>
            </div>
        <!-- password_confirmation -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="password_confirmation">Password Confirmation <sup class="red">*</sup></label>
                <div class="col-sm-4">
                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           placeholder="password_confirmation"
                           class="form-control"
                           autocomplete="off"
                           value="{{old('password_confirmation')}}">
                    <strong class="red">{{ $errors->first('password_confirmation') }}</strong>
                </div>
            </div>


            <!-- Image -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="image">Image</label>
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

                    <a href="{{route('backend.admins.index')}}" class="btn btn-sm btn-gray">
                        <i class="fa fa-refresh"></i> Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
