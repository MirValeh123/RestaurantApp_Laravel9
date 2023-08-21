@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Main Functions') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center">
                        @if (Auth::user()->checkAdmin())
                        <div class="col-sm-4">
                            <a href="/management">
                            <h4>Management</h4>
                            <img  width='50' src="{{asset('images/dashboard.png')}}" alt="" srcset="">
                            </a>
                        </div>
                        @endif

                        <div class="col-sm-4">
                            <a href="/cashier">
                            <h4>Cashier</h4>
                            <img  width='50' src="{{asset('images/cashier-machine.png')}}" alt="" srcset="">
                            </a>
                        </div>
                        @if (Auth::user()->checkAdmin())
                        <div class="col-sm-4">
                            <a href="/report">
                            <h4>Report</h4>
                            <img  width='50' src="{{asset('images/home.png')}}" alt="" srcset="">
                            </a>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
