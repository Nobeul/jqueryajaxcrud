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
        <div id="countryList">
        </div>
    </div>

    <form method="post" action="{{route('products.store')}}">
        @csrf()
        <div class="form-group">
            <div id="addCategory">
                <table class="table">
                    <thead>
                        <tr class="listStyle">
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody class="addProduct" style="position: relative">
                    </tbody>
                </table>
            </div>
        </div>

        <button type="submit" class="btn btn-primary submitBtn">Order Now</button>
    </form>


</div>
<script src="{{asset('https://code.jquery.com/jquery-3.4.1.js')}}" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script>
    function addingProduct(e) {
        var test = $(e).attr("id");
        // var id = test.slice(7);
        // alert(id);
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
                // console.log(product.id);
                var total = product.quantity * product.price;
                var html = '';
                html += '<tr>'
                html += '<input type="hidden" name="id[]"  value = "' + product.id + '"/>'
                html += '<td><div class="inputAutocomplete" name="name[]">' + product.name + '</div></td>'
                html += '<td><input type="text" class="inputAutocomplete calculate" data-rel="' + product.id + '" id= "qt-' + product.id + '" name="quantity[]"  value = "' + product.quantity + '"</td>'
                html += '<td><input type="text" class="inputAutocomplete calculate" data-rel="' + product.id + '" id= "pr-' + product.id + '"  name="price[]"  value = "' + product.price + '"</td>'
                html += '<td><div class="inputAutocomplete total" id= "total-' + product.id + '" name="total[]"></div></td>'
                html += '<span class="dltIcon"><i class="fas fa-trash-alt"></i></span>'
                html += '</tr>';
                $('.addProduct').append(html);
            }
        });
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
                    url: "{{ route('products.fetch') }}",
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

            $('#search').val($(this).text());
            $('#countryList').fadeOut();

        });

        $(document).on('keyup', '.calculate', function() {
            var dataRel = $(this).attr('data-rel');
            var qty = parseFloat($("#qt-" + dataRel).val());
            var price = parseFloat($("#pr-" + dataRel).val());
            console.log(qty);
            console.log(price);

            var total = price * qty;
            $("#total-" + dataRel).text(total);
        });
    });
</script>

@endsection