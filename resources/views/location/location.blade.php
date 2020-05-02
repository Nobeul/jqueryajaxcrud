@extends('admin.masteradmin')
@section('content')

<div class="col-sm-12">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li><a class="nav-link text-left active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a></li>
                <li><a class="nav-link text-left" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a></li>
                <li><a class="nav-link text-left" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a></li>
                <li><a class="nav-link text-left {{request()->is(route('editLocation')) ? 'active' : null}}" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Locations</a></li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <p class="mb-0">Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est
                        eu aliqua
                        occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt
                        excepteur ea incididunt minim occaecat.</p>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <p class="mb-0">Culpa dolor voluptate do laboris laboris irure reprehenderit id incididunt duis pariatur mollit aute magna pariatur consectetur. Eu veniam duis non ut dolor deserunt commodo et
                        minim in quis
                        laboris ipsum velit id veniam. Quis ut consectetur adipisicing officia excepteur non sit. Ut et elit aliquip labore Lorem enim eu. Ullamco mollit occaecat dolore ipsum id officia mollit qui
                        esse anim eiusmod do sint minim consectetur qui.</p>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <p class="mb-0">Fugiat id quis dolor culpa eiusmod anim velit excepteur proident dolor aute qui magna. Ad proident laboris ullamco esse anim Lorem Lorem veniam quis Lorem irure occaecat velit
                        nostrud magna
                        nulla. Velit et et proident Lorem do ea tempor officia dolor. Reprehenderit Lorem aliquip labore est magna commodo est ea veniam consectetur.</p>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
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
                    $("#"+id).hide();
                    $("#"+id).remove();
                }
            })
        } else {
            return false;
        }
    });
</script>
@endsection