
@extends('layouts.app')

@section('title','Administration of events')

@section('breadcrumb')
    <ul>
        <li class="breadcrumb-item active">@yield('title')</li>
    </ul>
@endsection

@section('content')
    <div id="indexEvents" class="row m-lg-4">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <div class="card-header"><h2>{{ trans('event.title.list_of_events') }}</h2></div>

                    <div class="card-body">

                        <table class="table table-hover">

                            <thead>

                            <tr>

                                <th>{{ trans('event.fields.id') }}</th>
                                <th>{{ trans('event.fields.title') }}</th>
                                <th>{{ trans('event.fields.date') }}</th>
                                <th>{{ trans('event.fields.start') }}</th>
                                <th>{{ trans('event.fields.finish') }}</th>
                                <th>{{ trans('event.fields.participants') }}</th>
                                <th>{{ trans('event.fields.location') }}</th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>

                            </thead>

                            <tbody>

                            @foreach($events as $event)

                                <tr>

                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td>{{ $event->start }}</td>
                                    <td>{{ $event->finish }}</td>
                                    <td>{{ $event->participants }}</td>
                                    <td>{{ $event->location }}</td>

                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('event.show',$event) }}">{{ trans('event.options.show') }}</a>
                                    </td>

                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{ route('event.edit',$event) }}">{{ trans('event.options.update') }}</a>
                                    </td>

                                    <form action="{{ route('event.destroy', $event) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <td>
                                            <input class="btn btn-sm btn-danger" type="submit" value="{{ trans('event.options.destroy') }}">
                                        </td>

                                    </form>

                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
