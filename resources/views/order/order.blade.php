@extends('layouts.app')

@section('content')
<div class="container">
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
    <table class="table">
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
        <tbody>
            @foreach($order as $odr)
            <tr>
                <th scope="row"><?php echo $i++; ?></th>
                <td>{{$odr->order_number}}</td>
                <td>{{$odr->order_details}}</td>
                <td>{{$odr->grand_total}}</td>
                <td>
                    <a class="btn btn-success btn-sm " style="color:white; margin-bottom: 10px" href="{{route('editOrders', $odr->order_number)}}"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection