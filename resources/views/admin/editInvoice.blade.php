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
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" id="formID" action="{{route('updateOrders')}}" data-parsley-validate="">
                                        {{csrf_field()}}

                                        @php
                                        $grand_total = 0;
                                        $order_id = 0
                                        @endphp
                                        <div class="table-responsive">
                                            <table class="table  invoice-detail-table">
                                                <thead>
                                                    <tr class="thead-default">
                                                        <th>Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="myTable">
                                                    @foreach($order as $odr)
                                                    @php
                                                    $grand_total = $odr->order->grand_total;
                                                    $order_id = $odr->order_id;

                                                    @endphp
                                                    <tr id="{{$odr->id}}">
                                                        <input type="hidden" name="id[]" value="{{$odr->id}}">
                                                        <input type="hidden" name="product_id[]" value="{{$odr->product_id}}">

                                                        <td>{{$odr->product->name}}</td>

                                                        <td><input type="text" style="text-align: center" class="calculate quantity data-parsley-validate positive-float-number" id="quantity{{$odr->id}}" data-parsley-trigger="keyup" data-parsley-required="true" data-parsley-type="number" name="quantity[]" value="{{$odr->quantity}}"></td>

                                                        <td><input type="text" style="text-align: center" class="calculate price data-parsley-validate positive-float-number" id="price{{$odr->id}}" data-parsley-trigger="keyup" data-parsley-required="true" data-parsley-type="number" name="price[]" value="{{$odr->price}}"></td>

                                                        <td>
                                                            <div class="total" id="total{{$odr->id}}">{{$odr->price*$odr->quantity}}</div>
                                                        </td>
                                                        <td><a type="submit" class="dltBtn"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                                    </tr>
                                                    @endforeach
                                                    <input type="hidden" name="grand_total" id="hiddenTotal" value="{{$grand_total}}">
                                                    <input type="hidden" name="order_id" value="{{$order_id}}">

                                                </tbody>
                                            </table>

                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-responsive invoice-table invoice-total">
                                        <tbody>
                                            <tr>
                                                <th>Sub Total :</th>
                                                <td>$0</td>
                                            </tr>
                                            <tr>
                                                <th>Taxes (0%) :</th>
                                                <td>$0</td>
                                            </tr>
                                            <tr>
                                                <th>Discount (0%) :</th>
                                                <td>$0</td>
                                            </tr>
                                            <tr class="text-info">
                                                <td>
                                                    <hr />
                                                    <h5 class="text-primary m-r-10">Total :</h5>
                                                </td>
                                                <td>
                                                    <hr />
                                                    <h5 class="grandTotal" id="grandTotal">{{$grand_total}}</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" id="order" class="btn btn-primary submitBtn">Update Order</button>
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

    $(document).on('click', '.dltBtn', function() {
        var trId = $(this).parent().parent().attr('id');
        $('#' + trId).hide();
        $('#' + trId).remove();
    });

    var preNumber = 0;

    $(document).on("keydown", ".positive-float-number", function() {
        preNumber = $(this).val();
        if (preNumber == "") {
            preNumber = 0;
        }
    })

    $(document).on("keyup", ".positive-float-number", function() {
        var number = $(this).val();
        $(this).val(number.replace(/[^0-9.]/g, ""));
    });

    $(document).on("keyup", ".positive-float-number", function() {
        var number = $(this).val();
        if (number.split(",").length > 2 || number.split("-").length > 1) {
            $(this).val(preNumber).trigger("keyup");
        } else {
            $(this).val(number.replace(/[^0-9.]/g, ""));
        }
    });


    function calculateTotal() {
        var total = 1;
        $('.calculate').each(function() {
            var mainID = $(this).parent().parent().attr('id');
            // var mainID = mainID.slice(3);
            var price = parseFloat($("#price" + mainID).val());
            var quantity = parseFloat($("#quantity" + mainID).val());
            total = price * quantity;
            total = total.toFixed(3);
            if (isNaN(total)) {
                total = '0.00';
                $("#total" + mainID).text(total);
                // console.log("NAN");
            } else {
                // alert(total);
                $("#total" + mainID).text(total);
                // console.log(total);

            }
        });
    }

    $(document).on('keyup', '.calculate', function() {
        calculateTotal();
        calculateGrandTotal();
    });

    function calculateGrandTotal() {
        var grandTotal = 0;
        $('.total').each(function() {
            var currentVal = parseFloat($(this).text());
            grandTotal += currentVal;
        });
        grandTotal = grandTotal.toFixed(3);
        $('#grandTotal').text(grandTotal);
        $('#hiddenTotal').val(grandTotal);
    }
</script>
@endsection