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
<form>
    {{csrf_field()}}
    <input type="text" name="search" id="search" placeholder="Search here.." style="padding:10px 20px; margin-bottom:15px; width: 300px">
    <!-- <input type="text" name="search" id="search" class="form-control" placeholder="Search here..." /> -->
</form>
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
                                    <div class="table-responsive">
                                        <table class="table  invoice-detail-table  align_center">
                                            <thead>
                                                <tr class="thead-default">
                                                    <th>Order Number</th>
                                                    <th>Total Quantity</th>
                                                    <th>Total Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable">
                                                @foreach($order as $odr)
                                                <tr>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>{{$order->links()}}</div>
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

    // $(document).ready(function() {
    //     $("#myInput").on("keyup", function() {
    //         var value = $(this).val().toLowerCase();
    //         $("#myTable tr").filter(function() {
    //             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //         });
    //     });
    // });

    $(document).ready(function() {

        $('#search').keyup(function() {
            var query = $(this).val();
            if (query == '') {
                $('#countryList').hide();
            }
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('order.fetch') }}",
                    method: "get",
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
    });
</script>

@endsection