@extends('admin.masteradmin')

@section('content')
<form method="post" id="formID" action="{{route('admin.postAddInvoice')}}" data-parsley-validate="">
    {{csrf_field()}}

    <!-- New Invoice starts here -->
    <div class="card">
        <div class="card-header">
            <h5>New Invoice</h5>
        </div>
        <div class="card-block">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="col-form-label">Customer</label>
                                <span class="text-danger">*</span>
                            </div>
                            <div class="col-sm-8">
                                <select id="inputState" class="form-control">
                                    <option selected="">select</option>
                                    <option>Large select</option>
                                </select>
                            </div>
                            <span class="feather icon-user-plus" style="margin-top: 2%; color: blueviolet;"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="col-form-label">Reference</label>
                                <span class="text-danger">*</span>
                            </div>
                            <div class="input-group date col-md-8 p-md-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="margin-left: 20%">order-</span>
                                </div>
                                <input id="reference_no" class="form-control" value="" type="text" style="margin-left: 2%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="col-form-label">Location</label>
                            </div>
                            <div class="col-sm-9">
                                <select id="inputState" class="form-control">
                                    <option selected="">select</option>
                                    <option>Large select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="col-form-label">Date</label>
                                <span class="text-danger">*</span>
                            </div>
                            <div class="col-sm-9">
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="col-form-label">Payment Term</label>
                            </div>
                            <div class="col-sm-9">
                                <select id="inputState" class="form-control">
                                    <option selected="">select</option>
                                    <option>Large select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="col-form-label">Invoice Type</label>
                            </div>
                            <div class="col-sm-9">
                                <select id="inputState" class="form-control">
                                    <option selected="">select</option>
                                    <option>Large select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- New Invoice ends here -->

    <div class="card">
        <div class="card-header">
            <h4>Add Product</h5>
        </div>

        <div class="container">
            <div class="product">
            </div>
            <hr>
            <table>
                <td>
                    <div class="form-group">
                        <span class="">Search Product</span>
                        <input type="text" name="search" id="search" class="form-control" style="width: 200px" placeholder="Search here..." />
                    </div>

                    <div id="countryList">
                    </div>

                </td>
                <td>
                    <div class="form-group" style="margin-left: 20px;">
                        <span class="">Add User</span>
                        <select name="user" id="user" class="form-control input-lg dynamic" data-dependent="state" style=" height: 2.3rem! important">
                            <option value="">Select User</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id}}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </table>


            <div class="form-group">
                <div id="addCategory">
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
                        <tbody class="addProduct">
                        </tbody>
                        <tr class="grandTotal">
                            <th colspan="3" class="text-right">Grand Total: </th>
                            <td>
                                <span id="grandTotal"></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <button type="submit" id="order" class="btn btn-primary submitBtn">Order Now</button>
            </div>
        </div>
</form>
</div>
<script src="{{asset('dattaAble/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('dattaAble/assets/js/pcoded.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js"></script>
<script>
    $('.autonumber').autoNumeric('init');

    var quantity_id = [];
    $('#formID').parsley();


    var list_id = [];
    var i = 1;

    function addingProduct(e) {
        var test = $(e).attr("id");
        // var id = test.slice(7);
        var list = $.inArray(test, list_id);

        if (list == -1) {
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
                    html += '<tr id = "tr-' + product.id + '">'
                    html += '<input type="hidden" name="id[]"  value = "' + product.id + '"/>'
                    html += '<td><div class="inputAutocomplete">' + product.name + '</div></td>'
                    html += '<td><input type="text" class="inputAutocomplete calculate positive-float-number quantity errorChecking" required data-parsley-validate data-parsley-trigger="keyup" data-parsley-type="number" data-rel="' + product.id + '" id = "qt-' + product.id + '"  name="quantity[]" value = "1"/>'
                    html += '<td><input type="text" class="inputAutocomplete calculate positive-float-number price errorChecking" required data-parsley-validate data-parsley-trigger="keyup" data-parsley-type="number" data-rel="' + product.id + '" id = "pr-' + product.id + '"  name="price[]"  value = "' + product.price + '"/>'
                    html += '<td><div class="inputAutocomplete total" style="width:70px; max-width: 70px" id = "total-' + product.id + '" name="total[]">' + 1 * product.price + '</div></td>'
                    html += '<td><span class="dltBtn"><i class="fas fa-trash-alt"></i></span></td>'
                    html += '</tr>';
                    $('.addProduct').append(html);
                    $('.quantity').each(function() {
                        var quantityid = $(this).attr('data-rel');
                        quantity_id.push(quantityid);
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
                    url: "{{ route('addInvoice.fetch') }}",
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

        function calculateTotal() {
            var total = 1;
            $('.calculate').each(function() {
                var mainID = $(this).parent().parent().attr('id');
                var mainID = mainID.slice(3);
                var price = parseFloat($("#pr-" + mainID).val());
                var quantity = parseFloat($("#qt-" + mainID).val());
                total = price * quantity;
                total = total.toFixed(3);
                // alert(total);

                if (isNaN(total)) {
                    total = '0.00';
                    $("#total-" + mainID).text(total);
                } else {
                    // alert(total);
                    $("#total-" + mainID).text(total);
                }
            });
        }


        $(document).on('keyup', '.calculate', function() {
            calculateTotal();
            calculateGrandTotal();
            // $('input[type=text]').each(function() {
            //     if ($(this).val() == '') {
            //         alert('Can not be null');
            //     }
            // });
        });
    });


    $(document).on('click', '.dltBtn', function() {
        var trId = $(this).parent().parent().attr('id');

        $('#' + trId).hide();
        $('#' + trId).remove();
        calculateGrandTotal();
        trId = trId.slice(3);
        // alert(trId);
        list_id.pop(trId);
        console.log(list_id);
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

    function calculateGrandTotal() {
        var grandTotal = 0;
        $('.total').each(function() {
            var currentVal = parseFloat($(this).text());
            grandTotal += currentVal;
        });
        // grandTotal = grandTotal.toFixed(3);
        $('#grandTotal').text(grandTotal);
    }
</script>

@endsection