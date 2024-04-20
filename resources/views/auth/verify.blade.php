@extends('layouts.app5')

@section('content')
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <img src="/main/images/favicon.png" style="background: white;border-radius: 50%;padding-top: 3%;padding-bottom: 3%;padding-left: 4%;padding-right: 4%;margin-bottom: 3%;">
                        <h1 class="">{{ __('Verify Your Email Address') }}</h1>
                        @if (session('resent'))
                            <div class="alert alert-success mt-3" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        <p class="signup-link recovery pt-3">
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary">{{ __('click here to request another') }}</button>
                                </div>
                            </form>
                        </p>
                        <div>
                            <a href="/login">Proceed to Login</a>
                        <div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection
