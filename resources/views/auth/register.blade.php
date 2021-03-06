@extends('layouts.guest')

@section('tittle', 'Register')

@section('content')
<!-- /.login-logo -->
    <div class="card">
        <p class="card-header h3 text-center">{{ __('Register') }}</p>
        <div class="card-body login-card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-circle"></span>
                        </div>
                    </div>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-mobile"></span>
                        </div>
                    </div>

                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="currency_id">Select Currency</label>
                    <div class="input-group mb-3">
                        <select class="form-control @error('currency_id') is-invalid @enderror" name="currency_id" required>
                            <option value="">{{ __('-- Select Currency --') }}</option>
                            @forelse($currencies as $currency)
                                <option value="{{ $currency->id }}" {{ $currency->currency_id == old('currency_id') ? 'selected' : ''}}>
                                    {{ $currency->code }} - {{ $currency->name }}
                                </option>
                            @empty
                                <p class="text-danger">{{ __('No currency records found') }}</p>
                            @endforelse
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-money-bill-alt"></span>
                            </div>
                        </div>

                        @error('currency_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="timezone">Select Time Zone</label>
                    <div class="input-group mb-3">
                        {!! $timezone_select !!}

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-globe-africa"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" required autocomplete="current-password" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="accept_tos" id="accept_tos" {{ old('accept_tos') ? 'checked' : '' }}>
                            <label for="accept_tos">
                                Agree to the <a href="#">Terms</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>

            @if (Route::has('login'))
                <hr>
                <div class="form-group">
                    <a class="btn btn-success btn-block btn-customized" href="{{ route('login') }}">
                        {{ __('Already have an Account? Login') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
