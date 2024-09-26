@extends('layouts.master')
@section('content')
<div class="container" style="display: flex; justify-content: center;">
    <div class="panel panel-default" style="width: 750px;">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>ลืมรหัสผ่าน?</strong>
            </div>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมล') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('เปลี่ยนรหัสผ่าน') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

