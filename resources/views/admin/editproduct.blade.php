@extends('admin.masteradmin')
@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Invoice ] start -->
            <div class="container" id="printTable">
                <div>
                    <div class="card">
                        <div class="card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form method="post" id="formID" action="{{route('update.product',$product->id)}}" data-parsley-validate="">
                                            {{csrf_field()}}

                                            <div class="products" style="width: 50%; margin-left: 25%">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Enter product name here...">
                                                </div>
                                                <div class="form-group">
                                                    <label>Available Quantity</label>
                                                    <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}" placeholder="Enter available quantity here...">
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Price</label>
                                                    <input type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="Enter price here...">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ Invoice ] end -->
                </div>
                <!-- [ Main Content ] end -->
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