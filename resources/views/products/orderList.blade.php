@extends('layouts.app')
@section('content')

<!-- Search -->
<!-- <form>
    {{csrf_field()}}
    <input type="text" name="search" id="search" placeholder="Search here.." style="padding:10px 20px; margin-bottom:15px; width: 300px">
     <input type="text" name="search" id="search" class="form-control" placeholder="Search here..." /> -->
<!-- </form>  -->
<!-- Search -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Invoice ] start -->
            <div class="container" id="printTable">
                <div>
                    <div class="card">

                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive" style="padding: 20px 10px">
                                        <table class="table  invoice-detail-table  align_center" id="myTable">
                                            <thead>
                                                <tr class="thead-default">
                                                    <th>Order Number</th>
                                                    <th>Total Quantity</th>
                                                    <th>Total Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order as $odr)
                                                <tr>
                                                    <td>{{$odr->order_number}}</td>
                                                    <td>{{$odr->qty}}</td>
                                                    <td>{{$odr->grand_total}}</td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm " style="color:white; margin-bottom: 10px" href="{{route('products.editOrder', $odr->id)}}"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
</section>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script>
    // yajra datatables
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endsection