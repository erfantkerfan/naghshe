@extends('layouts.app')

@section('content')
    <div class="container text-center" style="font-family:'bmitra'">
        <div class="row justify-content-center">
            <div class="col-md-5 justify-content-center">
                <div class="card justify-content-center">
                <div class="card-header text-center">ورود</div>

                <div class="card-body justify-content-center text-center" dir="rtl">
                    <form method="POST" action="{{ route('login') }}" aria-label="ورود">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-4 col-form-label text-md-center">نام کاربری</label>

                            <div class="col-8">
                                <input id="username" type="username" class="text-center form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" dir="ltr" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-4 col-form-label text-md-center">رمز ورود</label>

                            <div class="col-8">
                                <input id="password" type="password" class="text-center form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" dir="ltr" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row  justify-content-center">
                            <div class="col-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> مرا در حالت ورود نگه دار
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    ورود
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