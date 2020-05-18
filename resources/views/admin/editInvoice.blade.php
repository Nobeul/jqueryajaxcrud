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
                                <span class="">Search Product</span>
                                <input type="text" name="search" id="search" class="form-control" style="width: 200px" placeholder="Search here..." />
                            </div>

                            <div id="countryList">
                            </div>
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
                                                        <th>Tax</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="myTable" class="addProduct">
                                                    @foreach($order as $odr)
                                                    @php
                                                    $grand_total = $odr->order->grand_total;
                                                    $order_id = $odr->order_id;

                                                    @endphp
                                                    <tr id="tr-{{$odr->product_id}}" data-rel="{{$odr->product_id}}" class="tblcls">
                                                        <input type="hidden" name="id[]" value="{{$odr->id}}">
                                                        <input type="hidden" name="order_id" value="{{$odr->order->id}}">
                                                        <input type="hidden" name="product_id[]" value="{{$odr->product_id}}">

                                                        <td>{{$odr->product->name}}</td>

                                                        <td>
                                                            <input type="text" style="text-align: center" class="calculate quantity data-parsley-validate positive-float-number" id="qt-{{$odr->product_id}}" data-parsley-trigger="keyup" data-parsley-required="true" data-parsley-type="number" name="quantity[]" value="{{$odr->quantity}}">
                                                        </td>

                                                        <td>
                                                            <input type="text" style="text-align: center" class="calculate price data-parsley-validate positive-float-number" id="pr-{{$odr->product_id}}" data-parsley-trigger="keyup" data-parsley-required="true" data-parsley-type="number" name="price[]" value="{{$odr->product->retail_price}}">
                                                        </td>

                                                        <td>
                                                            <select id="selectTax" class="taxField" style="height:28px">
                                                                <option value="1" selected hidden>Nothing Selected</option>
                                                                <option value="2">Tax Exempt(0.00)</option>
                                                                <option value="3">Sales Tax(15.00)</option>
                                                                <option value="4">Purchases Tax(15.00)</option>
                                                                <option value="5">Normal(5.00)</option>
                                                                <option value="6">Paypal(3.5)(3.50)</option>
                                                                <option value="7">Paypal(4.5)(4.50)</option>
                                                            </select>
                                                        </td>

                                                        <td>
                                                            <div class="total" id="total-{{$odr->product_id}}">{{$odr->product->price*$odr->quantity}}</div>
                                                        </td>
                                                        <td>
                                                            <a type="submit" class="dltBtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <input type="hidden" name="grand_total" id="hiddenTotal" value="{{$grand_total}}">
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-responsive invoice-table invoice-total" style="padding-right: 8%">
                                        <tbody class="taxInputs">
                                            <tr>
                                                <th>Other Discounts :</th>
                                                <td><input type="text" style="margin-left: 8px" class="optionField positive-float-number"></td>
                                                <td>
                                                    <select id="selectOption" class="optionField" style="height:28px">
                                                        <option value="1" class="percent" selected>%</option>
                                                        <option value="2" class="dollar">$</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <span class="symbol">$</span>
                                                    <span type="text" readonly="readonly" class="discount">0.00</span>
                                                </td>
                                            </tr>
                                            <tr class="shipment" id="s1">
                                                <th>shipping :</th>
                                                <td colspan="2"><input type="text" style="margin-left: 8px; width:220px" class="shipping positive-float-number"></td>
                                                <td>
                                                    <span class="symbol">$</span>
                                                    <span type="text" readonly="readonly" class="shippingAmount">0.00</span>
                                                </td>
                                            </tr>
                                            <tr class="text-info">
                                                <td>
                                                    <hr />
                                                </td>
                                                <td>
                                                    <hr />
                                                </td>
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
    var list_id = [];
    var i = 1;
    var quantity_id = [];
    var backend_list_id = [];

    function addingProduct(e) {
        var test = $(e).attr("id");
        $('.tblcls').each(function() {
            var rel = $(this).attr("data-rel");
            var inArr = $.inArray(rel, backend_list_id);
            if (inArr == -1) {
                backend_list_id.push(rel);
            }
        });
        var list = $.inArray(test, list_id);
        var backend_list = $.inArray(test, backend_list_id);
        // console.log(list);
        // console.log(backend_list);

        if (backend_list != -1) {
            var dataRel = parseFloat($('#qt-' + test).val());
            if (isNaN(dataRel)) {
                $('#qt-' + test).val(1);
            } else {
                dataRel = dataRel + 1;
                $('#qt-' + test).val(dataRel);
            }
        } else if ((list == -1)) {
            list_id.push(test);
            $.ajax({
                url: "{{ route('products.addProduct') }}",
                method: "POST",
                data: {
                    "id": test,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(response) {
                    var product = response;
                    // var row = 0;
                    // console.log(product);
                    var total = product.quantity * product.price;
                    var html = ''
                    html += '<tr id = "tr-' + product.id + '" name="new">'
                    // html += '<input type="hidden" name="id[]"  value = "' + <?php echo $odr->id ?> + '"/>'

                    html += '<input type="hidden" name="p_id[]"  value = "' + product.id + '"/>'
                    html += '<td><div">' + product.name + '</div></td>'
                    html += '<td><input type="text" class="inputAutocomplete calculate positive-float-number quantity errorChecking" required data-parsley-validate data-parsley-trigger="keyup" data-parsley-type="number" data-rel="' + product.id + '" id = "qt-' + product.id + '"  name="qty[]" value = "1"/>'
                    html += '<td><input type="text" class="inputAutocomplete calculate positive-float-number price errorChecking" required data-parsley-validate data-parsley-trigger="keyup" data-parsley-type="number" data-rel="' + product.id + '" id = "pr-' + product.id + '"  name="prc[]"  value = "' + product.price + '"/>'
                    html += '<td><select id = "selectTax" class = "taxField" style = "height:28px">'
                    html += '<option value = "1" selected hidden > Nothing Selected </option>'
                    html += '<option value = "1" selected hidden > Nothing Selected </option>'
                    html += '<option value = "2" > Tax Exempt(0.00) </option>'
                    html += '<option value = "3" > Sales Tax(15.00) </option>'
                    html += '<option value = "4" > Purchases Tax(15.00) </option>'
                    html += '<option value = "5" > Normal(5.00) </option>'
                    html += '<option value = "6" > Paypal(3.5)(3.50) </option>'
                    html += '<option value = "7" > Paypal(4.5)(4.50) </option>'
                    html += '</select></td>'
                    html += '<td><div class="inputAutocomplete total" style="width:70px; max-width: 70px" id = "total-' + product.id + '" name="total[]">' + 1 * product.retail_price + '</div></td>'
                    html += '<td><span class="dltBtn"><i class="fa fa-trash" aria-hidden="true"></i></span></td>'
                    html += '</tr>';
                    $('.addProduct').append(html);
                    $('.quantity').each(function() {
                        var quantityid = $(this).attr('data-rel');
                        quantity_id.push(quantityid);
                        // console.log(quantity_id);
                        calculateGrandTotal();

                    });
                }

            });

        } else {

            var dataRel = parseFloat($('#qt-' + test).val());
            if (isNaN(dataRel)) {
                $('#qt-' + test).val(1);
            } else {
                dataRel = dataRel + 1;
                $('#qt-' + test).val(dataRel);
            }
        }
    }
    $(document).ready(function() {

        $('#search').keyup(function() {
            var query = $(this).val();
            if (query == '') {
                $('#countryList').hide();
            }
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('products.fetchProducts') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#countryList').show();
                        $('#countryList').html(data);
                    }
                });
            }
        });
    });

    $(document).on('click', 'li', function() {
        var query = $(this).val();
        var _token = $('input[name="_token"]').val();

        $('#countryList').fadeOut();
        $('#search').val('');

        setTimeout(function() {
            calculateGrandTotal();
        }, 100);
        calculateTotal();

    });

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
            mainID = mainID.slice(3);
            // console.log(mainID);
            var price = parseFloat($("#pr-" + mainID).val());
            var quantity = parseFloat($("#qt-" + mainID).val());
            total = price * quantity;
            total = total.toFixed(3);
            // console.log(total);
            if (isNaN(total)) {
                total = '0.00';
                $("#total-" + mainID).text(total);
                // console.log("NAN");
            } else {
                // alert(total);
                $("#total-" + mainID).text(total);
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
        var taxTotal = 0;
        $('.total').each(function() {
            var currentVal = parseFloat($(this).text());
            grandTotal += currentVal;
        });
        var discount = parseFloat($('.discount').text());
        var shipping = parseFloat($('.shippingAmount').text());
        $('.tax').each(function(){
            var tax = parseFloat($(this).text());
            taxTotal += tax;
        });
        // console.log(taxTotal)
        grandTotal = grandTotal - discount + shipping + taxTotal;
        grandTotal = grandTotal.toFixed(3);
        $('#grandTotal').text(grandTotal);
        $('#hiddenTotal').val(grandTotal);
    }

    // option fields
    $(document).on('keyup change', '.optionField', function() {
        var optionValue = $('#selectOption option:selected').val();
        var total = 0;
        var optionfieldValue = $('.optionField').val();
        if (optionValue == 1) {
            $('.total').each(function() {
                var t = parseFloat($(this).text());
                total += t;
            });

            if (isNaN(optionfieldValue)) {
                $('.discount').text('0.00');
            } else {
                var discount = (optionfieldValue * total) / 100;
                $('.discount').text(discount);
            }
        } else {
            if (isNaN(optionfieldValue)) {
                $('.discount').text('0.00');
            } else {
                var optionfieldValue = $('.optionField').val();
                $('.discount').text(optionfieldValue);
            }
        }
        calculateGrandTotal();
    });




    $(document).on('keyup', '.shipping', function() {
        var shipping = parseFloat($(this).val());
        if (isNaN(shipping)) {
            $('.shippingAmount').text('0.00');
        } else {
            $('.shippingAmount').text(shipping);
        }
        calculateGrandTotal();
    });

    // tax field
    // var object = {}
    var taxArray = [];
    var trArray = [];
    var NArray = [];

    $(document).on('change', '.taxField', function() {
        var tr_id = $(this).parent().parent().attr('id');
        // console.log(tr_id);
        var tax = $(this).val();
        // for(tax of trArray){
        // console.log(tax);

        // }
        if ($.inArray(tr_id, trArray) == -1) {
            trArray.push({
                tr_id: tr_id,
                tax_id: tax
            })
        }
        var index = -1;
        $.each(trArray, function(key, value) {
            // console.log($.inArray(value.tax_id, trArray));
            for (var i = 0; i < trArray.length; i++) {

                if (value.tr_id == tr_id) {
                    if($.inArray(tax, NArray) == -1){
                    NArray.push(tax)
                    console.log(NArray);
                    }
                } else {
                    NArray.pop()
                    // NArray.push(i)
                    console.log(NArray);
                }
            }
            // console.log(NArray)
            // if (tr_id == value.tr_id) {
            //     if ($.inArray(value.tax_id, trArray) == -1) {
            //         console.log(value.tax_id)
            //     } else {
            //         console.log('increment')
            //     }
            // }

        });
        if ($.inArray(tax, taxArray) == -1) {
            taxArray.push(tax)
            // console.log(taxArray);
            var trId = $(this).parent().parent().attr('id');
            if (tax == 2) {
                var html = ''
                html += '<tr id = "t2">'
                html += '<th>Tax Exempt:</th>'
                html += '<td colspan="2"><span type="text" readonly="readonly"> 0.00%</span>'
                html += '<td>'
                html += '<span class="symbol">$</span>'
                html += '<span type="text" readonly="readonly" id="tax-2" class="tax">0.00</span>'
                html += '<td>'
                html += '</tr>'
                $(html).insertAfter(s1);
                var totalAmount = $(this).parent().parent().find('td').eq(4).text();
                var taxAmount = 0.00;
                $('#tax-2').text(taxAmount);
            } else if (tax == 3) {
                var html = ''
                html += '<tr id = "t3">'
                html += '<th>Sales Tax:</th>'
                html += '<td colspan="2"><span type="text" readonly="readonly"> 15.00%</span>'
                html += '<td>'
                html += '<span class="symbol">$</span>'
                html += '<span type="text" readonly="readonly" id="tax-3" class="tax">0.00</span>'
                html += '<td>'
                html += '</tr>'
                $(html).insertAfter(s1);
                var totalAmount = $(this).parent().parent().find('td').eq(4).text();
                var taxAmount = (totalAmount * 15) / 100;
                // console.log(taxAmount);
                $('#tax-3').text(taxAmount);
                // alert(tax);

            } else if (tax == 4) {
                var html = ''
                html += '<tr id = "t4">'
                html += '<th>Purchases Tax:</th>'
                html += '<td colspan="2"><span type="text" readonly="readonly"> 15.00%</span>'
                html += '<td>'
                html += '<span class="symbol">$</span>'
                html += '<span type="text" readonly="readonly" id="tax-4" class="tax">0.00</span>'
                html += '<td>'
                html += '</tr>'
                $(html).insertAfter(s1);
                var totalAmount = $(this).parent().parent().find('td').eq(4).text();
                var taxAmount = (totalAmount * 15) / 100;
                // console.log(taxAmount);
                $('#tax-4').text(taxAmount);
                // alert(tax);


            } else if (tax == 5) {
                var html = ''
                html += '<tr id = "t5">'
                html += '<th>Normal:</th>'
                html += '<td colspan="2"><span type="text" readonly="readonly"> 5.00%</span>'
                html += '<td>'
                html += '<span class="symbol">$</span>'
                html += '<span type="text" readonly="readonly" id="tax-5" class="tax">0.00</span>'
                html += '<td>'
                html += '</tr>'
                $(html).insertAfter(s1);
                var totalAmount = $(this).parent().parent().find('td').eq(4).text();
                var taxAmount = (totalAmount * 5) / 100;
                // console.log(taxAmount);
                $('#tax-5').text(taxAmount);
                // alert(tax);

            } else if (tax == 6) {
                var html = ''
                html += '<tr id = "t6">'
                html += '<th>PayPal(3.5):</th>'
                html += '<td colspan="2"><span type="text" readonly="readonly"> 3.50%</span>'
                html += '<td>'
                html += '<span class="symbol">$</span>'
                html += '<span type="text" readonly="readonly" id="tax-6" class="tax">0.00</span>'
                html += '<td>'
                html += '</tr>'
                $(html).insertAfter(s1);
                var totalAmount = $(this).parent().parent().find('td').eq(4).text();
                var taxAmount = (totalAmount * 3.5) / 100;
                // console.log(taxAmount);
                $('#tax-6').text(taxAmount);
                // alert(tax);

            } else {
                var html = ''
                html += '<tr id = "t7">'
                html += '<th>PayPal(4.5):</th>'
                html += '<td colspan="2"><span type="text" readonly="readonly"> 4.50%</span>'
                html += '<td>'
                html += '<span class="symbol">$</span>'
                html += '<span type="text" readonly="readonly" id="tax-7" class="tax">0.00</span>'
                html += '<td>'
                html += '</tr>'
                $(html).insertAfter(s1);
                var totalAmount = $(this).parent().parent().find('td').eq(4).text();
                // alert(totalAmount)
                var taxAmount = (totalAmount * 4.5) / 100;
                // console.log(taxAmount);
                $('#tax-7').text(taxAmount);
                // alert(tax);

            }
        }
        //  else {
        //     taxIndex = object.taxArray.indexOf(tax);
        //     object.taxArray.splice(taxIndex, 1);
        //     console.log(object.taxArray);
        //     // $('#t' + tax).hide();
        //     // $('#t' + tax).remove();
        // }

    });


    // var myArray = [

    //   ];
    //   let key = 'id';

    // //   myArray[key] = 1;
    //   var val = 2;
    //   myArray.push({id: val});
    //   console.log(myArray);
</script>
@endsection