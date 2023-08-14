@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row  justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <i class="fas fa-align-justify" ></i>Category
            <a href="/management/category/create" class="btn btn-success btn-sm float-right"  style="color: white!important"><i class="fas fa-plus" style="margin-right: 3px" ></i>Create Category</a>
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
                        <th scope="col" >Category</th>
                        <th scope="col" >Edit</th>
                        <th scope="col" >Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td scope="row" >{{$category->id}}</td>
                            <td >{{$category->name}}</td>
                            <td ><a href="{{route('category.edit',$category->id)}}" class="btn btn-primary">Edit</a></td>
                            <td ><a href="{{route('category.destroy',$category->id)}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</div>
@endsection