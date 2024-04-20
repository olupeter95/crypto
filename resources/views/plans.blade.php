@extends('layouts.app')

@section('content')
    <style>
        .pricing__item {
            -webkit-flex: 0 1 280px !important; 
            /* flex: 0 1 280px !important;  */
            flex: 0 0 calc(25% - 1rem);
            /* margin: 0.5rem; */
        }
    </style>
    <div class="row layout-top-spacing">
        <div class="col-lg-12">
            <section class="pricing-section bg-7 mt-5">
                <div class="pricing pricing--norbu">
                    <!-- <div class="row"> -->
                        @foreach($plans as $plan)
                            <div class="pricing__item">
                                <h3 class="pricing__title">{{ $plan->plan_title }}</h3>
                                <p class="pricing__sentence"></p>
                                <div class="pricing__price"><span class="pricing__currency">Minimum Deposit $</span>{{ number_format(intval($plan->rate), 0, ',', ',') }}</div>
                                <ul class="pricing__feature-list text-center">
                                    <li class="pricing__feature">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                        {{ $plan->trade_limit }} Trades/Day
                                    </li>
                                    @if($plan->desc)
                                        @foreach($plan->desc as $description)
                                        <li class="pricing__feature">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        {{ $description->description }}
                                        </li>
                                        @endforeach
                                    @endif
                                    <!-- <li class="pricing__feature">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                        Demo Trading
                                    </li>
                                    <li class="pricing__feature">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                        Round the Clock Support
                                    </li>
                                    <li class="pricing__feature">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                        5x Leverage
                                    </li> -->
                                </ul>
                                @if(Auth::user()->plan === 'ACTIVATE')
                                <a href="/deposit" class="pricing__action btn mx-auto mb-4">Activate Plan</a>
                                @elseif(Auth::user()->plan === $plan->plan_title)
                                <button class="pricing__action btn mx-auto mb-4" disabled="">Active Plan</button>
                                @else
                                <a href="/deposit" class="pricing__action btn mx-auto mb-4">Upgrade Plan</a>
                                @endif
                            </div>
                        @endforeach
                    <!-- </div> -->
                </div>
            </section>    
        </div>
    </div>
@endsection
