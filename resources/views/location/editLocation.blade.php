@extends('admin.masteradmin')
@section('content')
@foreach($locations as $location)

<div class="col-sm-12">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li @php if(request()->path() == 'admin/company/')
                    {
                    echo 'class="active"';
                    echo ' style="background-color:#3490dc;';
                    echo 'border-radius: 0.25rem;"';
                    }
                    @endphp><a class="nav-link text-left" id="v-pills-messages-tab" href="{{route('company.viewSettings')}}">Company Settings</a></li>
                <li><a class="nav-link text-left" id="v-pills-profile-tab" href="#v-pills-profile">Department</a></li>
                <li><a class="nav-link text-left" id="v-pills-home-tab" href="{{route('addUserRole')}}">User Roles</a></li>
                <li {{(request()->path() == 'admin/location/editLocation/'.$location->id) ? 'class="active"' : null}} @php if('class=="active"'){
                echo ' style="background-color:#3490dc;';
                echo 'border-radius: 0.25rem;"';
                }
            @endphp
                ><a class="nav-link text-left" id="v-pills-settings-tab"  href="{{route('editLocation',$location->id)}}" style="@php if(' class=="active"') echo ' color:#fff';@endphp">Locations</a></li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="col-md-6">
                <form style="width: 200%" id="formID" method="POST" action="{{route('post.editLocation', $location->id)}}">
                    @csrf()
                    <div class="form-group row p-t-10">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Location Name
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Location Name" class="form-control" id="name" name="name" value="{{$location->name}}">
                            <!-- <span id="val_name" style="color: red"></span> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Location Code
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Location Code" class="form-control" id="code" name="code" value="{{$location->code}}">
                            <span id="val_loc_code" style="color: red"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Delivery Address
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Delivery Address" id="address" class="form-control" name="address" value="{{$location->address}}">
                            <span id="val_address" style="color: red"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Default Location
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <select class="form-control js-example-basic-single select2-hidden-accessible " name="is_default" id="is_default" data-select2-id="default" tabindex="-1" aria-hidden="true" style="height: calc(2.19rem + 2px)">
                                <option value="0" data-select2-id="2" @if($location->is_default== 0) ? selected : notselect @endif
                                    >No</option>
                                <option value="1" @if($location->is_default== 1) ? selected : notselect @endif
                                    >Yes</option>
                            </select>
                            <label id="default-error" class="error" for="default"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Phone One
                        </label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Phone One" class="form-control" name="phone" value="{{$location->phone}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Fax
                        </label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Fax" class="form-control" name="fax" value="{{$location->fax}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Email
                        </label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Email" class="form-control" name="email" value="{{$location->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Contact
                        </label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Contact" class="form-control" name="contact" value="{{$location->contact}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">Status
                            <span class="text-danger"> *</span>
                        </label>

                        <div class="col-sm-6">
                            <select class="form-control js-example-basic-single select2-hidden-accessible" name="status" id="status" data-select2-id="status" tabindex="-1" aria-hidden="true" style="height: calc(2.19rem + 2px)">
                                <option value="1" data-select2-id="4" @if($location->status== 1) ? selected : notselect @endif
                                    >Active</option>
                                <option value="0" @if($location->status== 0) ? selected : notselect @endif
                                    >Inactive</option>
                            </select>
                            <label id="status-error" class="error" for="status"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="btn_save" class="col-sm-0 pl-2 ml-2 control-label"></label>
                        <button type="submit" class="btn btn-primary custom-btn-small float-left submit">Update</button>
                    </div>
                </form>
                @endforeach
            </div>
            <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>
<script src="{{asset('dattaAble/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('dattaAble/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js')}}"></script>

<script>
    $('#formID').validate({
        rules: {
            name: {
                required: true
            },
            code: {
                required: true
            },
            address: {
                required: true
            },
            phone: {
                number: true
            },
            email: {
                email: true
            }
        }
    });
</script>
@endsection