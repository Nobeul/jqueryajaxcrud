@extends('admin.masteradmin')
@section('content')
<div class="col-sm-12">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li><a class="nav-link text-left active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a></li>
                <li><a class="nav-link text-left" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a></li>
                <li><a class="nav-link text-left" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a></li>
                <li><a class="nav-link text-left" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Locations</a></li>
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
                    <div class="col-md-6">

                        <form style="width: 200%"  id="formID" method="POST" action="{{route('settings.createLocation')}}" data-parsley-validate="">
                        @csrf()
                            <div class="form-group row p-t-10">
                                <label class="col-sm-3 control-label a" for="inputEmail3">
                                    Location Name
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Location Name" class="form-control" id="name" name="name">
                                    <span id="val_name" style="color: red"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label a" for="inputEmail3">
                                    Location Code
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Location Code" class="form-control" id="code" name="code">
                                    <span id="val_loc_code" style="color: red"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label a" for="inputEmail3">
                                    Delivery Address
                                    <span class="text-danger"> *</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Delivery Address" id="address" class="form-control" name="address">
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
                                        <option value="0" data-select2-id="2">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    <label id="default-error" class="error" for="default"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label a" for="inputEmail3">
                                    Phone One
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Phone One" class="form-control" name="phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label a" for="inputEmail3">
                                    Fax
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Fax" class="form-control" name="fax">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label a" for="inputEmail3">
                                    Email
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label a" for="inputEmail3">
                                    Contact
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Contact" class="form-control" name="contact">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label a" for="inputEmail3">Status
                                    <span class="text-danger"> *</span>
                                </label>

                                <div class="col-sm-6">
                                    <select class="form-control js-example-basic-single select2-hidden-accessible" name="status" id="status" data-select2-id="status" tabindex="-1" aria-hidden="true" style="height: calc(2.19rem + 2px)">
                                        <option value="1" data-select2-id="4">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <label id="status-error" class="error" for="status"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="btn_save" class="col-sm-0 pl-2 ml-2 control-label"></label>
                                <button type="submit" class="btn btn-primary custom-btn-small float-left submit">Submit</button>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js"></script> -->
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
                number:  true
            },
            email: {
                email: true
            }
        }
    });
</script>
@endsection