@extends('jqueryAjaxCrud.master')

@section('body')
<div class="container" style="margin-top:15px">

        <div class="">
            <h3>Contact info </h3>
        </div>
        <a class="btn btn-success btn-sm pull right" href="">Add new</a>
        <form action="{{route('store')}}" method="POST">
            @csrf
        <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name here">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email here">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Enter your password here">
            </div>
            <input class="btn btn-success" type="submit" value="submit" name="submit">
        </form>
</div>
@endsection