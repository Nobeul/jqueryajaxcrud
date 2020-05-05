@extends('admin.masteradmin')
@section('content')

<div class="col-sm-12">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li><a class="nav-link text-left" id="v-pills-home-tab" href="{{route('company.viewSettings')}}">Company Settings</a></li>
                <li><a class="nav-link text-left" id="v-pills-profile-tab" href="">Department</a></li>
                <li><a class="nav-link text-left" id="v-pills-messages-tab" href="{{route('addUserRole')}}">User Roles</a></li>
                    <li {{(request()->path() == 'admin/location') ? 'class="active"' : null}} @php if('class=="active"'){
                echo ' style="background-color:#3490dc;';
                echo 'border-radius: 0.25rem;"';
                }
            @endphp
                ><a class="nav-link text-left" id="v-pills-settings-tab"  href="{{route('settings.viewLocation')}}" style="@php if(' class=="active"') echo ' color:#fff';@endphp">Locations</a></li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="tab-content" id="v-pills-tabContent">
                <div >
                    <a type="button" class="btn btn-outline-primary" href="{{route('settings.addNewLocation')}}" style="float:right"><i class="feather icon-plus"></i>New Location</a>
                    <br /><br />
                    <hr />
                    <!-- table starts here -->
                    <div class="col-xl-6">
                        <table id="fixed-columns-left" class="table table-striped table-hover table-bordered nowrap" style="width:100%; margin-left: -10%;">
                            <thead>
                                <tr>
                                    <th>Location Name</th>
                                    <th>Delivery Address</th>
                                    <th>Default Location</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($locations as $location)
                                <tr id="{{$location->id}}">
                                    <td>{{$location->name}}</td>
                                    <td>{{$location->address}}</td>
                                    <td>
                                        @php
                                        if($location->is_default == 0)
                                        echo "No";
                                        else
                                        echo "Yes";
                                        @endphp
                                    </td>
                                    <td>{{$location->phone}}</td>
                                    <td>
                                        @php
                                        if($location->status == 0)
                                        echo "Inactive";
                                        else
                                        echo "Active";
                                        @endphp
                                    </td>
                                    <td>
                                        <a href="{{route('editLocation', $location->id)}}" style="border: 1px solid #4498de"><i class="feather icon-edit" style="padding:4px"></i></a>

                                        <button title="Delete" class="delete" data-id="3" id="{{$location->id}}" type="submit" data-label="Delete" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Location" data-message="Are you sure you want to delete this Location ?" style="border: 1px solid red;height: 23px;padding-top: 0px;">
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
</div>


<script src="{{asset('dattaAble/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('dattaAble/assets/js/pcoded.min.js')}}"></script>

<script>
    //Ajax delete 
    $(document).on('click', '.delete', function() {
        var id = $(this).attr('id');
        var trId = $(this).parent().parent().attr('id');
        console.log(id);
        console.log(trId);
        if (confirm("Are you sure you want to Delete this data?")) {
            $.ajax({
                type: "post",
                url: "/admin/deletelocation/" + id,
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
</script>
@endsection