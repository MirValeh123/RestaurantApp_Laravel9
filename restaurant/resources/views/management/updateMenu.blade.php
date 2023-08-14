@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row  justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <div class="row">
                <div class="category">
                    <i class="fa-solid fa-burger"></i>Edit Menu
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
            <form action="{{route('menu.update',$menu->id)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Menu Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Menu....." value="{{$menu->name}}" >
                    <label for="menuPrice">Price</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar) " value="{{$menu->price}}">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                    
                      
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Image</label>
                        <input class="form-control form-control-sm" name="image"  id="formFileSm" type="file" value="">
                      </div>
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description....." value="{{$menu->description}}" >
                    </div>
                    <div class="form-group">
                        <label for="Category">Category </label>
                        <select type="text" class="form-control" name="category_id" >
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                                
                            @endforeach
                        </select>
                    </div>
                      
                     
                      
                      
                    
                    
                    <button style="margin-top:10px" type="submit" class="btn btn-info" >Update</button>
                </div>
                
            </form>

        </div>
    </div>

</div>
@endsection