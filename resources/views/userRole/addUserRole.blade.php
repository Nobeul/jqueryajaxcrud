@extends('admin.masteradmin')
@section('content')
<div class="col-sm-12">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li><a class="nav-link text-left" id="v-pills-home-tab" href="{{route('company.viewSettings')}}">Company Settings</a></li>
                <li><a class="nav-link text-left" id="v-pills-profile-tab" href="{{route('department.viewlist')}}">Department</a></li>
                <li @php if(request()->path() == 'admin/userrole/addUserRole')
                    {
                    echo 'class="active"';
                    echo ' style="background-color:#3490dc;';
                    echo 'border-radius: 0.25rem;"';
                    }
                    @endphp><a class="nav-link text-left" id="v-pills-messages-tab aa" href="{{route('addUserRole')}}" style="@php if(' class==" active"') echo ' color:#fff' ;@endphp">User Roles</a></li>
                <li><a class="nav-link text-left" id="v-pills-settings-tab bb" href="{{route('settings.viewLocation')}}" style="">Locations</a></li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="tab-content" id="v-pills-tabContent">
                <form id="formID" method="POST" action="" data-parsley-validate="">
                    @csrf()
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
                            Display Name
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="display_name" name="display_name" placeholder="Display Name">
                        </div>
                    </div>
                    <div class="form-group row p-t-10">
                        <label class="col-sm-3 control-label a" for="inputEmail3">
                            Description
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" style="text-align: left; font-size: 13px;" for="inputEmail3">
                            Permissions
                            <span class="text-danger"> *</span>
                        </label>
                        <div class="col-md-12">
                            <div id="dataTableBuilder_wrapper" class="dataTables_wrapper no-footer">
                                <table id="dataTableBuilder" class="table table-responsive table-bordered table-hover table-striped dt-responsive dataTable no-footer dtr-inline" width="100%" cellspacing="0" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th style="text-align: left; width: 350px;" class="sorting_asc" tabindex="0" aria-controls="dataTableBuilder" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Permissions: activate to sort column descending">Permissions</th>
                                            <th style="text-align: left; width: 350px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="View">View</th>
                                            <th style="overflow-wrap: break-word; white-space: normal; width: 350px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Own View">Own View</th>
                                            <th style="text-align: left; width: 350px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Add">Add</th>
                                            <th style="text-align: left; width: 350px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Edit">Edit</th>
                                            <th style="text-align: left; width: 350px;" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Delete">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Account type </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="211" id="view_accounttype" key="accounttype" status="view">
                                                    <label for="view_accounttype" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="212" id="add_view_accounttype" key="accounttype">
                                                    <label for="add_view_accounttype" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="213" id="edit_view_accounttype" key="accounttype">
                                                    <label for="edit_view_accounttype" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="214" id="delete_view_accounttype" key="accounttype">
                                                    <label for="delete_view_accounttype" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Balance transfer </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="40" id="view_balancetransfer" key="balancetransfer" status="view">
                                                    <label for="view_balancetransfer" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="164" id="own_view_balancetransfer" key="balancetransfer" status="own_view">
                                                    <label for="own_view_balancetransfer" class="cr"></label>
                                                </div>


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="41" id="add_view_balancetransfer" key="balancetransfer">
                                                    <label for="add_view_balancetransfer" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="42" id="edit_view_balancetransfer" key="balancetransfer">
                                                    <label for="edit_view_balancetransfer" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="43" id="delete_view_balancetransfer" key="balancetransfer">
                                                    <label for="delete_view_balancetransfer" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Bank account </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="32" id="view_bankaccount" key="bankaccount" status="view">
                                                    <label for="view_bankaccount" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;


                                            </td>

                                            <td>

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="33" id="add_view_bankaccount" key="bankaccount">
                                                    <label for="add_view_bankaccount" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="34" id="edit_view_bankaccount" key="bankaccount">
                                                    <label for="edit_view_bankaccount" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="35" id="delete_view_bankaccount" key="bankaccount">
                                                    <label for="delete_view_bankaccount" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Banking and transactions </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="31" id="view_bankingandtransactions" key="bankingandtransactions" status="view">
                                                    <label for="view_bankingandtransactions" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Barcode </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="112" id="view_barcode" key="barcode" status="view">
                                                    <label for="view_barcode" class="cr"></label>
                                                </div>
                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Calendar </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="143" id="add_view_calendar" key="calendar">
                                                    <label for="add_view_calendar" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>

                                                &nbsp;
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="144" id="edit_view_calendar" key="calendar">
                                                    <label for="edit_view_calendar" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="145" id="delete_view_calendar" key="calendar">
                                                    <label for="delete_view_calendar" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Currencies </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="94" id="view_currencies" key="currencies" status="view">
                                                    <label for="view_currencies" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="95" id="add_view_currencies" key="currencies">
                                                    <label for="add_view_currencies" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="96" id="edit_view_currencies" key="currencies">
                                                    <label for="edit_view_currencies" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;


                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="97" id="delete_view_currencies" key="currencies">
                                                    <label for="delete_view_currencies" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Customer Note </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="191" id="add_view_CustomerNote" key="CustomerNote">
                                                    <label for="add_view_CustomerNote" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="192" id="edit_view_CustomerNote" key="CustomerNote">
                                                    <label for="edit_view_CustomerNote" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>
                                            <td>
                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="193" id="delete_view_CustomerNote" key="CustomerNote">
                                                    <label for="delete_view_CustomerNote" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;
                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Customer payments </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="23" id="view_customerpayments" key="customerpayments" status="view">
                                                    <label for="view_customerpayments" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="161" id="own_view_customerpayments" key="customerpayments" status="own_view">
                                                    <label for="own_view_customerpayments" class="cr"></label>
                                                </div>

                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="24" id="add_view_customerpayments" key="customerpayments">
                                                    <label for="add_view_customerpayments" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="25" id="edit_view_customerpayments" key="customerpayments">
                                                    <label for="edit_view_customerpayments" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="26" id="delete_view_customerpayments" key="customerpayments">
                                                    <label for="delete_view_customerpayments" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Customers </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="2" id="view_customers" key="customers" status="view">
                                                    <label for="view_customers" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;


                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="3" id="add_view_customers" key="customers">
                                                    <label for="add_view_customers" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="4" id="edit_view_customers" key="customers">
                                                    <label for="edit_view_customers" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="5" id="delete_view_customers" key="customers">
                                                    <label for="delete_view_customers" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Database backups </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="85" id="view_databasebackups" key="databasebackups" status="view">
                                                    <label for="view_databasebackups" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="86" id="add_view_databasebackups" key="databasebackups">
                                                    <label for="add_view_databasebackups" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="113" id="edit_view_databasebackups" key="databasebackups">
                                                    <label for="edit_view_databasebackups" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="87" id="delete_view_databasebackups" key="databasebackups">
                                                    <label for="delete_view_databasebackups" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Default income expense category </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="157" id="view_defaultincomeexpensecategory" key="defaultincomeexpensecategory" status="view">
                                                    <label for="view_defaultincomeexpensecategory" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Departments </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="134" id="view_departments" key="departments" status="view">
                                                    <label for="view_departments" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="135" id="add_view_departments" key="departments">
                                                    <label for="add_view_departments" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="136" id="edit_view_departments" key="departments">
                                                    <label for="edit_view_departments" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="137" id="delete_view_departments" key="departments">
                                                    <label for="delete_view_departments" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Deposits </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="36" id="view_deposits" key="deposits" status="view">
                                                    <label for="view_deposits" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="163" id="own_view_deposits" key="deposits" status="own_view">
                                                    <label for="own_view_deposits" class="cr"></label>
                                                </div>

                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="37" id="add_view_deposits" key="deposits">
                                                    <label for="add_view_deposits" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="38" id="edit_view_deposits" key="deposits">
                                                    <label for="edit_view_deposits" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="39" id="delete_view_deposits" key="deposits">
                                                    <label for="delete_view_deposits" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Email setup </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="88" id="view_emailsetup" key="emailsetup" status="view">
                                                    <label for="view_emailsetup" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Email template </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="107" id="view_emailtemplate" key="emailtemplate" status="view">
                                                    <label for="view_emailtemplate" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Expenses </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="45" id="view_expenses" key="expenses" status="view">
                                                    <label for="view_expenses" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="166" id="own_view_expenses" key="expenses" status="own_view">
                                                    <label for="own_view_expenses" class="cr"></label>
                                                </div>

                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="46" id="add_view_expenses" key="expenses">
                                                    <label for="add_view_expenses" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="47" id="edit_view_expenses" key="expenses">
                                                    <label for="edit_view_expenses" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="48" id="delete_view_expenses" key="expenses">
                                                    <label for="delete_view_expenses" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Finances </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="89" id="view_finances" key="finances" status="view">
                                                    <label for="view_finances" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                General ledger </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="156" id="view_generalledger" key="generalledger" status="view">
                                                    <label for="view_generalledger" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Income expense categories </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="77" id="view_incomeexpensecategories" key="incomeexpensecategories" status="view">
                                                    <label for="view_incomeexpensecategories" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="78" id="add_view_incomeexpensecategories" key="incomeexpensecategories">
                                                    <label for="add_view_incomeexpensecategories" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="79" id="edit_view_incomeexpensecategories" key="incomeexpensecategories">
                                                    <label for="edit_view_incomeexpensecategories" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="80" id="delete_view_incomeexpensecategories" key="incomeexpensecategories">
                                                    <label for="delete_view_incomeexpensecategories" class="cr"></label>
                                                </div>

                                                &nbsp;
                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Invoices </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="19" id="view_invoices" key="invoices" status="view">
                                                    <label for="view_invoices" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="160" id="own_view_invoices" key="invoices" status="own_view">
                                                    <label for="own_view_invoices" class="cr"></label>
                                                </div>

                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="20" id="add_view_invoices" key="invoices">
                                                    <label for="add_view_invoices" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="21" id="edit_view_invoices" key="invoices">
                                                    <label for="edit_view_invoices" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="22" id="delete_view_invoices" key="invoices">
                                                    <label for="delete_view_invoices" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Item categories </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="73" id="view_itemcategories" key="itemcategories" status="view">
                                                    <label for="view_itemcategories" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="74" id="add_view_itemcategories" key="itemcategories">
                                                    <label for="add_view_itemcategories" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="75" id="edit_view_itemcategories" key="itemcategories">
                                                    <label for="edit_view_itemcategories" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="76" id="delete_view_itemcategories" key="itemcategories">
                                                    <label for="delete_view_itemcategories" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Items </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="10" id="view_items" key="items" status="view">
                                                    <label for="view_items" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="11" id="add_view_items" key="items">
                                                    <label for="add_view_items" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="12" id="edit_view_items" key="items">
                                                    <label for="edit_view_items" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="13" id="delete_view_items" key="items">
                                                    <label for="delete_view_items" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Languages </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="175" id="view_Languages" key="Languages" status="view">
                                                    <label for="view_Languages" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="176" id="add_view_Languages" key="Languages">
                                                    <label for="add_view_Languages" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="178" id="edit_view_Languages" key="Languages">
                                                    <label for="edit_view_Languages" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="177" id="delete_view_Languages" key="Languages">
                                                    <label for="delete_view_Languages" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Lead Source </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="198" id="view_LeadSource" key="LeadSource" status="view">
                                                    <label for="view_LeadSource" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="199" id="add_view_LeadSource" key="LeadSource">
                                                    <label for="add_view_LeadSource" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="200" id="edit_view_LeadSource" key="LeadSource">
                                                    <label for="edit_view_LeadSource" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="201" id="delete_view_LeadSource" key="LeadSource">
                                                    <label for="delete_view_LeadSource" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Lead Status </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="194" id="view_LeadStatus" key="LeadStatus" status="view">
                                                    <label for="view_LeadStatus" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="195" id="add_view_LeadStatus" key="LeadStatus">
                                                    <label for="add_view_LeadStatus" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="196" id="edit_view_LeadStatus" key="LeadStatus">
                                                    <label for="edit_view_LeadStatus" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="197" id="delete_view_LeadStatus" key="LeadStatus">
                                                    <label for="delete_view_LeadStatus" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Leads </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="202" id="view_Leads" key="Leads" status="view">
                                                    <label for="view_Leads" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="203" id="add_view_Leads" key="Leads">
                                                    <label for="add_view_Leads" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="204" id="edit_view_Leads" key="Leads">
                                                    <label for="edit_view_Leads" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>

                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="205" id="delete_view_Leads" key="Leads">
                                                    <label for="delete_view_Leads" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Locations </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="68" id="view_locations" key="locations" status="view">
                                                    <label for="view_locations" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>

                                            <td>
                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="69" id="add_view_locations" key="locations">
                                                    <label for="add_view_locations" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>
                                                &nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="70" id="edit_view_locations" key="locations">
                                                    <label for="edit_view_locations" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;

                                            </td>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="71" id="delete_view_locations" key="locations">
                                                    <label for="delete_view_locations" class="cr"></label>
                                                </div>

                                                &nbsp;

                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage company setting </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="59" id="view_managecompanysetting" key="managecompanysetting" status="view">
                                                    <label for="view_managecompanysetting" class="cr"></label>
                                                </div>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage expense report </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="55" id="view_manageexpensereport" key="manageexpensereport" status="view">
                                                    <label for="view_manageexpensereport" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage general settings </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="72" id="view_managegeneralsettings" key="managegeneralsettings" status="view">
                                                    <label for="view_managegeneralsettings" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage income report </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="56" id="view_manageincomereport" key="manageincomereport" status="view">
                                                    <label for="view_manageincomereport" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage income vs expense </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="57" id="view_manageincomevsexpense" key="manageincomevsexpense" status="view">
                                                    <label for="view_manageincomevsexpense" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage purchase report </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="53" id="view_managepurchasereport" key="managepurchasereport" status="view">
                                                    <label for="view_managepurchasereport" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage quotation email template </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="108" id="view_managequotationemailtemplate" key="managequotationemailtemplate" status="view">
                                                    <label for="view_managequotationemailtemplate" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage reports </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="49" id="view_managereports" key="managereports" status="view">
                                                    <label for="view_managereports" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage sale history report </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="52" id="view_managesalehistoryreport" key="managesalehistoryreport" status="view">
                                                    <label for="view_managesalehistoryreport" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage sale report </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="51" id="view_managesalereport" key="managesalereport" status="view">
                                                    <label for="view_managesalereport" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage sales </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="14" id="view_managesales" key="managesales" status="view">
                                                    <label for="view_managesales" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage setting </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="58" id="view_managesetting" key="managesetting" status="view">
                                                    <label for="view_managesetting" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage stock on hand </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="50" id="view_managestockonhand" key="managestockonhand" status="view">
                                                    <label for="view_managestockonhand" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage team report </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="54" id="view_manageteamreport" key="manageteamreport" status="view">
                                                    <label for="view_manageteamreport" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Manage_sms_template </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="217" id="view_manage_sms_template" key="manage_sms_template" status="view">
                                                    <label for="view_manage_sms_template" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Milestones </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="130" id="view_milestones" key="milestones" status="view">
                                                    <label for="view_milestones" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="131" id="add_view_milestones" key="milestones">
                                                    <label for="add_view_milestones" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="132" id="edit_view_milestones" key="milestones">
                                                    <label for="edit_view_milestones" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="133" id="delete_view_milestones" key="milestones">
                                                    <label for="delete_view_milestones" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Other settings </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="138" id="view_othersettings" key="othersettings" status="view">
                                                    <label for="view_othersettings" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Payment methods </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="102" id="view_paymentmethods" key="paymentmethods" status="view">
                                                    <label for="view_paymentmethods" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="104" id="edit_view_paymentmethods" key="paymentmethods">
                                                    <label for="edit_view_paymentmethods" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Payment terms </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="98" id="view_paymentterms" key="paymentterms" status="view">
                                                    <label for="view_paymentterms" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="99" id="add_view_paymentterms" key="paymentterms">
                                                    <label for="add_view_paymentterms" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="100" id="edit_view_paymentterms" key="paymentterms">
                                                    <label for="edit_view_paymentterms" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="101" id="delete_view_paymentterms" key="paymentterms">
                                                    <label for="delete_view_paymentterms" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Pos </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="215" id="view_pos" key="pos" status="view">
                                                    <label for="view_pos" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Preference </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="111" id="view_preference" key="preference" status="view">
                                                    <label for="view_preference" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Project file </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="153" id="delete_view_projectfile" key="projectfile">
                                                    <label for="delete_view_projectfile" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Project note </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="154" id="add_view_projectnote" key="projectnote">
                                                    <label for="add_view_projectnote" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="155" id="edit_view_projectnote" key="projectnote">
                                                    <label for="edit_view_projectnote" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Projects </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="122" id="view_projects" key="projects" status="view">
                                                    <label for="view_projects" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="174" id="own_view_projects" key="projects" status="own_view">
                                                    <label for="own_view_projects" class="cr"></label>
                                                </div>


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="123" id="add_view_projects" key="projects">
                                                    <label for="add_view_projects" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="124" id="edit_view_projects" key="projects">
                                                    <label for="edit_view_projects" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="125" id="delete_view_projects" key="projects">
                                                    <label for="delete_view_projects" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Purchase payments </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="114" id="view_purchasepayments" key="purchasepayments" status="view">
                                                    <label for="view_purchasepayments" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="167" id="own_view_purchasepayments" key="purchasepayments" status="own_view">
                                                    <label for="own_view_purchasepayments" class="cr"></label>
                                                </div>


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="115" id="add_view_purchasepayments" key="purchasepayments">
                                                    <label for="add_view_purchasepayments" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="116" id="edit_view_purchasepayments" key="purchasepayments">
                                                    <label for="edit_view_purchasepayments" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="117" id="delete_view_purchasepayments" key="purchasepayments">
                                                    <label for="delete_view_purchasepayments" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Purchase receive </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="140" id="view_purchasereceive" key="purchasereceive" status="view">
                                                    <label for="view_purchasereceive" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="168" id="own_view_purchasereceive" key="purchasereceive" status="own_view">
                                                    <label for="own_view_purchasereceive" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="141" id="edit_view_purchasereceive" key="purchasereceive">
                                                    <label for="edit_view_purchasereceive" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="142" id="delete_view_purchasereceive" key="purchasereceive">
                                                    <label for="delete_view_purchasereceive" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Purchase type </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="139" id="edit_view_purchasetype" key="purchasetype">
                                                    <label for="edit_view_purchasetype" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Purchases </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="27" id="view_purchases" key="purchases" status="view">
                                                    <label for="view_purchases" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="162" id="own_view_purchases" key="purchases" status="own_view">
                                                    <label for="own_view_purchases" class="cr"></label>
                                                </div>


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="28" id="add_view_purchases" key="purchases">
                                                    <label for="add_view_purchases" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="29" id="edit_view_purchases" key="purchases">
                                                    <label for="edit_view_purchases" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="30" id="delete_view_purchases" key="purchases">
                                                    <label for="delete_view_purchases" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Quotations </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="15" id="view_quotations" key="quotations" status="view">
                                                    <label for="view_quotations" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="159" id="own_view_quotations" key="quotations" status="own_view">
                                                    <label for="own_view_quotations" class="cr"></label>
                                                </div>


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="16" id="add_view_quotations" key="quotations">
                                                    <label for="add_view_quotations" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="17" id="edit_view_quotations" key="quotations">
                                                    <label for="edit_view_quotations" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="18" id="delete_view_quotations" key="quotations">
                                                    <label for="delete_view_quotations" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Roles </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="64" id="view_roles" key="roles" status="view">
                                                    <label for="view_roles" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="65" id="add_view_roles" key="roles">
                                                    <label for="add_view_roles" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="66" id="edit_view_roles" key="roles">
                                                    <label for="edit_view_roles" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="67" id="delete_view_roles" key="roles">
                                                    <label for="delete_view_roles" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Sms setup </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="158" id="view_smssetup" key="smssetup" status="view">
                                                    <label for="view_smssetup" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Stock Adjustment </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="170" id="edit_view_StockAdjustment" key="StockAdjustment">
                                                    <label for="edit_view_StockAdjustment" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="171" id="delete_view_StockAdjustment" key="StockAdjustment">
                                                    <label for="delete_view_StockAdjustment" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Stock transfer </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="169" id="delete_view_stocktransfer" key="stocktransfer">
                                                    <label for="delete_view_stocktransfer" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Suppliers </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="6" id="view_suppliers" key="suppliers" status="view">
                                                    <label for="view_suppliers" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="7" id="add_view_suppliers" key="suppliers">
                                                    <label for="add_view_suppliers" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="8" id="edit_view_suppliers" key="suppliers">
                                                    <label for="edit_view_suppliers" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="9" id="delete_view_suppliers" key="suppliers">
                                                    <label for="delete_view_suppliers" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Task assignee </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="151" id="add_view_taskassignee" key="taskassignee">
                                                    <label for="add_view_taskassignee" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="152" id="delete_view_taskassignee" key="taskassignee">
                                                    <label for="delete_view_taskassignee" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Task comment </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="146" id="edit_view_taskcomment" key="taskcomment">
                                                    <label for="edit_view_taskcomment" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="147" id="delete_view_taskcomment" key="taskcomment">
                                                    <label for="delete_view_taskcomment" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Task timer </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="179" id="add_view_tasktimer" key="tasktimer">
                                                    <label for="add_view_tasktimer" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="180" id="delete_view_tasktimer" key="tasktimer">
                                                    <label for="delete_view_tasktimer" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Tasks </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="126" id="view_tasks" key="tasks" status="view">
                                                    <label for="view_tasks" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="172" id="own_view_tasks" key="tasks" status="own_view">
                                                    <label for="own_view_tasks" class="cr"></label>
                                                </div>


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="127" id="add_view_tasks" key="tasks">
                                                    <label for="add_view_tasks" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="128" id="edit_view_tasks" key="tasks">
                                                    <label for="edit_view_tasks" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="129" id="delete_view_tasks" key="tasks">
                                                    <label for="delete_view_tasks" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Taxs </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="90" id="view_taxs" key="taxs" status="view">
                                                    <label for="view_taxs" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="91" id="add_view_taxs" key="taxs">
                                                    <label for="add_view_taxs" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="92" id="edit_view_taxs" key="taxs">
                                                    <label for="edit_view_taxs" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="93" id="delete_view_taxs" key="taxs">
                                                    <label for="delete_view_taxs" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Team members </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="60" id="view_teammembers" key="teammembers" status="view">
                                                    <label for="view_teammembers" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="61" id="add_view_teammembers" key="teammembers">
                                                    <label for="add_view_teammembers" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="62" id="edit_view_teammembers" key="teammembers">
                                                    <label for="edit_view_teammembers" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="63" id="delete_view_teammembers" key="teammembers">
                                                    <label for="delete_view_teammembers" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Tickets </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="118" id="view_tickets" key="tickets" status="view">
                                                    <label for="view_tickets" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="173" id="own_view_tickets" key="tickets" status="own_view">
                                                    <label for="own_view_tickets" class="cr"></label>
                                                </div>


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="119" id="add_view_tickets" key="tickets">
                                                    <label for="add_view_tickets" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="120" id="edit_view_tickets" key="tickets">
                                                    <label for="edit_view_tickets" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="121" id="delete_view_tickets" key="tickets">
                                                    <label for="delete_view_tickets" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Transactions </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="44" id="view_transactions" key="transactions" status="view">
                                                    <label for="view_transactions" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="165" id="own_view_transactions" key="transactions" status="own_view">
                                                    <label for="own_view_transactions" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="odd">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Units </td>

                                            <td>
                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="view-check" name="permissions[]" value="81" id="view_units" key="units" status="view">
                                                    <label for="view_units" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="82" id="add_view_units" key="units">
                                                    <label for="add_view_units" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="83" id="edit_view_units" key="units">
                                                    <label for="edit_view_units" class="cr"></label>
                                                </div>


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;

                                                <div style="width: 10px; float: center;" class="checkbox checkbox-success d-inline-block">
                                                    <input type="checkbox" class="crud" name="permissions[]" value="84" id="delete_view_units" key="units">
                                                    <label for="delete_view_units" class="cr"></label>
                                                </div>


                                                &nbsp;


                                            </td>

                                        </tr>
                                        <tr role="row" class="even">
                                            <td style="width: 10px;text-align: left;" tabindex="0" class="sorting_1">
                                                Url_shortner </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>
                                            <td>

                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                                &nbsp;


                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('dattaAble/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('dattaAble/assets/js/pcoded.min.js')}}"></script>
@endsection