@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">profile</div>

                <div class="card-body">
                   
                    @if(count($errors)>0)
                       @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                   @endif

                   @if(session('response'))
                        <div class="alert alert-success">{{session('response') }}</div>
                    @endif
            
                  <form method="POST" action="{{ url('/addprofile') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                            <div class="col-md-6">
                                <input id="designation" type="input" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" required>

                                @if ($errors->has('designation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile_pic" class="col-md-4 col-form-label text-md-right">{{ __('profile_pic') }}</label>

                            <div class="col-md-6">
                                <input id="profile_pic" type="file" class="form-control{{ $errors->has('profile_pic') ? ' is-invalid' : '' }}" name="profile_pic" required>

                                @if ($errors->has('profile_pic'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('profile_pic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('addprofile') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection