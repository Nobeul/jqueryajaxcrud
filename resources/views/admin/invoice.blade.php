@extends('admin.masteradmin')
@section('content')
<ul class="menu" role="menu">
    <li>
        <form action="{{route('admin.logout')}}" method="POST">
            {{csrf_field()}}
            <button type="submit" class="btn">Log out</button>
        </form>
    </li>
</ul>
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
                        <div class="form-group" style="margin: 20px 0px 0px 20px; width: 400px">
                            <table>
                                <tr>
                                    <!-- <tr style="float:right"> -->
                                    <td>
                                        <!-- <span class="">Add User</span> -->
                                        <select name="user" id="user" class="form-control input-lg dynamic" data-dependent="state" style=" height: 2.3rem! important; width: 250px">
                                            <option value="">Select User</option>
                                            @foreach($order as $odr)
                                            <option value="">{{$odr->user->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" name="filterUser" class="btn btn-primary" style="margin: 2px 10px; height: 35px">Filter</button>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table  invoice-detail-table  align_center" id="myTable">
                                            @csrf()
                                            <thead>
                                                <tr class="thead-default">
                                                    <th>User</th>
                                                    <th>Order Number</th>
                                                    <th>Total Quantity</th>
                                                    <th>Total Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order as $odr)
                                                <tr>
                                                    <td>{{$odr->user->name}}</td>
                                                    <td>{{$odr->order_number}}</td>
                                                    <td>{{$odr->qty}}</td>
                                                    <td>{{$odr->grand_total}}</td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm " style="color:white; margin-bottom: 10px; display: block; float:left" href="{{route('editOrders', $odr->id)}}"><i class="fas fa-edit"></i></a>

                                                        <!-- <button type="submit" class="btn btn-success btn-sm delete" id="{{$odr->id}}" style="color:white; margin-bottom: 10px; display:block"><i class="fa fa-trash"></i></button> -->
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
                    <div class="row text-center">
                        <div class="col-sm-12 invoice-btn-group text-center">
                            <button type="button" class="btn btn-primary btn-print-invoice m-b-10">Print</button>
                            <button type="button" class="btn btn-secondary m-b-10 ">Cancel</button>
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
<!-- [ Main Content ] end -->
<!-- Required Js -->
<script src="{{asset('dattaAble/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('dattaAble/assets/js/pcoded.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    // print button
    function printData() {
        var divToPrint = document.getElementById("printTable");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    $('.btn-print-invoice').on('click', function() {
        printData();
    })

    // yajra datatables
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endsection