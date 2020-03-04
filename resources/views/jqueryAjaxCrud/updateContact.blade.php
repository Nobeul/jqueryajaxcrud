@extends('jqueryAjaxCrud.master')

@section('body')
<div class="container" style="margin-top:15px">

        <div class="">
            <h3>Contact info </h3>
        </div>

        <!-- <form class="form-inline my-2 my-lg-0" style="margin-left:15px">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
        <form action="{{route('update',$contact->id)}}" method="POST">
            @csrf
        <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$contact->name}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$contact->email}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="{{$contact->password}}">
            </div>
            <input class="btn btn-success" type="submit" value="Update" name="submit">
            
            
            
        </form>


</div>
@endsection