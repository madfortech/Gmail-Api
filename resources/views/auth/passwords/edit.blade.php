@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Password') }}</div>

                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.password.update') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input 
                                    id="password" 
                                    type="password" 
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" " 
                                    name="password"> 
                            </div>
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <!-- Password -->

                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input 
                                    id="password_confirmation" 
                                    type="password" 
                                    class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"" 
                                    name="password_confirmation"> 
                            </div>
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <!-- Confirm Password -->


                       

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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
