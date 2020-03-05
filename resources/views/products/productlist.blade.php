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


    <div class="form-group">
        <div id="addCategory">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
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



</div>
<script src="{{asset('https://code.jquery.com/jquery-3.4.1.js')}}" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script>
    function addingProduct(e)
    {
        var test = $(e).attr("id");
        var id = test.slice(7);
        // alert(id);
        $.ajax({
            url: "{{ route('products.addProduct') }}",
            method: "POST",
            data: {
                "id": id,
                "_token": "{{ csrf_token() }}"
            },
            success: function (response) {
                var product = response;
                console.log(product);
                // $('.addProduct').append(response);
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
            $.ajax({
                url: "{{ route('products.fetch') }}",
                method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(output) {
                   console.log(output);
                   
                    var html = ''
                    html += '<tr>'
                    html += '<th scope="row">' + output.id +'</th>'
                    html += '<td>Mark</td>'
                    html += '<td>ghi</td>'
                    html += '<td>Otto</td>'
                    html += '</tr>';
                    $('.addProduct').append(html);

                }
            });




        });

        

        $(document).on('click', 'submitBtn', function() {

        });



    });
</script>

@endsection