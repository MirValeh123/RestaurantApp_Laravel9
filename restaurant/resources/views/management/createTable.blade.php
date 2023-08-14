@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row  justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <div class="row">
                <div class="category">
                    <i class="fa-solid fa-chair"></i>Table
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
            <form action="{{route('table.store')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="name">Table Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Table....." >
                    <label for="status">Table Status</label>
                    <input type="text" name="status" class="form-control" placeholder="Status....." >
                    
                    
                    
                      
                    
                      
                     
                      
                      
                    
                    
                    <button style="margin-top:10px" type="submit" class="btn btn-primary" >Save</button>
                </div>
                
            </form>

        </div>
    </div>

</div>
@endsection