@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="register-logo">
                <span>Log<strong>in</strong></span>
            </div>
            @if(session()->has('class') && session()->has('message'))
                <div class="callout callout-{{ session()->get('class') }}">
                    <span>{{ session()->get('message') }}</span>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="input-group my-2">
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Username" />
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="input-group my-2">
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="input-group my-2">
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                            <input type="hidden" name="_token" class="d-none" value="{{ csrf_token() }}" readonly />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection