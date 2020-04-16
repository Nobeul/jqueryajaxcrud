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
                                        <table class="table  invoice-detail-table  align_center" id="myTable">
                                            <thead>
                                                <tr class="thead-default">
                                                    <th>SL</th>
                                                    <th>User Name</th>
                                                    <th>User Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i = 0;
                                                @endphp
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{++$i}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>
                                                        <form action="{{route('admin.deluser',$user->id)}}" method="POST">
                                                            {{csrf_field()}}
                                                        <button class="btn btn-success btn-sm" type="submit" style="color:white; margin-bottom: 10px"><i class="fa fa-trash"></i></button>
                                                        </form>
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
    // yajra datatables
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endsection