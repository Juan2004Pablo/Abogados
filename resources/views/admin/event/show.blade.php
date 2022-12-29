@extends('layouts.app')

@section('title','Show event')

@section('breadcrumb')
    <ul>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('event.title.title') }}</a></li>
        <li class="breadcrumb-item active">@yield('title')</li>
    </ul>
@endsection

@section('content')
    <div class="container row-cols-2">

        <h3>{{ trans('event.title.info') }}</h3>

        <div class="form-group mt-4">

            <div class="form-group mb-4">

                <label for="title">{{ trans('event.fields.title') }}</label>

                <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                       value="{{ old('title', $event->title) }}" disabled>

            </div>

            <div class="form-group mb-4">

                <label for="participants">{{ trans('event.fields.participants') }}</label>

                <input type="text" class="form-control" id="participants" placeholder="Participants" name="participants"
                       value="{{ old('participants', $event->participants) }}" disabled>
            </div>

            <div class="form-group mb-4">

                <label for="date">{{ trans('event.fields.date') }}</label>

                <input type="date" class="form-control" id="date" placeholder="Date" name="date"
                       value="{{ old('date', $event->date) }}" disabled>
            </div>

            <div class="form-group mb-4">
                <label for="start">{{ trans('event.fields.time') }}</label>
                <div class="w-50 input-group mb-3">
                    <input type="time" class="form-control" id="start" placeholder="Start" name="start"
                           value="{{ old('start', $event->start) }}" disabled>
                    <span class="input-group-text">-</span>
                    <input type="time" class="form-control" id="finish" placeholder="Finish" name="finish"
                           value="{{ old('finish', $event->finish) }}" disabled>
                </div>
            </div>

            <div class="form-group mb-4">

                <label for="location">{{ trans('event.fields.location') }}</label>

                <input type="text" class="form-control" id="location" placeholder="Add location" name="location"
                       value="{{ old('location', $event->location) }}" disabled>
            </div>

            <div class="form-group mb-4">

                <label for="description">{{ trans('event.fields.description') }}</label>

                <textarea class="form-control" id="description" placeholder="Description" name="description"
                          disabled>{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="form-group mb-4">

                <label for="author">{{ trans('event.fields.author') }}</label>

                <input type="text" class="form-control" id="author" placeholder="Author" name="author"
                       value="{{ old('time', $event->user->name) }}" disabled>
            </div>

            <div class="form-group mb-4">

                <label for="created">{{ trans('event.fields.created_at') }}</label>

                <input type="text" class="form-control" id="created" placeholder="Created at" name="created"
                       value="{{ old('time', $event->created_at) }}" disabled>
            </div>
        </div>
        <hr>
    </div>

    <div class="container mb-5">
        <a class="btn btn-danger" href="{{ route('home') }}"> {{ trans('event.options.back') }}</a>
        <a class="btn btn-primary" href="{{ route('event.edit', $event) }}"> {{ trans('event.options.update') }}</a>
    </div>
@endsection

