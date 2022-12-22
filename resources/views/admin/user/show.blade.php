@extends('layouts.app')

@section('title','Show user')

@section('breadcrumb')
<ul>
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ trans('user.user.title.title') }}</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
</ul>
@endsection

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('user.update', $user) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="container">

                    <div class="form-group">

                        <div class="form-group mt-3">

                            <label for="identification">{{ trans('user.user.fields.identification') }}</label>

                            <input type="number" class="form-control" id="identification" placeholder="Identification" name="identification" value="{{ $user->identification }}" disabled>

                        </div>

                        <div class="form-group mt-3">

                            <label for="name">{{ trans('user.user.fields.name') }}</label>

                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $user->name }}" disabled>

                        </div>

                        <div class="form-group mt-3">

                            <label for="lastname">{{ trans('user.user.fields.lastname') }}</label>

                            <input type="text" class="form-control" id="lastname" placeholder="Lastname" name="lastname" value="{{ $user->lastname }}" disabled>

                        </div>

                        <div class="form-group mt-3">

                            <label for="email">{{ trans('user.user.fields.email') }}</label>

                            <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{ $user->email }}" disabled >

                        </div>

                        <div class="form-group mt-3">

                            <label for="phone">{{ trans('user.user.fields.phone') }}</label>

                            <input type="number" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ old('Phone',$user->phone) }}" disabled >

                        </div>

                        <div class="form-group mt-3">

                            <label for="company">{{ trans('user.user.fields.company') }}</label>

                            <input type="text" class="form-control" id="company" placeholder="Company" name="company" value="{{ old('Company',$user->company) }}" disabled >

                        </div>

                        <div class="form-group mt-3">

                            <label for="address">{{ trans('user.user.fields.address') }}</label>

                            <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ old('Address',$user->address) }}" disabled >

                        </div>

                        <div class="form-group mt-3">

                            <label for="created">{{ trans('user.user.fields.created_at') }}</label>

                            <input type="text" class="form-control" id="created" placeholder="Created At" name="created" value="{{ $user->created_at }}" disabled >

                        </div>

                        <div class="form-group mt-3">

                            <label for="updated">{{ trans('user.user.fields.updated_at') }}</label>

                            <input type="text" class="form-control" id="updated" placeholder="Updated At" name="updated" value="{{ $user->updated_at }}" disabled >

                        </div>

                        <div class="form-group mt-3">

                            <label for="disable">{{ trans('user.user.fields.disabled_at') }}</label>

                            <input type="text" class="form-control" id="disable" placeholder="Disable At" name="disabled" value="{{ $user->disable_at }}" disabled >

                        </div>

                    </div>

                    <hr>

                    <a class="btn btn-success" href="{{route('user.edit',$user)}}">{{ trans('user.user.options.update') }}</a>

                    <a class="btn btn-danger" href="{{route('user.index')}}">{{ trans('user.user.options.back') }}</a>

                </div>

            </form>

        </div>

    </div>

@endsection
