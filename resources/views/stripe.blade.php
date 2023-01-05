@extends('layouts.app')

@section('title', 'PAYMENT')

@section('content')
<div class='row'>
    <h1>{{ __('messages.payment') }}</h1>
    <div class = 'col-md-12'>
        <div class='card'>
            <div class='card-header'>
                {{ __('messages.payment') }}
            </div>
            <div class="card-body">
                @if(Session::has('error'))
                    <font color="red">{{Session::get('error')}}</font>
                @endif
                <form class="form-horizontal" method="post" id="payment-form" role="form" action="{!!route('addmoney.stripe')!!}">
                    @csrf
                    <div class="mb-3">
                        <label class = 'control-label'>{{ __('messages.card_number') }}</label>
                        <input autocomplete="on" required class="form-control card-number" size='20' type='text' name="card_no">
                        @error('card_no')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label class="control-label">CVV</label>
                            <input autocomplete="on" required class='form-control card-cvc' placeholder="ex .311" size='4' type='text' name="cvvNumber">
                            @error('cvvNumber')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                        </div>
                        <div class="col-auto">
                            <label class='control-label'>{{ __('messages.exp') }}</label>
                            <input class='form-control card-expiry-month' required placeholder="MM" size='4' type='text' name='ccExpiryMonth'>
                            @error('ccExpiryMonth')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                        </div>
                        <div class="col-auto">
                            <label class="control-label">{{ __('messages.year') }}</label>
                            <input class='form-control card-expiry-year' required placeholder="YYYY" size='4' type='text' name="ccExpiryYear">
                            {{-- <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='hidden' name='amount' value='300'> --}}
                            @error('ccExpiryYear')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class='mb-3' style='padding-top:20px;'>
                        <h5 class='total'>{{ __('messages.total') }}: <span class='amount'>{{$amount}} KZT</span></h5>
                    </div>
                    <div class='mb-3'>
                        <button class='form-control btn btn-primary submit-button' type='submit'>{{ __('messages.pay') }} >></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

