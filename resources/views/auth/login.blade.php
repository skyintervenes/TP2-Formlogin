@extends('layouts.app', ['title' => 'Login'])

@section('content')

<div class="col-md-4">
    <div class="card border-0 shadow rounded">
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <h4 class="font-weight-bold">BINUS University</h4>
            <hr>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <span class="font-bold">{{ __('Oops!') }}</span>
                    <span>{{ session('error') }}</span>
                </div>
                @endif
                <div class="form-group">
                    <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                    @error('username')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>    
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    @error('password')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>    
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-6 captcha">
                        <label for="password" class="d-block">{{__('Captcha Image')}}</label>
                        <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                            ↻
                        </button>
                    </div>
                    <div class="form-group col-6">
                        <label for="password" class="d-block">{{__('Captcha Text')}}</label>
                        <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" name="captcha" placeholder="{{__('Enter Captcha')}}" required>
                        @error('captcha')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">LOGIN</button>
                </div>
                <hr>

                <a href="/forgot-password">Forget Password ?</a>

            </form>
        </div>
    </div>
    <div class="register mt-3 text-center">
        <p>Didn't have an account ? Register <a href="/register">Here</a></p>
    </div>
</div>

@endsection