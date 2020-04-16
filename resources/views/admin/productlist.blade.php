@extends('admin.masteradmin')
@section('content')
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
                                        <table class="table  invoice-detail-table  align_center" id="myTable">
                                            <thead>
                                                <tr class="thead-default">
                                                    <th>Product Number</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->quantity}}</td>
                                                    <td>{{$product->price}}</td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm " style="color:white; margin-bottom: 10px; margin-left: 30%; display: block; float:left" href="{{route('view.editProduct',$product->id)}}"><i class="fas fa-edit"></i></a>
                                                        <!-- <form action="{{route('delete.product',$product->id)}}" method="POST">
                                                            {{csrf_field()}} -->
                                                            <button type="submit" class="btn btn-success btn-sm delete" style="color:white; margin-bottom: 10px; display:block"><i class="fa fa-trash"></i></button>
                                                        <!-- </form> -->
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
<script src="{{asset('dattaAble/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('dattaAble/assets/js/pcoded.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script>

</script>
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
    //Ajax delete 
    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $.ajax({
                url:"{{route('delete.product',$product->id)}}",
                mehtod:"post",
                data:{id:id},
                success:function(data)
                {
                    alert(data);
                    // $('#student_table').DataTable().ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    }); 
</script>
@endsection