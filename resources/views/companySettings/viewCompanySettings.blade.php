@extends('admin.masteradmin')
@section('content')
<div class="col-sm-12">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li {{(request()->path() == 'admin/location') ? 'class="active"' : null}} @php if('class=="active"'){
                echo ' style="background-color:#3490dc;';
                echo 'border-radius: 0.25rem;"';
                }
            @endphp><a class="nav-link text-left" id="v-pills-home-tab" href="{{route('company.viewSettings')}}" style="@php if(' class=="active"') echo ' color:#fff';@endphp">Company Settings</a></li>
                <li><a class="nav-link text-left" id="v-pills-profile-tab" href="{{route('department.viewlist')}}">Department</a></li>
                <li><a class="nav-link text-left" id="v-pills-messages-tab aa" href="{{route('addUserRole')}}">User Roles</a></li>
                <li><a class="nav-link text-left" id="v-pills-settings-tab bb" href="{{route('settings.viewLocation')}}" style="">Locations</a></li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="tab-content" id="v-pills-tabContent">
                <form id="formID" method="POST" action="{{route('company.saveSettings')}}" enctype="multipart/form-data">
                    @csrf()
                    <input type="hidden" name="id" value="{{!empty($companies->id) ? $companies->id : ''}}">
                    <div class="form-group row p-t-10">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Name
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{!empty($companies->name) ? $companies->name : ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Site Short Name
                        </label>
                        <div class="col-sm-6">
                            <input type="text" readonly="readonly" class="form-control" id="site_short_name" name="site_short_name" value="{{!empty($companies->site_short_name) ? $companies->site_short_name : ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Email
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email" value="{{!empty($companies->email) ? $companies->email : ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Phone One
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="phone" value="{{!empty($companies->phone) ? $companies->phone : ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Tax Id
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="tax_id" class="form-control" name="tax_id" value="{{!empty($companies->tax_id) ? $companies->tax_id : ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            City
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="city" class="form-control" name="city" value="{{!empty($companies->city) ? $companies->city : ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            State
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="state" class="form-control" name="state" value="{{!empty($companies->state) ? $companies->state : ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Street
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="street" class="form-control" name="street" value="{{!empty($companies->street) ? $companies->street : ''}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Zip code
                        </label>
                        <div class="col-sm-6">
                            <input type="text" id="zip_code" class="form-control" name="zip_code" value="{{!empty($companies->zip_code) ? $companies->zip_code : ''}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Country
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <select class="form-control js-example-basic-single select2-hidden-accessible " name="country_name" id="is_default" data-select2-id="default" tabindex="-1" aria-hidden="true" style="height: calc(2.19rem + 2px)">
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}"> {{$country->country_name}} </option>
                                @endforeach
                            </select>
                            <label id="country-error" class="error" for="country"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Default language
                        </label>
                        <div class="col-sm-6">

                            <select class="form-control js-example-basic-single select2-hidden-accessible " name="language_name" id="language_name" data-select2-id="default" tabindex="-1" aria-hidden="true" style="height: calc(2.19rem + 2px)">
                                <!-- <option value="2" selected> English </option> -->
                                @foreach($languages as $language)
                                <option value="{{ $language->id }}"> {{$language->language_name}} </option>
                                @endforeach
                            </select>
                            <label id="language-error" class="error" for="language"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Default currency
                        </label>
                        <div class="col-sm-6">

                            <select class="form-control js-example-basic-single select2-hidden-accessible " name="currency_name" id="currency_name" data-select2-id="default" tabindex="-1" aria-hidden="true" style="height: calc(2.19rem + 2px)">
                                <!-- <option value="2" selected> Dollar </option> -->
                                @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}"> {{$currency->currency_name}} </option>
                                @endforeach
                            </select>
                            <label id="currency-error" class="error" for="currency"></label>
                        </div>
                    </div>
                    <div class="form-group row" id="getBottomMargin" style="margin-bottom: 35px">
                        <label class="col-sm-3 control-label " for="inputEmail3">Logo</label>
                        <div class="custom-file col-sm-7">
                            <div class="custom-file">
                                <input name="logo" class="form-control custom-file-input" type="file" id="logo" data-rel="986bcf224680f2ad5b7e544670d58a6f_1_avatar-300x300.png">
                                <label style="overflow: hidden;" class="custom-file-label" for="item_image">Upload logo...</label>
                                <div class="py-1" id="note_txt_1">
                                    <span class="badge badge-danger">Note! </span> Allowed File Extensions: jpg, jpeg, png
                                </div>
                                <div class="col-md-12" id="note_txt_2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label " for="inputEmail3"></label>
                        <div class="col-sm-7">
                            <div id="logoCompany">

                                @if(!empty($companies->logo))

                                <img alt="Company Logo" src="{{asset('images/'.$companies->logo)}}" class="img-responsive asa" id="pro_img" style="padding: 10px 10px"><span class="remove_img_preview"></span>
                                @endif
                            </div>
                            <input type="hidden" name="pic" value="986bcf224680f2ad5b7e544670d58a6f_1_avatar-300x300.png">
                        </div>
                    </div>
                    <div class="form-group row" id="getBottomMargin">
                        <label class="col-sm-3 control-label " for="inputEmail3">Favicon
                        </label>
                        <div class="custom-file col-sm-7">
                            <div class="custom-file">
                                <input name="favicon" class="form-control custom-file-input" type="file" id="favicon" data-rel="986bcf224680f2ad5b7e544670d58a6f_1_avatar-300x300.png">
                                <label style="overflow: hidden;" class="custom-file-label" for="item_image">Upload logo...</label>
                                <div class="py-1" id="note_txt_1">
                                    <span class="badge badge-danger">Note! </span> Allowed File Extensions: jpg, jpeg, png
                                </div>
                                <div class="col-md-12" id="note_txt_2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label " for="inputEmail3"></label>
                        <div class="col-sm-7">
                            <div id="logoCompany">
                                @if(!empty($companies->favicon))
                                <img alt="Company Logo" src="{{asset('images/'.$companies->favicon)}}" class="img-responsive asa" id="pro_img" style="padding: 10px 10px"><span class="remove_img_preview"></span>
                                @endif
                            </div>
                            <input type="hidden" name="pic" value="986bcf224680f2ad5b7e544670d58a6f_1_avatar-300x300.png">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="btn_save" class="col-sm-0 pl-2 ml-2 control-label"></label>
                        <button type="submit" class="btn btn-primary custom-btn-small float-left submit" id="submitBtn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('dattaAble/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('dattaAble/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
    $('#formID').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true
            },
            phone: {
                required: true
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
            street: {
                required: true
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
            logo: {
                extension: "jpg|jpeg|png"
            },
            favicon: {
                extension: "jpg|jpeg|png"
            }
        }
    });
</script>
@endsection