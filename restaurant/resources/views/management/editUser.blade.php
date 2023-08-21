@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row  justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <div class="row">
                <div class="category">
                    <i class="fas fa-users"></i>Edit User
                </div>
            </div>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
            <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="UserName....."  value="{{$user->name}}" >





                    <div class="form-group">
                        <label for="role">Role </label>
                        <input type="text" name="role" class="form-control" placeholder="Role....." value="{{$user->role}}" >

                    </div>
                    <div class="form-group">
                        <label for="Description">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email....." value="{{$user->email}}" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password....." value="{{$user->password}}" >
                    </div>






                    <button style="margin-top:10px" type="submit" class="btn btn-success" >Update</button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
