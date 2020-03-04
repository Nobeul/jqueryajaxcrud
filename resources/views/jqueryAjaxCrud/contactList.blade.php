@extends('jqueryAjaxCrud.master')

@section('body')
<div class="container" style="margin-top:15px">

    <div class="">
        <h3>Contact info </h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- autocomplete starts here -->
            <div class="form-group">
                <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Search..." />
                <div id="countryList">
                </div>
            </div>
        </div>
        {{ csrf_field() }}
        <!-- autocomplete ends here -->
        <div class="col-md-6">
            <!-- Button trigger modal -->
            <a class="btn btn-success btn-sm float-right" style="color:white; margin-bottom: 10px" onclick="create()">Add new</a>
        </div>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="modalForm">
                    <div class="modal-body">
                        <input type="hidden" name="id">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name here">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email here">
                            <span id="availability" style="color: red"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput3">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Enter your password here">
                            <!-- <span id="passwordError"></span> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput4">Confirm Password</label>
                            <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter your password again">
                            <span id="passwordError"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btnSave" onclick="store()">Save</button>
                        <button type="submit" class="btn btn-primary btnUpdate" onclick="update()">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this contact?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modalDltBtn" class="btn btn-danger btnDelete" data-id="">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('script')
<script>
    var _modal = $('#modal');
    var btnSave = $('.btnSave');
    var btnUpdate = $('.btnUpdate');

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': '{{csrf_token()}}'
        }
    });

    function getRecords() {
        $.ajax({
            //Ajax get request
            type: 'get',
            url: "{{URL::to('/contact/data')}}",
            success: function(data) {
                // console.log(data);
                var html = '';
                data.forEach(function(row) {
                    html += '<tr>'
                    html += '<td>' + row.id + '</td>'
                    html += '<td>' + row.name + '</td>'
                    html += '<td>' + row.email + '</td>'
                    html += '<td>' + row.password + '</td>'
                    html += '<td>'
                    html += '<button type="button" class="btn btn-warning btnEdit" title="Edit Record">Edit</button>'
                    html += '<button type="button" data-rel=' + row.id + ' class="btn btn-danger tableDltBtn" style="margin-left:10px" data-toggle="modal" data-target="#DeleteModal" title="Delete Record">Delete</button>'
                    html += '</td></tr>';
                })
                $('table tbody').html(html)
            }
        });
    }
    getRecords()

    function reset() {
        _modal.find('input').each(function() {
            $(this).val(null)
        })
    }

    function getInputs() {
        var id = $('input[name = "id"]').val();
        var name = $('input[name = "name"]').val();
        var email = $('input[name = "email"]').val();
        var password = $('input[name = "password"]').val();
        var token = "{{ csrf_token()}}";

        return {
            id: id,
            name: name,
            email: email,
            password: password,
            _token: token
        }
    }

    function create() {
        $('.modal-title').text('New Contact');
        reset();
        $('#modal').modal();
        btnSave.show();
        btnUpdate.hide();
    }

    $(document).on('click', '.tableDltBtn', function() {
        var id = $(this).attr('data-rel');
        $('#modalDltBtn').attr('data-id', id);
    });

    /*$('form#modalForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "{{url('contact/store')}}",
            dataType: "json",
            cache: false,
            data: getInputs(),
        })
        .done(function(response)
        {
            if (response.success == true) {
                $('#modalForm').modal('hide');
            }
            console.log(response);
        });
    });*/


    function store() {
        // event.preventDefault();
        $.ajax({
                method: "POST",
                url: "{{url('contact/store')}}",
                dataType: "json",
                cache: false,
                data: getInputs(),
            })
            .done(function(response) {
                if (response.success == true) {
                    $('#modal').modal('hide');
                }
                console.log(response);
            });
    }

    $('#email').blur(function() {

        var email = $(this).val();

        $.ajax({
                url: "{{url('contact/store')}}",
                method: "POST",
                dataType: "JSON",
                data: {
                    'email': email
                }
            })
            .done(function(response) {
                if (response.success == false) {

                    $('#availability').html(response.message);
                }
            });

    });


    $('#password, #confirm_password').on('keyup', function() {
        if ($('#password').val() == $('#confirm_password').val()) {
            
            $('#passwordError').html('Passwords matched').css('color', 'green');
           
        } else{
            $('#passwordError').html('Passwords did not match').css('color', 'red');
        }
    });

    $('table').on('click', '.btnEdit', function() {
        $('.modal-title').text('Edit Contact');
        $('#modal').modal();
        btnSave.hide();
        btnUpdate.show();

        var id = $(this).parent().parent().find('td').eq(0).text()
        var name = $(this).parent().parent().find('td').eq(1).text()
        var email = $(this).parent().parent().find('td').eq(2).text()
        var password = $(this).parent().parent().find('td').eq(3).text()

        $('input[name="id"]').val(id)
        $('input[name="name"]').val(name)
        $('input[name="email"]').val(email)
        $('input[name="password"]').val(password)

    })

    function update() {

        $.ajax({
            method: 'POST',
            url: "{{URL::to('/contact/update')}}",
            data: getInputs(),
            dataType: 'JSON',
            success: function() {
                console.log('Updated')
                reset()
                $('#modal').modal('hide')
                getRecords();
            }
        })
    }

    $(document).on('click', '.btnDelete', function() {
        var id = $(this).attr('data-id');
        $('.btnDelete').attr('data-id', id);
        var data = {
            id: id
        }
        $.ajax({
            method: 'POST',
            url: "{{URL::to('/contact/delete')}}",
            data: data,
            dataType: 'JSON',
            success: function() {
                console.log('deleted');
                getRecords();
                $('#DeleteModal').modal('hide')

            }
        })

    })



    // validation starts here
    $('#modalForm').validate({
        rules: {
            name: {
                minlength: 2,
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
            confirm_password: {
                required: true
            }

        }
    });

    // Autocomplete ajax
    // $(document).ready(function() {

    //     $('#country_name').keyup(function() {
    //         var query = $(this).val();
    //         if(query == ''){
    //             $('#countryList').hide();
    //         }
    //         if (query != '') {
    //             var _token = $('input[name="_token"]').val();
    //             $.ajax({
    //                 url: "{{ route('autocomplete.fetch') }}",
    //                 method: "POST",
    //                 data: {
    //                     query: query,
    //                     _token: _token
    //                 },
    //                 success: function(data) {
    //                     $('#countryList').fadeIn();
    //                     $('#countryList').html(data);
    //                 }
    //             });
    //         }
    //     });

    //     $(document).on('click', 'li', function() {
    //         $('#country_name').val($(this).text());
    //         $('#countryList').fadeOut();

    //     //     $.ajax({
    //     //     //Ajax get request
    //     //     // type: 'get',
    //     //     // url: "{{URL::to('/contact/data')}}",
    //     //     success: function(data) {
    //     //         // console.log(data);
    //     //         var html = '';
    //     //         // data.forEach(function(row) {
    //     //             html += '<tr>'
    //     //             html += '<td> id </td>'
    //     //             html += '<td> Name </td>'
    //     //             html += '<td> Email </td>'
    //     //             html += '<td> Password </td>'
    //     //             html += '<td>'
    //     //             html += '<button type="button" class="btn btn-warning btnEdit" title="Edit Record">Edit</button>'
    //     //             html += '<button type="button"  class="btn btn-danger tableDltBtn" style="margin-left:10px" data-toggle="modal" data-target="#DeleteModal" title="Delete Record">Delete</button>'
    //     //             html += '</td></tr>';
    //     //         // })
    //     //         $('table tbody').html(html)
    //     //     }
    //     // });
    //     });

    // });
    // Autocomplete ends here


    $('#country_name').on('keyup', function() {
        $value = $(this).val();

        $.ajax({
            type: 'get',
            url: "{{URL::to('search')}}",
            data: {
                'search': $value
            },
            success: function(data) {
                console.log(data);
                $('tbody').html(data);
            }
        });
    });
</script>
@endsection