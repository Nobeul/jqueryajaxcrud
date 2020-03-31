@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Search -->
    <input id="myInput" type="text" placeholder="Search here.." style="padding:10px 20px; margin-bottom:15px; width: 300px">
    <!-- Search -->

    <!-- Delete Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this contact?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modalDltBtn" class="btn btn-danger btnDelete" data-id="">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <table class="table align_center" >
        <thead>
            <tr>
                <th scope="col">Sl</th>
                <th scope="col">Order Number</th>
                <!-- <th scope="col">Product Name</th> -->
                <th scope="col">Total Quantity</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <?php $i = 1; ?>
        <tbody id="myTable">
            @foreach($order as $odr)
            <tr>
                <td scope="row"><?php echo $i++; ?></td>
                <td>{{$odr->order_number}}</td>
                <td>{{$odr->qty}}</td>
                <td>{{$odr->grand_total}}</td>
                <td>
                    <a class="btn btn-success btn-sm " style="color:white; margin-bottom: 10px" href="{{route('editOrders', $odr->id)}}"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<script src="{{asset('https://code.jquery.com/jquery-3.4.1.js')}}"></script>

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>