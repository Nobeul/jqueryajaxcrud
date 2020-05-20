@extends('admin.masteradmin')

@section('content')
<form method="post" action="{{route('admin.postAddInvoice')}}" enctype="multipart/form-data">
    @csrf
    <!-- New Invoice starts here -->
    <div class="card">
        <div class="card-header">
            <h5>New Invoice</h5>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-md-6">
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="col-form-label">Customer</label>
                            <span class="text-danger">*</span>
                        </div>
                        <div class="col-sm-8">
                            <select id="user" name="user" class="form-control">
                                <option value="">Select</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <label id="user-error" class="error" for="user"></label>

                        </div>
                        <span class="feather icon-user-plus" style="margin-top: 2%; color: blueviolet;" onclick="openCustomerModal()"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="col-form-label">Reference</label>
                            <span class="text-danger">*</span>
                        </div>
                        <!-- <div class="input-group col-md-8 p-md-0"> -->
                            <div class="col-sm-9">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="margin-left: 20%">order-</span>
                                    <input id="reference_no" class="form-control" name="order_number" value="
                                    @php 
                                    if($order == 1)
                                    {
                                        echo '0001';
                                    }else{
                                        
                                        $pre_order_number = trim($order, 'order-');
                                        $post_order_number = str_pad(++$pre_order_number, 4, "0", STR_PAD_LEFT); 
                                        echo str_replace(' ', '', $post_order_number); 
                                        
                                    } 
                                    @endphp 
                                    " type=" text" style="margin-left: 2%">
                                </div>
                            </div>
                        <!-- </div> -->
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
                            <select id="inputState" class="form-control" name="location_id">
                                <option selected="">Select</option>
                                @foreach($locations as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option>
                                @endforeach
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
                        <!-- <div class="col-sm-9">
                            <input type="text" id="date" name="date" class="form-control">
                            <label id="date-error" class="error" for="date"></label>
                        </div> -->
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <input type="text" name="date" class="form-control" value="12-02-2012">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
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
                            <select id="inputState" name="term_name" class="form-control">
                                <option selected="">Select</option>
                                @foreach($payment_terms as $pay)
                                <option value="{{$pay->id}}">{{$pay->term_name}}</option>
                                @endforeach
                            </select>
                            <label id="pay-error" class="error" for="pay"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="col-form-label">Invoice Type</label>
                        </div>
                        <div class="col-sm-9">
                            <select id="inputState" name="type" class="form-control">
                                <option selected="">Select</option>
                                <option value="1">Product</option>
                                <option value="2">Service</option>
                            </select>
                            <label id="type-error" class="error" for="type"></label>
                        </div>
                    </div>
                </div>
            </div>
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
                    <label id="list-error" class="error" for="list"></label>
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
                <div class="col-sm-12">
                    <div class="form-group row">
                          <label>Note</label>
                          <textarea placeholder="Description ..." rows="3" class="form-control" name="comments"></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                          <input type="checkbox" name="has_comment" id="checkbox-p-fill-1" checked="">
                          <label for="checkbox-p-fill-1" class="cr"><strong>Print note on pdf</strong></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">File</label>
                        <div class="col-md-11">
                          <div class="dropzone-attachments">
                            <div class="event-attachments">
                              <div class="add-attachments dz-clickable">
                                  <input type="file" name="file" value="">
                              </div>
                              <span class="badge badge-danger">Note!</span> Allowed File Extensions: jpg, png, gif, docx, xls, xlsx, csv and pdf
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <input type="submit" id="orderSubmit" class="btn btn-primary submitBtn" value="Order Now">
            </div>
        </div>
    </div>
</form>
<!-- Modal to add new customer-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 128%;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalForm" method="POST" action="{{route('admin.addUser')}}" data-parsley-validate="">
                @csrf()
                <div class="modal-body">
                    <div class="form-group row p-t-10">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Name
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control input-length" required id="name" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row p-t-10">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            E-Mail Address
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control input-length" required id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row p-t-10">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Password
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control input-length" required id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row p-t-10">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Confirm Password
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control input-length" required id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="margin-right:3%">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btnSave">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<script src="{{asset('dattaAble/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('dattaAble/assets/js/pcoded.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function () {
        $(".date").datepicker({ 
                autoclose: true, 
                todayHighlight: true
        }).datepicker('update', new Date());
        });

    var quantity_id = [];
    $('#formUniqueID').parsley();
    $('#modalForm').parsley();
    $("#orderSubmit").on('click', function(event) {
        if ($("#user").val() == "") {
            $('#user-error').text('This field is required');
            event.preventDefault();
        }
        if ($("#date").val() == "") {
            $('#date-error').text('This field is required');
            event.preventDefault();
        }
    });

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
                    html += '<td><input type="text" class="inputAutocomplete calculate positive-float-number price errorChecking" required data-parsley-validate data-parsley-trigger="keyup" data-parsley-type="number" data-rel="' + product.id + '" id = "pr-' + product.id + '"  name="price[]"  value = "' + product.retail_price + '"/>'
                    html += '<td><div class="inputAutocomplete total" style="width:70px; max-width: 70px" id = "total-' + product.id + '" name="total[]">' + 1 * product.retail_price + '</div></td>'

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

    function openCustomerModal() {
        $('.modal-title').text('Add New Customer');
        $('#modal').modal();
    }
    $('#orderSubmit').on('click', function(event) {
        var childNode = $('#countryList').children().length;
        if (childNode == 0) {
            $('#list-error').text('No Item added! Please add some item...');
            event.preventDefault();
        }

    });
</script>

@endsection