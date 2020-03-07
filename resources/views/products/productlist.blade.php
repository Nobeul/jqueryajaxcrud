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


    {{ csrf_field() }}

    <form method="post" action="{{route('products.store')}}">
         @csrf()
        <div class="form-group">
            <div id="addCategory">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Category</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <div id="countryList">
                        <tbody class="addProduct">
                        </tbody>
                    </div>
                </table>
            </div>
        </div>



        <button type="submit" class="btn btn-primary submitBtn">Add Product</button>
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
                console.log(product.id);
                var html = ''
                html += '<tr>'
                html += '<td><input type="text" name="name[]"  value = "' + product.name + '"</td>'
                html += '<td><input type="text" name="category[]"  value = "' + product.category + '"</td>'
                html += '<td><input type="text" name="price[]"  value = "' + product.price + '"</td>'
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
                        $('#countryList').fadeIn();
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
            // addingProduct();


        });



        // $(document).on('click', '.submitBtn', function() {
        //     var productName = [];
        //     var productCategory = [];
        //     var productPrice = [];
        //     $('.productName').each(function() {
        //         productName.push($(this).text());
        //     });
        //     $('.productCategory').each(function() {
        //         productCategory.push($(this).text());
        //     });
        //     $('.productPrice').each(function() {
        //         productPrice.push($(this).text());
        //     });
        //     $.ajax({
        //             url: "{{ route('products.store') }}",
        //             method: "POST",
        //             data: {
        //                 productName: productName,
        //                 productCategory: productCategory,
        //                 productPrice: productPrice
        //             },
        //             success: function(data) {
        //                alert(data);

        //             }
        //         });
        // });


    });
</script>

@endsection