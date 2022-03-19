@extends('backend.layouts.master')
@section('title', 'Add Unit')
@section('page-header')
    <i class="fa fa-plus"></i> Edit Division
@endsection

@section('content')
    @include('backend.components.page_header', [
       'fa' => 'fas fa-edit',
       'name' => 'Division List',
       'route' => route('backend.area.index')
    ])

    <div class="col-sm-9">
        <form role="form"
              method="post"
              class="form-horizontal"
              enctype="multipart/form-data"
             
              action="{{ route('backend.area.division.update', $division->id) }}"
        >
        @csrf

        <!-- Name -->
            <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right" for="name">Name <sup class="red">*</sup></label>

                <div class="col-sm-4">
                    <input type="text"
                           id="name"
                           name="name"
                           placeholder="Division Name"
                           class="form-control input-sm"
                           value="{{ $division->name }}">
                    {{--                    <strong class="red">{{ $errors->first('name') }}</strong>--}}
                </div>
            </div>

            <!-- Conversion -->

            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button class="btn btn-sm btn-success submit create-button">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
