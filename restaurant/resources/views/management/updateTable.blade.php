@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row  justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <div class="row">
                <div class="category">
                    <i class="fa-solid fa-burger"></i>Edit Table
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
            <form action="{{route('table.update',$table->id)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Table Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Table....." value="{{$table->name}}" >
                    <label for="status">Table Status</label>
                    <input type="text" name="status" class="form-control" placeholder="Status....." value="{{$table->status}}" >
                    
                    
                    
                    
                    
                      
                     
                      
                      
                    
                    
                    <button style="margin-top:10px" type="submit" class="btn btn-info" >Update</button>
                </div>
                
            </form>

        </div>
    </div>

</div>
@endsection