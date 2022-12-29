@extends('layouts.app')

@section('title','Edit event')

@section('breadcrumb')
    <ul>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('event.title.title') }}</a></li>
        <li class="breadcrumb-item active">@yield('title')</li>
    </ul>
@endsection

@section('content')
    <form action="{{ route('event.update', $event) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="container row-cols-2">

            <h3>{{ trans('event.title.info') }}</h3>

            <div class="form-group">

                <div class="form-group alert {{ $errors->first('title', 'alert-danger') }}">

                    <label for="title">{{ trans('event.fields.title') }}</label>

                    <input type="text" class="form-control" id="title" placeholder="Add title" name="title"
                           value="{{ old('title', $event->title) }}">

                    @foreach($errors->get('title') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

                <div class="form-group alert {{ $errors->first('participants', 'alert-danger') }}">

                    <label for="participants">{{ trans('event.fields.participants') }}</label>

                    <input type="text" class="form-control" id="participants" placeholder="Add required attendees"
                           name="participants" value="{{ old('participants', $event->participants) }}">
                    @foreach($errors->get('participants') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

                <div class="form-group alert {{ $errors->first('date', 'alert-danger') }}">

                    <label for="date">{{ trans('event.fields.date') }}</label>

                    <input type="date" class="form-control" id="date" placeholder="Date" name="date"
                           value="{{ old('date', $event->date) }}">
                    @foreach($errors->get('date') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

                <div class="alert {{ $errors->first('start', 'alert-danger') }}
                    alert {{ $errors->first('finish', 'alert-danger') }}">
                    <label for="start">{{ trans('event.fields.time') }}</label>
                    <div class="w-50 input-group mb-3">
                        <input type="time" class="form-control" id="start" placeholder="Start" name="start"
                               value="{{ old('start', $event->start) }}">
                        <span class="input-group-text">-</span>
                        <input type="time" class="form-control" id="finish" placeholder="Finish" name="finish"
                               value="{{ old('finish', $event->finish) }}">
                    </div>
                    @foreach($errors->get('finish') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    @foreach($errors->get('start') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

                <div class="form-group alert {{ $errors->first('location', 'alert-danger') }}">

                    <label for="location">{{ trans('event.fields.location') }}</label>

                    <input type="text" class="form-control" id="location" placeholder="Add location" name="location"
                           value="{{ old('location', $event->location) }}">
                    @foreach($errors->get('location') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

                <div class="form-group alert {{ $errors->first('description', 'alert-danger') }}">

                    <label for="description">{{ trans('event.fields.description') }}</label>

                    <textarea class="form-control" id="description" rows="6" cols="10" placeholder="Type details for this new event"
                              name="description">{{ $event->description }}</textarea>
                    @foreach($errors->get('description') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

            </div>
            <hr>

        </div>

        <div class="container mb-5">
            <a class="btn btn-danger" href="{{ route('home') }}"> {{ trans('event.options.back') }}</a>
            <input class="btn btn-primary" type="submit" value="Save">
        </div>
    </form>
@endsection

