@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row  justify-content-center">
        <div class="col-md-4">
            <div class="list-group">
                <div class="list-group-item  list-group-item-action"><a href="management/category"><i class="fa-solid fa-bars"></i>Category</a></div>
                <div class="list-group-item  list-group-item-action"><i class="fa-solid fa-burger"></i>Menu</div>
                <div class="list-group-item  list-group-item-action"><i class="fa-solid fa-chair"></i>Table</div>
                <div class="list-group-item  list-group-item-action"><i class="fa-solid fa-user-gear"></i>User</div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="category">
                    <i class="fas fa-align-justify" ></i>Category
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
            <form action="/management/category/{{$category->id}}/edit" method="POST" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input value="{{$category->name}}" type="text" name="name" class="form-control" placeholder="Category....." >
                    <button style="margin-top:10px" type="submit" class="btn btn-info" >Update</button>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection