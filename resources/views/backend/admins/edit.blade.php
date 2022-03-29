@extends('backend.layouts.master')

@section('title','Edit Admin')
@section('page-header')
    <i class="fa fa-pencil"></i> Edit Admin
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
       'name' => 'admin List',
       'route' => route('backend.admins.index')
    ])

    <div class="col-sm-9">
        <form role="form"
              method="post"
              class="form-horizontal"
              enctype="multipart/form-data"
              action="{{route('backend.admins.update', $admin->id)}}">
        @csrf

        <!-- Name -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="name">Name <sup class="red">*</sup></label>

                <div class="col-sm-4">
                    <input type="text"
                           id="name"
                           name="name"
                           placeholder="admin"
                           class="form-control"
                           required
                           value="{{$admin->name??'-'}}">
                    <strong class=" red">{{ $errors->first('name') }}</strong>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 bolder" for="email">Email <sup class="red">*</sup></label>

                <div class="col-sm-4">
                    <input type="email"
                           id="email"
                           name="email"
                           placeholder="email"
                           class="form-control"
                           required
                           value="{{$admin->email}}">
                    <strong class=" red">{{ $errors->first('email') }}</strong>
                </div>
            </div>
               <!-- designation -->
               <div class="form-group">
                <label class="col-sm-2 bolder" for="designation">Designation <sup class="red">*</sup></label>
                <div class="col-sm-4">
                    <input type="text"
                           id="designation"
                           name="designation"
                           placeholder="password"
                           value="{{$admin->designation??' '}}"
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
                           value="{{old('password_confirmation')}}">
                    <strong class="red">{{ $errors->first('password_confirmation') }}</strong>
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
                    <button class="btn btn-sm btn-success submit">
                        <i class="fa fa-save"></i> Update
                    </button>

                    <a href="{{ route('backend.admins.index') }}" class="btn btn-sm btn-gray">
                        <i class="fa fa-refresh"></i> Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-3">
        <div class="widget-box first">
            <div class="widget-header">
                <h4 class="widget-title">Uploaded Image</h4>
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
                            <img src="{{asset($admin->image)}}"
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
