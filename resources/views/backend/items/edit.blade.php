@extends('backend.layouts.master')
@section('title','Edit Item')
@section('page-header')
    <i class="fa fa-pencil"></i> Edit Item
@stop

@section('content')
    @include('backend.components.page_header', [
       'fa' => 'fa fa-list',
       'name' => 'Item List',
       'route' => route('backend.product.items.index')
    ])

    <div class="col-sm-12">
        <form role="form"
              method="post"
              class="form-horizontal"
              enctype="multipart/form-data"
              action="{{route('backend.product.items.update', $item->id)}}">
            @csrf
            <div class="row">
                <div class="col-sm-6">

                    <!-- Name -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="name">Name <sup class="red">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="name"
                                   name="name"
                                   placeholder="Name"
                                   class="form-control input-sm"
                                   value="{{$item->name}}">
                            <strong class="red">{{ $errors->first('name') }}</strong>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="price">Price <sup class="red">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="price"
                                   name="price"
                                   placeholder="0"
                                   class="form-control input-sm"
                                   value="{{$item->price}}">
                            <strong class="red">{{ $errors->first('price') }}</strong>
                        </div>
                    </div>

                    <!-- Discount -->
                    <div class="form-group">
                        <label for="discount" class="col-sm-3 bolder">Discount
                            <label data-toggle="buttons" class="btn-group btn-group-mini btn-overlap btn-corner">
                                <label for="d1"
                                       class="btn btn-sm btn-white btn-info {{$item->discount_type == 'percent' ? 'active' : ''}}">
                                    <input id="d1"
                                           type="radio"
                                           value="percent"
                                           name="discount_type"
                                           {{$item->discount_type == 'percent' ? 'checked' : ''}}>
                                    <span class="bigger-110">%</span>
                                </label>
                                <label for="d2"
                                       class="btn btn-sm btn-white btn-info {{$item->discount_type == 'amount' ? 'active' : ''}}">
                                    <input id="d2"
                                           type="radio"
                                           value="amount"
                                           name="discount_type" {{$item->discount_type == 'amount' ? 'checked' : ''}}>
                                    <span class="bigger-110">$</span>
                                </label>
                            </label>
                        </label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="discount"
                                   name="discount"
                                   placeholder="0"
                                   class="form-control input-sm"
                                   value="{{$item->discount}}">
                            <strong class="red">{{ $errors->first('discount') }}</strong>
                            <strong class="red">{{ $errors->first('discount_type') }}</strong>
                        </div>
                    </div>

                    <!-- Opening Balance -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="opening_balance">Opening Balance<sup class="red">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="opening_balance"
                                   name="opening_balance"
                                   placeholder="0"
                                   class="form-control input-sm"
                                   value="{{$item->opening_balance}}">
                            <strong class="red">{{ $errors->first('opening_balance') }}</strong>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="category_id">Category <sup class="red">*</sup></label>

                        <div class="col-sm-8">
                            <div class="text-center">
                                <select class="chosen-select" id="category_id" name="category_id">
                                    <option value="">- Category / Subcategory -</option>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}"
                                            class="bolder bigger-110"
                                            style="{{$loop->first ? '' : 'margin-top: 5px'}}"
                                            {{ !$item->subcategory_id && $item->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>

                                        @foreach($category->sub_categories as $subCategory)
                                            <option
                                                value="{{ $category->id . '-' . $subCategory->id }}"
                                                style="border-top: 1px solid #eee"
                                                {{ $item->subcategory_id  == $subCategory->id ? 'selected' : '' }}>
                                                {{ $subCategory->title }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <strong class=" red">{{ $errors->first('category_id') }}</strong>
                        </div>
                    </div>

                    <!-- Unit -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="unit_id">Unit <sup class="red">*</sup></label>

                        <div class="col-sm-8">
                            <div class="text-center">
                                <select class="chosen-select" id="unit_id" name="unit_id">
                                    <option value="">- Unit -</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{$item->unit_id == $unit->id ? 'selected' : ''}}>{{ $unit->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <strong class=" red">{{ $errors->first('unit_id') }}</strong>
                        </div>
                    </div>

                    <!-- Origin -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="origin_id">Origin <sup class="red">*</sup></label>

                        <div class="col-sm-8">
                            <div class="text-center">
                                <select class="chosen-select" id="origin_id" name="origin_id">
                                    <option value="">- Origin -</option>
                                    @foreach($origins as $origin)
                                        <option value="{{ $origin->id }}"
                                            {{$item->origin_id == $origin->id ? 'selected' : ''}}>{{ $origin->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <strong class=" red">{{ $errors->first('origin_id') }}</strong>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="brand_id">Brand <sup class="red">*</sup></label>

                        <div class="col-sm-8">
                            <div class="text-center">
                                <select class="chosen-select" id="brand_id" name="brand_id">
                                    <option value="">- Brand -</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{$item->brand_id == $brand->id ? 'selected' : ''}}>{{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <strong class=" red">{{ $errors->first('brand_id') }}</strong>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button class="btn btn-sm btn-success submit create-button">
                                <i class="fa fa-save"></i> Update
                            </button>

                            <a href="{{route('backend.product.items.index')}}" class="btn btn-sm btn-gray">
                                <i class="fa fa-refresh"></i> Cancel</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <!-- !Feature Image -->
                    @if(!$item->feature_image)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-sm-2 bolder" for="feature_image">Feature Image </label>
                                    <div class="col-sm-10">
                                        <input name="feature_image"
                                               type="file"
                                               id="feature_image"
                                               class="form-control input-sm single-file">

                                        <strong class="text-primary">Minimum 100x100 pixels</strong>
                                        @error('feature_image')
                                        <br>
                                        <strong class="red">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($item->feature_image || $item->images->count())
                        <div class="row">
                            <label class="col-sm-2 bolder">Uploaded Images </label>
                            <div class="col-sm-10">
                                <ul class="ace-thumbnails clearfix">
                                    <!-- Feature Image -->
                                    @if($item->feature_image)
                                        <li>
                                            <a data-rel="colorbox"
                                               title="Minimum 100x100 pixels"
                                               href="#"
                                               onclick="$('.custom-image-update.feature-image').click()">
                                                <img src="{{asset($item->feature_image)}}"
                                                     width="100"
                                                     height="100"
                                                     alt="Feature image"/>
                                            </a>

                                            <div class="tags">
                                              <span class="label-holder">
                                                <span class="label label-primary">Feature Image</span>
                                              </span>
                                            </div>

                                            <div class="tools tools-bottom text-center">
                                                <div class="btn-group btn-group-minier btn-corner">
                                                    <a href="{{route('backend.product.items.delete.feature-image', $item->id)}}"
                                                       class="btn btn-danger">
                                                        <i class="ace-icon fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif

                                <!-- Images -->
                                    @foreach($item->images as $image)
                                        @php
                                            $image_params = ['item_id'=>$item->id,'image_id'=>$image->id];
                                        @endphp
                                        <li>
                                            <a data-rel="colorbox"
                                               title="Minimum 100x100 pixels"
                                               onclick="$('.custom-image-update.{{$image->id}}').click()">
                                                <img src="{{asset($image->path)}}"
                                                     width="100"
                                                     height="100"
                                                     alt="Item image"/>
                                            </a>

                                            <div class="tags">
                                              <span class="label-holder">
                                                <span class="label label-warning">Item Image</span>
                                              </span>
                                            </div>

                                            <div class="tools tools-bottom text-center">
                                                <div class="btn-group btn-group-minier btn-corner">
                                                    <a href="{{route('backend.product.items.delete.other-image', $image_params)}}"
                                                       class="btn btn-danger">
                                                        <i class="ace-icon fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-12">
                            <!-- More Images -->
                            <div class="form-group">
                                <label for="images" class="bolder col-sm-2">Add Item Images</label>
                                <div class="col-sm-10">
                                    <input name="images[]"
                                           multiple
                                           type="file"
                                           id="images"
                                           class="form-control input-sm multiple-file">

                                    <strong class="text-info">Minimum 100x100 pixels</strong>
                                    @error('images.*')
                                    <br>
                                    <strong class="red">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Hidden forms -->
        <form action="{{route('backend.product.items.change.feature-image',$item->id)}}"
              method="post"
              style="display: none"
              enctype="multipart/form-data">
            @csrf
            <input name="feature_image"
                   type="file"
                   class="custom-image-update feature-image"
                   style="display: none">
        </form>

        @foreach($item->images as $image)
            @php
                $image_params = ['item_id'=>$item->id,'image_id'=>$image->id];
            @endphp
            <form action="{{route('backend.product.items.change.other-image',$image_params)}}"
                  method="post"
                  style="display: none"
                  enctype="multipart/form-data">
                @csrf
                <input name="image"
                       type="file"
                       class="custom-image-update {{$image->id}}"
                       style="display: none">
            </form>
        @endforeach
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
            $('input[type=file].custom-image-update').change(function () {
                $(this).closest('form').submit();
            });
        });
    </script>
@endpush
