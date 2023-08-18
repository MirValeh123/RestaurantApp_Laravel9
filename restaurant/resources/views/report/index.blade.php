@extends('layouts.app')
{{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@section('content')
<div class="container ">
    <div class="row  ">
        <div class="col-md-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
            <nav aria-label="breadcrumb" >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">Main Functions</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Report
                    </li>
                </ol>
            </nav>

        </div>
        <div class="container">

            <form action="/report/show" method="GET" >
                <label for="datetimepicker">Choose Date For Report:</label>
                <div class="input-group date" id="date-start" data-target-input='nearest' >
                    <input type="text" id="datetimepicker" name="dateStart" class="form-control" data-target="#data-start">
                    <div class="input-group-append">
                        <span class="input-group-text" id="calendar-icon">
                            <i class="fas fa-calendar"></i>
                        </span>
                    </div>
                </div><br>
                <div class="input-group date" id="date-end" data-target-input='nearest'>
                    <input type="text" id="datetimepicker" name="dateEnd" class="form-control"  data-target="#data-end">
                    <div class="input-group-append">
                        <span class="input-group-text" id="calendar-icon">
                            <i class="fas fa-calendar"></i>
                        </span>
                    </div>
                </div><br><br>
                <input class="btn btn-primary" type="submit" value="Show Report" >
            </form>
        </div>



        </div>
    </div>

</div>
<!-- ... Other script tags ... -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>

{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#datetimepicker", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
    const calendarIcon = document.getElementById('calendar-icon');
    calendarIcon.addEventListener('click', () => {
        datetimepicker.open();
    });
</script>

@endsection
