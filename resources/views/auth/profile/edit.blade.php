@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile you cant update profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.profile.update') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input 
                                    id="name" 
                                    type="text" 
                                    class="form-control" 
                                    name="name" 
                                    value="{{ old('name', auth()->user()->name) }}"
                                    autofocus
                                    readonly>

                            </div>
                        </div>
                        <!-- Name -->

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input 
                                    id="email" 
                                    type="email" 
                                    class="form-control" 
                                    name="email" 
                                    value="{{ old('email', auth()->user()->email) }}"
                                    autocomplete="email" 
                                    autofocus
                                    readonly>

                            </div>
                        </div>
                        <!-- Email -->

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" disabled>
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
