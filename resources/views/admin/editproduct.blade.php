@extends('admin.masteradmin')
@section('content')
<div class="main-body" style="background: #fff">
    <div class="page-wrapper">
        <div class="row" style="margin-left:10px">
            <!-- [ Main Content ] start -->
            <div class="card-block col-md-8">
                <b>Product Information</b>
                <div class="top" style="margin:2%"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{route('update.product',$product->id)}}" id="FormID" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row ">
                                <label class="col-sm-2 control-label require">Item Name<span class="text-danger">*</span></label>

                                <div class="col-sm-8 pl-sm-3-custom">
                                    <input type="text" class="form-control error" placeholder="Item Name" name="name" id="item_name" value="{{$product->name}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group row ">
                                        <label class="col-sm-5 col-form-label require pr-0">Item ID<span class="text-danger">*</span></label>

                                        <div class="col-sm-7 pl-md-2">
                                            <input type="text" class="form-control error" placeholder="Item ID" name="item_id" id="item_id" value="{{$product->item_id}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group row ">
                                        <label class="col-sm-5 col-form-label pr-0">HSN/SAC</label>
                                        <div class="col-sm-7 pl-md-2">
                                            <input type="text" class="form-control" placeholder="HSN/SAC" name="hsn" id="hsn" value="{{$product->hsn}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group row ">
                                        <label class="col-sm-5 col-form-label pr-0">Item Type</label>
                                        <div class="col-sm-7 pl-md-2">
                                            <select name="item_type_id" class="form-control select2 select2-hidden-accessible" id="itemType" data-select2-id="itemType" tabindex="-1" aria-hidden="true">
                                                @foreach($itemTypes as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group row ">
                                        <label class="col-sm-5 col-form-label pr-0">Category</label>
                                        <div class="col-sm-7 pl-md-2">
                                            <select name="category_id" class="form-control select2 select2-hidden-accessible valid" id="category_id" data-select2-id="category_id" tabindex="-1" aria-hidden="true">
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group row ">
                                        <label class="col-sm-5 col-form-label pr-0">Units</label>
                                        <div class="col-sm-7 pl-md-2">
                                            <select name="unit_id" class="form-control select2 select2-hidden-accessible valid" id="units" data-select2-id="units" tabindex="-1" aria-hidden="true">
                                                @foreach($units as $unit)
                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label pr-0">Tax Type</label>
                                        <div class="col-sm-7 pl-md-2">
                                            <select name="tax_type_id" class="form-control select2 select2-hidden-accessible valid" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                @foreach($taxes as $tax)
                                                <option value="{{$tax->id}}">{{$tax->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Item Description</label>
                                <div class="col-sm-8 pl-sm-3-custom">
                                    <textarea class="form-control" placeholder="Item Description" name="description" id="description">{{$product->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label require">Purchase Price<span class="text-danger">*</span></label>
                                <div class="col-sm-8 pl-sm-3-custom">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control positive-float-number valid" placeholder="Purchase Price" name="purchase_price" id="purchase_price" value="{{$product->purchase_price}}">
                                    </div>
                                    <label id="purchase_price-error" class="error" for="purchase_price"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Retail Price</label>
                                <div class="col-sm-8 pl-sm-3-custom">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control positive-float-number" placeholder="Retail Price" name="retail_price" id="retail_price" value="{{$product->retail_price}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-sm-2 control-label require">Quantity<span class="text-danger">*</span></label>
                                <div class="col-sm-8 pl-sm-3-custom">
                                    <input type="number" class="form-control error" placeholder="Available quantity" name="quantity" id="quantity" value="{{$product->quantity}}">
                                </div>
                            </div>
                            <div class="form-group row mb-xs-2" style="margin-bottom: 0.25rem;">
                                <label class="col-sm-2 control-label">Picture</label>
                                <div class="custom-file col-sm-8 pl-sm-3-custom">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="item_image" id="validatedCustomFile">
                                        <label class="custom-file-label overflow-hidden" for="validatedCustomFile">Upload Photo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" id="prvw" hidden="true">
                                <div class="col-md-4 offset-md-2">
                                    <img id="blah" src="#" alt="" class="img-responsive img-thumbnail" hidden="true">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8 offset-sm-2 sm-margin-1" id="note_txt_1">
                                    <span class="badge badge-danger">Note!</span> Allowed File Extensions: jpg, png, gif, bmp
                                </div>
                            </div>
                            <div class="form-group row" id="prvw" style="display: block;">
                                <div class="col-md-4 offset-md-2">
                                    <img id="" />
                                </div>
                            </div>
                            <input type="submit" id="orderSubmit" class="btn btn-primary submitBtn" value="Update Product">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-top: 3.5%">
                <div class="form-group">
                    <div class="col-md-12 m-l-80 pl-small-0 offset-medium-custom-3">
                        <a href="" data-toggle="lightbox" data-title="Apple Watch Series 4"> <img src="{{asset('images/'.$product->item_image)}}" alt="Item Image" class="img-fluid img-thumbnail img-width-minimize-medium" sizes="(max-width: 200px) 100vw, 200px" id="blah_1"> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- [ Main Content ] end -->
<!-- Required Js -->
<script src="{{asset('dattaAble/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('dattaAble/assets/js/pcoded.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js"></script>

<script>
    $('#formID').parsley();
</script>
@endsection