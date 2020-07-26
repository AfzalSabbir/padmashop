@extends('backend.layouts.master')

@section('fav_title', 'Edit Product')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-archive"></i> {{ __('backend/product.product_management') }}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">{{ __('backend/product.product') }}</a></li>
            <li class="breadcrumb-item active">{{ __('backend/default.add_new') }}</li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><h2><i class="fa fa-pencil-square"></i> {{ __('backend/product.product') }}</h2></div>
                        <div class="col-md-6"><a href="{{ route('admin.product.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('backend/default.list') }}</a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="card-body">
                    @include('backend.partials.error_message')
                    <form id="productForm" action="{{ route('admin.product.update', $product->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{--<input type="hidden" name="url" value="{{ url('/') }}">--}}
                        <div class="form-row">
                            <div class="col-md-3 form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $product->title }}" required placeholder="" required>
                            </div>

                            <div class="col-md-3 form-group">
                                <label for="category_id">Category </label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option disabled>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->title_en }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 form-group">
                                <label for="sub_category_id">Category </label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control">
                                    <option disabled>Select Sub Category</option>
                                    @foreach($subcategories as $sub_category)
                                        <option value="{{ $sub_category->id }}" {{ $product->sub_category_id == $sub_category->id ? 'selected' : '' }}>{{ $sub_category->title_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="brand_id">Brand </label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option selected disabled>Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->title_en }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3 form-group">
                                <label for="brand_id">Brand </label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option selected disabled>Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->title_en }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="col-md-3 form-group">
                                <label for="color_id">Color </label>
                                <select name="color_id[]" id="color_id" class="form-control" multiple>
                                    <option disabled>Select Color</option>
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }}"
                                                @php 
                                                    if($product->color_id){
                                                        $product_colors = json_decode($product->color_id);
                                                        foreach($product_colors as $product_color){
                                                            $product_color == $color->id ? 'selected' : '';
                                                        }
                                                    } 
                                                @endphp
                                                 >{{ $color->title }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            {{-- <div class="col-md-3 form-group">
                                <label for="size_id">Size </label>
                                <select name="size_id[]" id="size_id" class="form-control" multiple>
                                    <option disabled>Select Size</option>
                                    @foreach($sizes as $size)
                                        <option value="{{ $size->id }}"
                                                @php 
                                                    if($product->size_id){
                                                        $product_sizes = json_decode($product->size_id);
                                                        foreach($product_sizes as $product_size){
                                                            $product_size == $size->id ? 'selected' : '';
                                                        }
                                                    } 
                                                @endphp
                                        >{{ $size->title }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                        
                            <div class="col-md-3 form-group">
                                <label for="delivery">Delivery </label>
                                <input name="delivery" id="delivery" class="form-control" value="{{ $product->delivery }}">
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="product_return">Return </label>
                                <input name="product_return" id="product_return" class="form-control" value="{{ $product->product_return }}">
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="warranty">Warranty </label>
                                <input name="warranty" id="warranty" class="form-control" value="{{ $product->warranty }}">
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="warranty">Min Sales Quantity </label>
                                <input type="number" name="min_sale_quantity" value="{{ $product->min_sale_quantity }}" id="min_sale_quantity" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-2 form-group">
                                <label for="purchase_price">Purchase Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="purchase_price" id="purchase_price" value="{{ $product->purchase_price }}" required placeholder="">
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="regular_price">Regular Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="regular_price" id="regular_price" value="{{ $product->regular_price }}" required placeholder="">
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="quantity">Quantity <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $product->quantity }}" required placeholder="">
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="is_offer">Offer <span class="text-danger">*</span></label>
                                <select name="is_offer" id="is_offer" class="form-control" required>
                                    <option value="0" {{ $product->is_offer == 0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $product->is_offer == 1 ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                        
                            <div class="col-md-2 form-group">
                                <label for="warranty">D Commission </label>
                                <select class="form-control" name="d_commission">
                                    <option value="0" {{ ($product->d_commission == 0 ? "selected" : "") }}>No</option>
                                    <option value="1" {{ ($product->d_commission == 1 ? "selected" : "") }}>Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-2 form-group">
                                <label for="discount">Discount (%)</label>
                                <input type="number" class="form-control" name="discount" id="discount" value="{{ $product->discount }}" placeholder="">
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="discount_time">End Date </label>
                                <div class="input-group date" data-provide="datepicker" id="discount_time">
                                    <input type="text" name="discount_time" class="form-control" value="{{ $product->discount_time }}">
                                    <div class="input-group-addon">
                                        <span><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="unit_id">Unit </label>
                                <select name="unit_id" id="unit_id" class="form-control">
                                    <option disabled>Select Unit</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            
                            @if(\Auth::user()->is_merchant == 0)
                            <div class="col-md-2 form-group">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Deactive</option>
                                </select>
                            </div>
                            @endif
                            
                            
                            <div class="col-md-2 form-group">
                                <label for="status">Bagerhat Bazar</label>
                                <select name="product_area" id="product_area" class="form-control">
                                    <option value="general" {{ $product->product_area == "" ? 'selected' : '' }}>No</option>
                                    <option value="bagerhat" {{ $product->product_area == "bagerhat" ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                            
                            <div class="col-md-2 form-group">
                                <label for="status">Feature Product</label>
                                <select name="is_feature_product" id="is_feature_product" class="form-control">
                                    <option value="0" {{ $product->is_feature_product == 0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $product->is_feature_product == 1 ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label for="description">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="4" required>{!! $product->description !!}</textarea>
                        </div>

                        <div class="form-row" id="img">
                            <div class="col-md-6 form-group">
                                <label for="image">Photo <button type="button" id="addImage" class="btn btn-success"><i class="fa fa-plus"></i></button></label>
                                <input type="file" class="form-control" name="image[]" id="image">
                            </div>

                            <div></div>
                        </div>

                        <button type="submit" name="save_menu" class="btn btn-success float-right">{{ __('backend/default.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if($product->image)
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Product Images</div>
                    <div class="card-body">
                        <product-image-delete 
                            :images="{{ $product->image }}" 
                            :product_id="{{ $product->id }}"
                            :original_images="{{ $product->original_image }}"
                            >
                        </product-image-delete>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#category_id').select2();
            $('#sub_category_id').select2();
            $('#brand_id').select2();
            $('#size_id').select2();
            $('#color_id').select2();

            $('#discount_time').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true,
                startDate: '-0d'
            });

            $('#productForm').validate({ // initialize the plugin
                rules: {
                    title: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    }
                },
                messages: {
                    title: "{{ __('backend/default.required_validation') }}",
                    description: "{{ __('backend/default.required_validation') }}",
                    purchase_price: "{{ __('backend/default.required_validation') }}",
                    regular_price: "{{ __('backend/default.required_validation') }}",
                    quantity: "{{ __('backend/default.required_validation') }}",
                    "image[]": "{{ __('backend/default.required_validation') }}",
                    status: "{{ __('backend/default.required_validation') }}",
                }
            });

            $("#addImage").click(function(){
                var newImage = "<div class=\"col-md-6 form-group\">\n" +
                    "                                <label for=\"image\" class=\"mt-3\">Photo </label>\n" +
                    "                                <input type=\"file\" class=\"form-control\" name=\"image[]\" required>\n" +
                    "                            </div>";

                $("#img").append(newImage);
            });
        });
    </script>
@endsection
