@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row  justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <i class="fas fa-users"></i>User
            <a href="{{route('user.create')}}" class="btn btn-success btn-sm float-right"  style="color: white!important"><i class="fas fa-plus" style="margin-right: 3px" ></i>Create User</a>
            <hr>

            @if (Session()->has('status'))
                <div class="alert alert-success">
                    <button class="btn btn-danger close" type="button" data-dissmiss='alert' >X</button>
                    {{Session()->get('status')}}
                </div>

            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" >ID</th>
                        <th scope="col" >Name</th>
                        <th scope="col" >Role</th>
                        <th scope="col" >Email</th>
                        <th scope="col" >Edit</th>
                        <th scope="col" >Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row" >{{$user->id}}</td>
                            <td >{{$user->name}}</td>
                            <td >{{$user->role}}</td>
                            <td >{{$user->email}}</td>
                            <td ><a href="/management/user/{{$user->id}}/edit" class="btn btn-primary">Edit</a></td>
                            <td ><a href="/management/user/{{$user->id}}/destroy" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {!! $menus->withQueryString()->links('pagination::bootstrap-5') !!} --}}
        </div>
    </div>

</div>
@endsection
