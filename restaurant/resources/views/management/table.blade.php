@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row  justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-md-8">
            <i class="fa-solid fa-chair"></i>Table
            <a href="{{route('table.create')}}" class="btn btn-success btn-sm float-right"  style="color: white!important"><i class="fas fa-plus" style="margin-right: 3px" ></i>Create Table</a>
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
                        <th scope="col" >Table</th>
                        <th scope="col" >Status</th>
                        <th scope="col" >Edit</th>
                        <th scope="col" >Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                        <tr>
                            <td scope="row" >{{$table->id}}</td>
                            <td >{{$table->name}}</td>
                            <td >{{$table->status}}</td>
                            
                            <td ><a href="/management/table/{{$table->id}}/edit" class="btn btn-primary">Edit</a></td>
                            <td ><a href="/management/table/{{$table->id}}/destroy" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $tables->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</div>
@endsection