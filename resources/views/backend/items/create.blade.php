@extends('backend.layouts.master')
@section('title', 'Add Item')
@section('page-header')
    <i class="fa fa-plus"></i> Add Item
@endsection
@push('css')
    <style>
        table th,
        td {
            text-align: center !important;
            vertical-align: middle !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endpush

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
              action="{{route('backend.product.items.store')}}">
            @csrf
            <div class="row">
                <div class="col-sm-6">

                    <!-- Name -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="name">Name <sup class="red">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="name"
                                   name="name"
                                   placeholder="Name"
                                   class="form-control input-sm"
                                   value="{{old('name')}}"
                                    required
                                   >
                            <strong class="red">{{ $errors->first('name') }}</strong>
                        </div>
                    </div>

                    {{-- sku --}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="name">SKU No. <sup class="red">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="name"
                                   name="sku"
                                   placeholder="SKU No.(#2378a)"
                                   class="form-control input-sm"
                                   value="{{old('sku')}}"
                                    required
                                   >
                            <strong class="red">{{ $errors->first('sku') }}</strong>
                        </div>
                    </div>


                    <!-- Price -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="price">Price <sup class="red">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="price"
                                   name="price"
                                   placeholder="0"
                                   class="form-control input-sm"
                                   value="{{old('price')}}" required>
                            <strong class="red">{{ $errors->first('price') }}</strong>
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="quantity">Quantity<sup class="red">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="quantity"
                                   name="quantity"
                                   placeholder="0"
                                   class="form-control input-sm"
                                   value="{{old('quantity')}}" required>
                            <strong class="red">{{ $errors->first('quantity') }}</strong>
                        </div>
                    </div>

                     <!-- Discount -->
                    <div class="form-group">
                        <label for="discount" class="col-sm-3 control-label no-padding-right">Discount
                            <label data-toggle="buttons" class="btn-group btn-group-mini btn-overlap btn-corner">
                                <label for="d1" class="btn btn-sm btn-white btn-info">
                                    <input id="d1" type="radio" value="percent" name="discount_type">
                                    <span class="bigger-110">%</span>
                                </label>
                                <label for="d2" class="btn btn-sm btn-white btn-info">
                                    <input id="d2" type="radio" value="amount" name="discount_type">
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
                                   value="{{old('discount')}}">
                            <strong class="red">{{ $errors->first('discount') }}</strong>
                            <strong class="red">{{ $errors->first('discount_type') }}</strong>
                        </div>
                    </div>

                    <!-- Category -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="category_id">Category <sup class="red">*</sup></label>

                            <div class="col-sm-8">
                                <div class="text-center">
                                    <select class="chosen-select"
                                            required
                                            id="category_id"
                                            name="category_id"
                                            data-placeholder="- Category -">
                                        <option></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <strong class=" red">{{ $errors->first('category_id') }}</strong>
                            </div>
                        </div>

                    <!-- Sub Category -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="subcategory_id">Sub Category <sup class="red">*</sup></label>

                            <div class="col-sm-8">
                                <div class="text-center">
                                    <select class="chosen-select"
                                            required
                                            id="subcategory_id"
                                            name="subcategory_id"
                                            data-placeholder="- Sub Category -">
                                        <option></option>
                                    </select>
                                </div>
                                <strong class="red">{{ $errors->first('subcategory_id') }}</strong>
                            </div>
                        </div>

                    <!-- Child Category -->

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="childcategory_id">Child Category <sup class="red">*</sup></label>
                        <div class="col-sm-8">
                            <div class="text-center">
                                <select class="chosen-select" id="childcategory_id" name="childcategory_id"  data-placeholder="- Child Category -" required>
                                   <option></option>
                                </select>
                            </div>
                            <strong class=" red">{{ $errors->first('childcategory_id') }}</strong>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="brand_id">Brand </label>
                        <div class="col-sm-8">
                            <div class="text-center">
                                <select class="chosen-select" id="brand_id" name="brand_id">
                                    <option value="">- Brand -</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{old('brand_id') == $brand->id ? 'selected' : ''}}>{{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <strong class=" red">{{ $errors->first('brand_id') }}</strong>
                        </div>
                    </div>

                    {{-- best seller --}}
                    <div class="form-group" style="vertical-align: middle;">
                        <label class="col-sm-3 control-label no-padding-right" for="special_offer" style="padding-top: 7px;cursor:pointer">Best Selling </label>
                        <div class="col-sm-1">
                            <input type="checkbox" id="special_offer" class="form-control" name="best_selling" style="width: 20px;cursor:pointer">
                            <strong class="red"></strong>
                        </div>
                    </div>
                                         <!-- Description -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="x">Description</label>

                        <div class="col-sm-9">
                            <input id="x" type="hidden" name="description">
                            <trix-editor input="x" style="height: 250px"></trix-editor>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <!-- Feature Image -->
                    <div class="form-group">
                        <label class="col-sm-offset-1 col-sm-3 control-label no-padding-right" for="feature_image">Feature Image
                        </label>
                        <div class="col-sm-8">
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

                    <!-- Images -->
                    <div class="form-group image_wrapper">
                        <label class="col-sm-offset-1 col-sm-3 control-label no-padding-right" for="image">Item Images</label>
                        <div class="col-sm-7">
                                <input type="file"
                                    id="image"
                                    name="images[]"
                                    placeholder="0"
                                    class="form-control input-sm"
                                    value="{{old('size')}}">
                                <strong class="red">{{ $errors->first('size') }}</strong>
                        </div>
                        <div class="col-sm-1" >
                            <div class="align-text-bottom d-block">
                                <a href="javascript:void(0);" class="image_button" title="Add field">
                                    <i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 20px;align-items: center;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-10" id="imageappend"></div>
                        {{--size --}}
                        <div class="form-group">
                            <label class="col-sm-offset-1 col-sm-3 control-label no-padding-right" for="size_ids">Sizes</label>
                            <div class="col-md-7">
                                <div class="text-center">
                                    <select class="chosen-select"
                                            multiple
                                            id="size_ids"
                                            name="size_ids[]"
                                            data-placeholder="Select sizes">
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}"
                                                {{ in_array($size->id, old('size_ids') ?? []) ? 'selected' : ''}}>
                                                {{ $size->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <strong class="red">{{ $errors->first('size_ids') }}</strong>
                            </div>
                        </div>
                        {{-- color --}}
                        <div class="form-group">
                            <label class="col-sm-offset-1 col-sm-3 control-label no-padding-right" for="color_ids">Colors<sup class="red">*</sup></label>
                            <div class="col-sm-7">
                                <div class="text-center">
                                    <select class="chosen-select"
                                            multiple
                                            id="color_ids"
                                            name="color_ids[]"
                                            data-placeholder="Select sizes">
                                        @foreach($colors as $color)
                                            <option value="{{ $color->id }}"
                                                {{ in_array($color->id, old('color_ids') ?? []) ? 'selected' : ''}}>
                                                {{ $color->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <strong class="red">{{ $errors->first('color_ids') }}</strong>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-sm btn-success">Save</button>
                <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
            </div>
        </form>
    </div>
@endsection



@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous"></script>
 <script type="text/javascript">

         function chosen_trigger() {
            if (!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect: true, search_contains: true});
                $(window).on('resize.chosen', function () {
                    $('.chosen-select').each(function () {
                        let $this = $(this);
                        $this.next().css({'width': '100%'});
                    })
                }).trigger('resize.chosen');
            } else {
                $('.chosen-select').css('width', '100%');
            }
        }

        const category          = $('#category_id');
        const subcategory       = $('#subcategory_id');
        const childcategory     = $('#childcategory_id');

        function disableCategories(flag) {
            category.prop("disabled", flag);
            subcategory.prop("disabled", flag);
            childcategory.prop("disabled", flag);

            category.trigger('chosen:updated');
            subcategory.trigger('chosen:updated');
            childcategory.trigger('chosen:updated');
        }

        jQuery(function($){
            chosen_trigger();
            category.change(function(){
                disableCategories(true);
                let category_id = $('#category_id').val();
                category_id     = category_id ? category_id:0;
                $.get("{{ route('backend.product.sub_categories.ajax.list', ':id') }}".replace(':id', category_id),null,
                    function(data){
                        subcategory
                            .empty()
                            .append(new Option('', ''));

                        childcategory
                            .empty()
                            .append(new Option('', ''));

                        data.forEach(function (sub) {
                            subcategory.append(new Option(sub.name, sub.id));
                        });
                        disableCategories(false);
                    });
            });

            subcategory.change(function(){
                disableCategories(true);
                let subcategory_id = $('#subcategory_id').val();
                subcategory_id     = subcategory_id ? subcategory_id : 0;
                $.get("{{ route('backend.product.child_categories.ajax.list',':id') }}".replace(':id' , subcategory_id),null,
                    function(data){
                        childcategory
                            .empty()
                            .append(new Option('', ''));

                        data.forEach(function(child){
                            childcategory
                            .append(new Option(child.name, child.id));
                        });

                        disableCategories(false);
                    });
            })
        })

</script>
<script type="text/javascript">
        var maxField    = 5; //Input fields increment limitation
        var colorButton = $('.color_button'); //Add button selector
        var sizeButton  = $('.size_button'); //Add button selector
        var imageButton  = $('.image_button'); //Add button selector
        var wrapper     = $('.color_wrapper'); //Input field wrapper
        var colorHTML   = `<div class="form-group color_wrapper">
                            <label class="col-sm-offset-1 col-sm-3 control-label no-padding-right" for="Color"> </label>
                            <div class="col-sm-7">
                                <input type="text"
                                    id="color"
                                    name="color[]"
                                    placeholder="0"
                                    class="form-control input-sm"
                                    value="{{old('price')}}">
                                <strong class="red">{{ $errors->first('color') }}</strong>
                            </div>
                            <div class="col-sm-1" >
                                <div class="align-text-bottom d-block">
                                    <i class="fa fa-minus-circle text-danger" aria-hidden="true" onclick="removeColor(this)"  style="font-size: 20px;align-items: center;"></i>
                                </div>
                            </div>
                            </div>`; //New input field html

        let sizeHTML    = `<div class="form-group size_wrapper">
                                <label class="col-sm-offset-1 col-sm-3 control-label no-padding-right" for="size"> </label>
                                <div class="col-sm-7">
                                        <input type="text"
                                            id="size"
                                            name="size[]"
                                            placeholder="0"
                                            class="form-control input-sm"
                                            value="{{old('size')}}">
                                        <strong class="red">{{ $errors->first('size') }}</strong>
                                </div>
                                <div class="col-sm-1" >
                                    <div class="align-text-bottom d-block">
                                            <i class="fa fa-minus-circle text-danger" aria-hidden="true" onclick="removeSize(this)" style="font-size: 20px;align-items: center;"></i>
                                    </div>
                                </div>
                            </div>`; //New input field html
        let imageHTML   = `<div class="form-group image_wrapper">
                                <label class="col-sm-offset-1 col-sm-3 control-label no-padding-right" for="image"></label>
                                <div class="col-sm-7">
                                        <input type="file"
                                            id="image"
                                            name="images[]"
                                            placeholder="0"
                                            class="form-control input-sm"
                                            value="{{old('size')}}">
                                        <strong class="red">{{ $errors->first('size') }}</strong>
                                </div>
                                <div class="col-sm-1" >
                                    <div class="align-text-bottom d-block">
                                        <i class="fa fa-minus-circle text-danger" aria-hidden="true" onclick="removeImage(this)" style="font-size: 20px;align-items: center;"></i>
                                    </div>
                                </div>
                            </div>`;

        //Once add button is clicked
        $(colorButton).click(function(){
            if($('.color_wrapper').length < 5){
                $('#colorappend').append(colorHTML);
            }
        });
        $(sizeButton).click(function(){
            if($('.size_wrapper').length < 5){
                $('#sizeappend').append(sizeHTML);
            }
        });

        $(imageButton).click(function(){
            $('#imageappend').append(imageHTML);
        });


        function removeColor(object)
        {
            $(object).closest('.color_wrapper').remove()
        }
        function removeSize(object)
        {
            $(object).closest('.size_wrapper').remove()
        }

        function removeImage(object)
        {
            $(object).closest('.image_wrapper').remove()
        }
</script>


@endpush
