@extends('layouts.app')

@section('content')

<form method="post" id="formID" action="{{route('updateOrders')}}" data-parsley-validate="">
    {{csrf_field()}}

    @php 
        $grand_total = 0; 
        $order_id = 0
    @endphp
    <div class="container">
        <table class="table">
            <thead>
                <tr class="listStyle">
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <div class="form-group">
                <div id="addCategory">
                    <tbody class="addProduct">
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
                            
                            <td><div class="total" id="total{{$odr->id}}">{{$odr->price*$odr->quantity}}</div></td>
                            <td><a type="submit" class="dltBtn"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr> 
                        @endforeach
                        <tr class="grandTotal">
                            <th colspan="3" class="text-right">Grand Total: </th>
                            <td>
                                <span class="grandTotal" id="grandTotal">{{$grand_total}}</span>
                            </td>
                            <input type="hidden" name="grand_total" id="hiddenTotal" value="{{$grand_total}}">
                            <input type="hidden" name="order_id" value="{{$order_id}}">

                        </tr>
                    </tbody>
        </table>
        <button type="submit" id="order" class="btn btn-primary submitBtn">Update Order</button>
    </div>
</form>
</div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
            var price = parseFloat($("#price"+mainID).val());
            var quantity = parseFloat($("#quantity"+mainID).val());
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