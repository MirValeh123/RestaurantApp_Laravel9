@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row  justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <div class="row">
                <div class="category">
                    <i class="fas fa-users"></i>User
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
            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="UserName....." >





                    <div class="form-group">
                        <label for="role">Role </label>
                        <input type="text" name="role" class="form-control" placeholder="Role....." >

                    </div>
                    <div class="form-group">
                        <label for="Description">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email....." >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password....." >
                    </div>






                    <button style="margin-top:10px" type="submit" class="btn btn-primary" >Save</button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
