
@extends('layouts.app')

@section('title','Administration of users')

@section('breadcrumb')
<ul>
    <li class="breadcrumb-item active">@yield('title')</li>
</ul>
@endsection

@section('content')

    <div id="confirmdelete" class="row m-lg-4">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <div class="card-header"><h2>{{ trans('user.user.title.list_of_users') }}</h2></div>

                    <div class="card-body">

                        <br><br>

                        <table class="table table-hover">

                            <thead>

                                <tr>

                                    <th>{{ trans('user.user.fields.id') }}</th>
                                    <th>{{ trans('user.user.fields.name') }}</th>
                                    <th>{{ trans('user.user.fields.lastname') }}</th>
                                    <th>{{ trans('user.user.fields.email') }}</th>
                                    <th>{{ trans('user.user.fields.phone') }}</th>
                                    <th>{{ trans('user.user.fields.company') }}</th>
                                    <th>{{ trans('user.user.fields.disabled_at') }}</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($users as $user)

                                    <tr>

                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->company }}</td>
                                        <td>{{ $user->disabled_at }}</td>

                                        <td>
                                            <a class="btn btn-sm btn-primary" href="{{ route('user.show',$user->id) }}">{{ trans('user.user.options.show') }}</a>
                                        </td>

                                        <td>
                                            <a class="btn btn-sm btn-success" href="{{ route('user.edit',$user->id) }}">{{ trans('user.user.options.update') }}</a>
                                        </td>

                                        <td>

                                            @if($user->disabled_at)
                                                <a class="btn btn-sm btn-warning" href="{{ route('user.toggle',$user) }}"><i class="fa fa-fw fa-eye"></i> {{ trans('user.user.options.enable') }}</a>
                                            @else
                                                <a class="btn btn-sm btn-danger" href="{{ route('user.toggle',$user) }}"><i class="fa fa-fw fa-eye"></i> {{ trans('user.user.options.disable') }}</a>
                                            @endif

                                        </td>

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
