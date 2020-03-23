@extends('layouts.app')

@section('content')
<div class="container">
    <div class="product">
        Add Product
    </div>
    <hr>

    <div class="form-group">
        <span class="">Search Product</span>
        <input type="text" name="search" id="search" class="form-control" style="width: 200px" placeholder="Search here..." />
    </div>

    <div id="countryList">
    </div>

    <form method="post" id="formID" action="{{route('products.store')}}">
        {{csrf_field()}}
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
                        <!-- <input type="hidden" name="total" value="15,999.99999920$" id="grandTotalInput"> -->
                        <th colspan="3" class="text-right">Grand Total: </th>
                        <td>
                            <span id="grandTotal"></span>
                        </td>
                    </tr>
                </table>
            </div>
            <button type="submit" id="order" class="btn btn-primary submitBtn">Order Now</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script>
    var quantity_id = [];

    
    //hard coded validation
    $('#formID').on('keyup', function(event) {
        var html = 'This field is required'
        var enableOrdisable = 1
        $('.quantity').each(function() {
            var dataREL = $(this).attr('data-rel');
            var qt = $(this).val();
            if(qt == ''){
                $('#errorDiv'+dataREL).text(html)
                enableOrdisable = 0
            }else{
                $('#errorDiv'+dataREL).text('')

            }
        });
       
        $('.price').each(function() {
            var dataREL = $(this).attr('data-rel');
            var pr = $(this).val();
            if(pr == ''){
                $('#prerrorDiv'+dataREL).text(html)
                enableOrdisable = 0
            }else{
                $('#prerrorDiv'+dataREL).text('')

            }
        });
        if(enableOrdisable == 0){
            $('#order').attr("disabled", true);
        }else{
            $('#order').attr("disabled", false);
        }
    });



    var list_id = [];
    var i = 1;

    function addingProduct(e) {
        // console.log(e);
        var test = $(e).attr("id");
        // var id = test.slice(7);
        var list = $.inArray(test, list_id);
        list_id.push(test);
        // console.log(list);
        if (list == -1) {
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
                    // console.log(response);
                    var total = product.quantity * product.price;
                    var html = ''
                    html += '<tr id = "tr-' + product.id + '">'
                    html += '<input type="hidden" name="id[]"  value = "' + product.id + '"/>'
                    html += '<td><div class="inputAutocomplete">' + product.name + '</div></td>'
                    html += '<td><input type="text" class="inputAutocomplete calculate positive-float-number quantity errorChecking" data-rel="' + product.id + '" id = "qt-' + product.id + '"  name="quantity[]" value = "1"/>'
                    html += '<div><span id="errorDiv'+ product.id +'" style="color: red"></span></div></td>'
                    html += '<td><input type="text" class="inputAutocomplete calculate positive-float-number price errorChecking" data-rel="' + product.id + '" id = "pr-' + product.id + '"  name="price[]"  value = "' + product.price + '"/>'
                    html += '<div><span id="prerrorDiv'+ product.id +'" style="color: red"></span></div></td>'
                    html += '<td><div class="inputAutocomplete total" style="width:70px; max-width: 70px" id = "total-' + product.id + '" name="total[]">' + 1 * product.price + '</div></td>'
                    html += '<td><span class="dltBtn"><i class="fas fa-trash-alt"></i></span></td>'
                    html += '</tr>';
                    $('.addProduct').append(html);

                    $('.quantity').each(function() {
                        var quantityid = $(this).attr('data-rel');
                        quantity_id.push(quantityid);
                        // console.log(quantity_id);
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


   
</script>

@endsection