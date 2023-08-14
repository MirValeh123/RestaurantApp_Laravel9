@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row  justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <i class="fa-solid fa-burger"></i>Menu
            <a href="{{route('menu.create')}}" class="btn btn-success btn-sm float-right"  style="color: white!important"><i class="fas fa-plus" style="margin-right: 3px" ></i>Create Menu</a>
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
                        <th scope="col" >Category</th>
                        <th scope="col" >Image</th>
                        <th scope="col" >Price</th>
                        <th scope="col" >Description</th>
                        <th scope="col" >Edit</th>
                        <th scope="col" >Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr>
                            <td scope="row" >{{$menu->id}}</td>
                            <td >{{$menu->name}}</td>
                            <td >{{$menu->category->name}}</td>
                            <td ><img width="350" height="350" class="img-thumbnail" src="{{asset('menu_images')}}/{{$menu->image}}" alt="" srcset=""></td>
                            <td >{{$menu->price}}</td>
                            <td >{{$menu->description}}</td>
                            <td ><a href="/management/menu/{{$menu->id}}/edit" class="btn btn-primary">Edit</a></td>
                            <td ><a href="/management/menu/{{$menu->id}}/destroy" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $menus->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</div>
@endsection