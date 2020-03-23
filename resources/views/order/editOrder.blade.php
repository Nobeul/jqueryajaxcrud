@extends('layouts.app')

@section('content')

<form method="post" id="formID" action="{{route('updateOrders')}}" data-parsley-validate="">
    {{csrf_field()}}
    <div class="container">
        <table class="table">
            <thead>
                <tr class="listStyle">
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <div class="form-group">
                <div id="addCategory">
                    <tbody class="addProduct">
                        @foreach($order as $odr)
                        <tr id="{{$odr->id}}">
                            <input type="hidden" name="id[]" value="{{$odr->id}}">
                            <input type="hidden" name="product_id[]" value="{{$odr->product_id}}">
                            <td>{{$odr->product->name}}</td>
                            <td><input type="text" style="text-align: center" name="quantity[]" value="{{$odr->quantity}}"></td>
                            <td><input type="text" style="text-align: center" name="price[]" value="{{$odr->price}}"></td>
                            <td><a type="submit" class="dltBtn"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
        </table>
        <button type="submit" id="order" class="btn btn-primary submitBtn">Update Order</button>
    </div>
</form>
</div>
</div>
@endsection
<script src="{{asset('https://code.jquery.com/jquery-3.4.1.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js')}}"></script>
<script>
    $(document).on('click', '.dltBtn', function() {
        var trId = $(this).parent().parent().attr('id');
        $('#' + trId).hide();
        $('#' + trId).remove();
    });
</script>