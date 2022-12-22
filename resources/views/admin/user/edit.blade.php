@extends('layouts.app')

@section('title','Edit user')

@section('breadcrumb')
<ul>
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ trans('user.user.title.title') }}</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
</ul>
@endsection

@section('content')

    <form action="{{ route('user.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="container">

            <h3>{{ trans('user.user.title.info') }}</h3>

            <div class="form-group">

                <div class="form-group alert {{ $errors->first('identification', 'alert-danger') }}">

                    <label for="identification">{{ trans('user.user.fields.identification') }}</label>

                    <input type="number" class="form-control" id="identification" placeholder="Identification" name="identification" value="{{ $user->identification }}" disabled>

                </div>

                <div class="form-group alert {{ $errors->first('name', 'alert-danger') }}">

                    <label for="name">{{ trans('user.user.fields.name') }}</label>

                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name',$user->name) }}">
                    @foreach($errors->get('name') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

                <div class="form-group alert {{ $errors->first('lastname', 'alert-danger') }}">

                    <label for="lastname">{{ trans('user.user.fields.lastname') }}</label>

                    <input type="text" class="form-control" id="lastname" placeholder="Lastname" name="lastname" value="{{ old('lastname',$user->lastname) }}">
                    @foreach($errors->get('lastname') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

                <div class="form-group alert {{ $errors->first('email', 'alert-danger') }}">

                    <label for="email">{{ trans('user.user.fields.email') }}</label>

                    <input type="email" class="form-control" id="email" placeholder="email" name="email" value="{{ old('email',$user->email) }}" disabled >

                </div>

                <div class="form-group alert {{ $errors->first('phone', 'alert-danger') }}">

                    <label for="phone">{{ trans('user.user.fields.phone') }}</label>

                    <input type="tel" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{ old('phone',$user->phone) }}">
                    @foreach($errors->get('phone') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

                <div class="form-group alert {{ $errors->first('company', 'alert-danger') }}">

                    <label for="company">{{ trans('user.user.fields.company') }}</label>

                    <input type="text" class="form-control" id="company" placeholder="Company" name="company" value="{{ old('company',$user->company) }}">
                    @foreach($errors->get('company') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

                <div class="form-group alert {{ $errors->first('address', 'alert-danger') }}">

                    <label for="address">{{ trans('user.user.fields.address') }}</label>

                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ old('address',$user->address) }}">
                    @foreach($errors->get('address') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

            </div>
            <hr>

            <a class="btn btn-danger" href="{{ route('user.index') }}"> {{ trans('user.user.options.back') }}</a>
            <input class="btn btn-primary" type="submit" value="Save">

        </div>

    </form>

@endsection
