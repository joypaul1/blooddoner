@extends('backend.layouts.master')

@section('title','Edit Origin')
@section('page-header')
    <i class="fa fa-pencil"></i> Edit Origin
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
    @include('backend.components.page_header')
    <div class="col-sm-9">
        <form class="form-horizontal" method="post"
              action="{{route('backend.site_config.slider.update',$slider->id)}}"
              role="form" enctype="multipart/form-data">
        @csrf



            <!-- Image -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="image">Image
                </label>
                <div class="col-sm-4">
                    <input name="image"
                           type="file"
                           class="form-control"
                           onchange="readURL(this);">
                    <strong class="red">{{ $errors->first('image') }}</strong>
                    @if($errors->first('image'))
                        <br>
                    @endif
                   {{--  <strong class="red">Minimum 150x33 pixels</strong> --}}
                </div>
            </div>
                       <div class="form-group">
                <label class="col-sm-2 bolder" for="image">Position
                </label>
                <div class="col-sm-4">
                    <input name="position"
                           type="text"
                           value="{{ $slider->position }}"
                           id="position"
                           class="form-control"
                           >
                    <strong class="red">{{ $errors->first('position') }}</strong>
                    @if($errors->first('position'))
                        <br>
                    @endif
                    {{-- <strong class="red">Minimum 150x33 pixels</strong> --}}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 bolder" for="text_1">Text -1
                </label>
                <div class="col-sm-6">
                    <input name="text_1"
                           type="text"
                           id="text_1"
                           value="{{ $slider->text_1 }}"
                           class="form-control"
                           >
                    <strong class="red">{{ $errors->first('text_1') }}</strong>
                    @if($errors->first('text_1'))
                        <br>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 bolder" for="text_2">Text -2
                </label>
                <div class="col-sm-6">
                    <input name="text_2"
                           type="text"
                           value="{{ $slider->text_2 }}"
                           id="text_2"
                           class="form-control"
                           >
                    <strong class="red">{{ $errors->first('text_2') }}</strong>
                    @if($errors->first('text_2'))
                        <br>
                    @endif
                </div>
            </div>

            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button class="btn btn-sm btn-success submit"><i class="fa fa-save"></i> Update</button>

                    <a href="{{ route('backend.site_config.slider.index') }}" class="btn btn-sm btn-gray"> <i
                            class="fa fa-refresh"></i>
                        Cancel</a>
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
                            <img src="{{asset($slider->image)}}"
                                 width="100"
                                 height="100"
                                 class="img-responsive center-block"
                                 alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Current Image</h4>
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
                            <img id="current"
                                 src=""
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

@push('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#current')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
