@extends('admin.masteradmin')
@section('content')
<div class="col-sm-12">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li><a class="nav-link text-left" id="v-pills-home-tab" href="{{route('itemCategories.viewlist')}}">Item Categories</a></li>
                <li><a class="nav-link text-left" id="v-pills-profile-tab" href="{{route('language.viewlist')}}">Languages</a></li>
                <li {{(request()->path() == 'admin/generalsettings/categories/') ? 'class="active"' : null}} @php if('class=="active"'){
                echo ' style="background-color:#3490dc;';
                echo 'border-radius: 0.25rem;"';
                }
            @endphp
            ><a class="nav-link text-left" id="v-pills-messages-tab" href="{{route('units.viewlist')}}" style="@php if(' class=="active"') echo ' color:#fff';@endphp">Units</a></li>
            <li><a class="nav-link text-left" id="v-pills-profile-tab" href="{{route('itemType.viewlist')}}">Item Type</a></li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="tab-content" id="v-pills-tabContent">
                <div>
                    <b style="margin:-12px; font-size:20px">General Settings >> Units</b>
                    <a type="button" class="btn btn-outline-primary" onclick="create()" style="float:right"><i class="feather icon-plus"></i>New Unit</a>
                    <br /><br />
                    <hr />
                    <!-- table starts here -->
                    <div style="width: 725px; margin-left: -15px">
                        <div>
                            <table id="fixed-columns-left" class="table table-striped table-hover table-bordered nowrap" style="width:725px;">
                                <thead>
                                    <tr>
                                        <th>Unit Name</th>
                                        <th>Unit Abbr</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($units as $unit)
                                    <tr id="{{$unit->id}}">
                                        <td>{{$unit->name}}</td>
                                        <td>{{$unit->abbr}}</td>
                                        <td>
                                            <a type="button" style="border: 1px solid #4498de" class="editUnit" id="{{$unit->id}}"><i class="feather icon-edit" style="padding:4px"></i></a>
                                            <button title="Delete" class="delete" data-id="3" id="{{$unit->id}}" type="submit" data-label="Delete" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Location" data-message="Are you sure you want to delete this Department ?" style="border: 1px solid red;height: 23px;padding-top: 0px;">
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
            </div>
        </div>
        <!-- Modal to add new Category-->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="modalForm" method="POST" action="{{route('units.addNew')}}">
                        @csrf()
                        <div class="modal-body">
                            <input type="hidden" name="id">
                            <div class="form-group row p-t-10">
                                <label class="col-sm-3 control-label a" for="inputEmail3">
                                    Unit Name
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label a" for="inputEmail3">
                                    Abbr
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="abbr" name="abbr" placeholder="Abbr">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btnSave">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal to edit category-->
        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Add Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="modalForm1" method="post" action="{{route('units.update')}}">
                        @csrf()
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group row p-t-10">
                                <label class="col-sm-3 control-label a" for="inputEmail3">
                                    Unit Name
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="editName" name="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label a" for="inputEmail3">
                                    Abbr
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="editAbbr" name="abbr" placeholder="Abbr">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btnSave">Update</button>
                            </div>
                        </div>
                    </form>
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
    //Ajax delete 
    $(document).on('click', '.delete', function() {
        var id = $(this).attr('id');
        if (confirm("Are you sure you want to Delete this data?")) {
            $.ajax({
                type: "post",
                url: "/admin/generalsettings/units/deleteunit/" + id,
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
        $('.modal-title').text('New Unit');
        $('#modal').modal();

    }
    $(document).ready(function() {
        $('#fixed-columns-left').DataTable();
    });

    // function deleteModal() {
    //     $('.modal-title').text('New Unit');
    //     $('#modal').modal();
    // }

    $('#modalForm').validate({
        rules: {
            name: {
                required: true
            },
            abbr: {
                required: true
            }
        }
    });

    $('#modalForm1').validate({
        rules: {
            department_name: {
                required: true
            }
        }
    });

    $('.editUnit').on('click', function() {
        var id = $(this).attr('id');
        $('#id').val(id);
        $.ajax({
            type: "get",
            url: "/admin/generalsettings/units/editunit/" + id,
            data: {
                "id": id,
            },
            dataType: 'json',
            success: function(data) {
                $('.modal-title').text('Edit Department');
                $('#modal1').modal();
                $('#editName').val(data.name);
                $('#editAbbr').val(data.abbr);
            }
        })
    });
</script>

@endsection