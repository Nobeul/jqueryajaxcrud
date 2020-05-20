@extends('admin.masteradmin')
@section('content')
<div class="col-sm-12">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li {{(request()->path() == 'admin/finance/tax') ? 'class="active"' : null}} @php if('class=="active"'){
                echo ' style="background-color:#3490dc;';
                echo 'border-radius: 0.25rem;"';
                }
            @endphp
                ><a class="nav-link text-left" id="v-pills-home-tab" href="{{route('taxes.viewlist')}}" style="@php if(' class=="active"') echo ' color:#fff';@endphp">Taxes</a></li>
                <li><a class="nav-link text-left" id="v-pills-profile-tab" href="">Currencies</a></li>
                <li><a class="nav-link text-left" id="v-pills-messages-tab" href="">Bank Account Type</a></li>
                <li ><a class="nav-link text-left" id="v-pills-settings-tab"  href="{{route('PaymentTerms.viewlist')}}" >Payment Terms</a></li>
                <li><a class="nav-link text-left" id="v-pills-messages-tab" href="">Payment Methods</a></li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="tab-content" id="v-pills-tabContent">
                <div>
                    <a type="button" class="btn btn-outline-primary" onclick="create()" style="float:right"><i class="feather icon-plus"></i>Add New</a>
                    <br /><br />
                    <hr />
                    <!-- table starts here -->
                    <div class="col-xl-17">
                        <table id="fixed-columns-left" class="table table-striped table-hover table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Tax Rate (%)</th>
                                    <th>Default</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($taxes as $tax)
                                <tr id="{{$tax->id}}">
                                    <td>{{$tax->name}}</td>
                                    <td>{{$tax->tax_rate}}</td>
                                    <td>
                                        @php
                                        if($tax->is_default == 0)
                                        echo "No";
                                        else
                                        echo "Yes";
                                        @endphp
                                    </td>
                                    <td>
                                        <a type="button" style="border: 1px solid #4498de;border-radius: 5px;" class="editPaymentTerm" id="{{$tax->id}}"><i class="feather icon-edit" style="padding: 4px;"></i></a>
                                        <button title="Delete" class="delete" data-id="3" id="{{$tax->id}}" type="submit" data-label="Delete" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Location" data-message="Are you sure you want to delete this payment term?" style="border: 1px solid red;border-radius: 5px;height: 23px;padding-top: 0px;">
                                            <i class="feather icon-trash-2"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal to add new payment term-->
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="modalForm" method="POST" action="{{route('taxes.addNew')}}">
                            @csrf()
                            <div class="modal-body">
                                <div class="form-group row p-t-10">
                                    <label class="col-sm-3 control-label a" for="inputEmail3">
                                        Name
                                        <span class="text-danger"> *</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row p-t-10">
                                    <label class="col-sm-3 control-label a" for="inputEmail3">
                                        Tax Rate (%)
                                        <span class="text-danger"> *</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="tax_rate" name="tax_rate" placeholder="Tax Rate (%)">
                                    </div>
                                </div>
                                <div class="form-group row p-t-10">
                                    <label class="col-sm-3 control-label a" for="inputEmail3">
                                        Default
                                        <span class="text-danger"> *</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control js-example-basic-single select2-hidden-accessible " name="is_default" id="is_default">
                                            <option value="0" selected>No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btnSave">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal to edit payment term-->
            <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Add Contact</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="modalForm1" method="post" action="{{route('taxes.update')}}">
                            @csrf()
                            <input type="hidden" name="id" id="tax_id">
                            <div class="modal-body">
                                <div class="form-group row p-t-10">
                                    <label class="col-sm-3 control-label a" for="inputEmail3">
                                        Name
                                        <span class="text-danger"> *</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="name1" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row p-t-10">
                                    <label class="col-sm-3 control-label a" for="inputEmail3">
                                        Tax Rate (%)
                                        <span class="text-danger"> *</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="tax_rate1" name="tax_rate" placeholder="Tax Rate (%)">
                                    </div>
                                </div>
                                <div class="form-group row p-t-10">

                                    <label class="col-sm-3 control-label a" for="inputEmail3">
                                        Default
                                        <span class="text-danger"> *</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select class="form-control js-example-basic-single select2-hidden-accessible" id="is_default1" name="is_default">
                                            <option value="0" selected>No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btnSave">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('dattaAble/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('dattaAble/assets/js/pcoded.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#fixed-columns-left').DataTable();
    });
    //Ajax delete 
    $(document).on('click', '.delete', function() {
        var id = $(this).attr('id');
        var trId = $(this).parent().parent().attr('id');
        console.log(id);
        console.log(trId);
        if (confirm("Are you sure you want to Delete this data?")) {
            $.ajax({
                type: "post",
                url: "/admin/finance/tax/deletetax/" + id,
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $("#" + id).hide();
                    $("#" + id).remove();
                }
            })
        } else {
            return false;
        }
    });

    function create() {
        $('.modal-title').text('Add Tax');
        $('#modal').modal();

    }

    $('.editPaymentTerm').on('click', function() {

        var id = $(this).attr('id');
        $('#tax_id').val(id);
        $.ajax({
            type: "get",
            url: "/admin/finance/tax/edittax/" + id,
            data: {
                "id": id,
            },
            dataType: 'json',
            success: function(data) {
                $('.modal-title').text('Edit Tax');
                $('#modal1').modal();
                console.log(data.is_default);
                $('#name1').val(data.name);
                $('#tax_rate1').val(data.tax_rate);
                $('#is_default1').val(data.is_default);
            }
        })
    });

    $('#modalForm').validate({
        rules: {
            name: {
                required: true
            },
            tax_rate:{
                required:true
            }
        }
    });

    $('#modalForm1').validate({
        rules: {
            name: {
                required: true
            },
            tax_rate:{
                required:true
            }
        }
    });
</script>
@endsection