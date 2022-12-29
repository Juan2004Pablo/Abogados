@extends('layouts.app')

@section('content')
<html lang="en">
<head>
    <title></title>
    <meta content="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Exo', sans-serif;
        }
        .header-col{
            background: #E3E9E5;
            color:#536170;
            text-align: center;
            font-size: 15px;
            font-weight: bold;
        }
        .header-calendar{
            background: #ea8974;color:white;
        }
        .box-day{
            border:1px solid #E3E9E5;
            height:150px;
        }
        .box-dayoff{
            border:1px solid #E3E9E5;
            height:150px;
            background-color: #ccd1ce;
        }
    </style>

</head>
<body>

<div class="container rounded-4 shadow-lg">
    <p class="lead pt-5">
    <div class="text-center">
        <i class="fa-solid fa-calendar-circle-plus"></i>
        <h3>{{ trans('calendar.titles.schedule') }}</h3>
        <p>{{ trans('calendar.titles.description') }}</p>
    </div>

    <div class="mb-4">
        <a href="{{ route('event.create') }}"> Create event </a>
    </div>

    <div class="row header-calendar">

        <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
            <a  href="{{ route('home') }}/{{ $data['last'] }}" style="margin:10px;">
                <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
            </a>

            <h2 style="font-weight:bold;margin:8px;">{{ $fullMonth }} <small>{{ $data['year'] }}</small></h2>

            <a  href="{{ route('home') }}/{{ $data['next'] }}" style="margin:10px;">
                <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
            </a>
        </div>

    </div>
    <div class="row">
        <div class="col header-col">{{ trans('calendar.daysOfTheWeek.mon') }}</div>
        <div class="col header-col">{{ trans('calendar.daysOfTheWeek.tues') }}</div>
        <div class="col header-col">{{ trans('calendar.daysOfTheWeek.wed') }}</div>
        <div class="col header-col">{{ trans('calendar.daysOfTheWeek.thurs') }}</div>
        <div class="col header-col">{{ trans('calendar.daysOfTheWeek.fri') }}</div>
        <div class="col header-col">{{ trans('calendar.daysOfTheWeek.sat') }}</div>
        <div class="col header-col">{{ trans('calendar.daysOfTheWeek.sun') }}</div>
    </div>
    <!-- inicio de semana -->
    @foreach ($data['calendar'] as $weekdata)
        <div class="row">
            <!-- ciclo de dia por semana -->
            @foreach ($weekdata['data'] as $dayWeek)
                @if ($dayWeek['month']== $data['month'])
                    @if ($dayWeek['day'] == date('d') && $data['year'] == date('Y') && $data['month'] == date('M'))
                        <div class="col box-day" style="width: 100%; overflow: auto">
                            <span class="text-info font-weight-bold lead"><p><u>{{ $dayWeek['day']  }}</u></p></span>
                            @foreach  ($dayWeek['event'] as $event)
                                <a class="badge badge-danger" href="{{ route('event.show', $event) }}">
                                    {{ $event->title }}
                                </a>
                                <br>
                            @endforeach
                        </div>
                    @else
                        <div class="col box-day" style="width: 100%; overflow: auto">
                            <span><p>{{ $dayWeek['day']  }}</p></span>
                            @foreach  ($dayWeek['event'] as $event)
                                <a class="badge badge-info" href="{{ route('event.show', $event) }}">
                                    {{ $event->title }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                @else
                    <div class="col box-dayoff text-secondary">
                        <p>{{ $dayWeek['day']  }}</p>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach

</div> <!-- /container -->

<!-- Footer -->
<footer class="page-footer font-small blue pt-4">
    <div class="footer text-center py-3">
        <span class="text-center"> {{ \Illuminate\Foundation\Inspiring::quote() }}</span>
    </div>
</footer>
<!-- Footer -->

</body>
</html>
@endsection
