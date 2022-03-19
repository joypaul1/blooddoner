@extends('backend.layouts.master')

@section('name','Add Subcategory')
@section('page-header')
    <i class="fa fa-plus-circle"></i> Add Subcategory
@stop

@section('content')
    @include('backend.components.page_header', [
       'fa' => 'fa fa-list',
       'name' => 'Subcategory List',
       'route' => route('backend.product.sub_categories.index')
    ])

    <div class="col-sm-12">
        <form class="form-horizontal"
              method="post"
              action="{{route('backend.product.sub_categories.store')}}"
              role="form"
              enctype="multipart/form-data">
        @csrf

        <!-- name -->
            <div class="form-group">
                <label class="col-sm-1 bolder" for="name">Name <sup class="red">*</sup></label>

                <div class="col-sm-3">
                    <input type="text"
                           id="name"
                           placeholder="name"
                           class="form-control"
                           name="name"
                           value="{{old('name')}}">
                    <strong class=" red">{{ $errors->first('name') }}</strong>
                </div>
            </div>

            <!-- Parent -->
            <div class="form-group">
                <label class="col-sm-1 bolder" for="category_id">Parent <sup class="red">*</sup></label>

                <div class="col-sm-3">
                    <div class="text-center">
                        <select class="chosen-select" id="category_id" name="category_id">
                            <option value="">- Select Category -</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{old('category_id') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <strong class=" red">{{ $errors->first('category_id') }}</strong>
                </div>
            </div>

            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-3">
                    <button class="btn btn-sm btn-success submit"><i class="fa fa-save"></i> Add</button>

                    <a href="{{route('backend.product.sub_categories.index')}}" class="btn btn-sm btn-gray"> <i
                            class="fa fa-refresh"></i>
                        Cancel</a>
                </div>
            </div>
        </form>
    </div>
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
    </script>
@endpush
