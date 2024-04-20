<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Events\ReplySupportTicketEvent;

use App\Events\CreateSupportTicketEvent;
use App\Events\UpdateWalletBalanceEvent;
use App\Events\UpdateUserPlanAfterDepositEvent;
use App\Listeners\SendTicketReplyToAdminListener;

use App\Listeners\WalletBalanceUpdateNotification;

use App\Listeners\CreateSupportTicketEventListener;
use App\Listeners\SendSupportTicketToAdminListener;
use App\Listeners\UpdateTicketConversationListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UpdateWalletBalanceEvent::class => [
            WalletBalanceUpdateNotification::class,
        ],
        \App\Events\MakeATradeEvent::class => [
           \App\Listeners\CreateAnOpenOrderListener::class,
            \App\Listeners\UpdateUserBalanceAfterTradeListener::class,
            // \App\Listeners\DisplayBuysThisMonthListener::class,
            // \App\Listeners\DisplaySellsThisMonthsListener::class,
        ],
        \App\Events\MakeATradeLimitEvent::class => [
            \App\Listeners\CreateALimitTradeListener::class,
            \App\Listeners\UpdateUserBalanceAfterLimitTradeListener::class,
             // \App\Listeners\DisplayBuysThisMonthListener::class,
             // \App\Listeners\DisplaySellsThisMonthsListener::class,
        ],
        \App\Events\MakeATradeStopLimitEvent::class => [
            \App\Listeners\CreateAStopLimitTradeListener::class,
            \App\Listeners\UpdateUserBalanceAfterStopLimitTradeListener::class,
             // \App\Listeners\DisplayBuysThisMonthListener::class,
             // \App\Listeners\DisplaySellsThisMonthsListener::class,
         ],
        \App\Events\CheckTradeStatusEvent::class => [
            \App\Listeners\UpdateOrderStatusListener::class,
            \App\Listeners\UpdateUserBalanceAfterStatusListener::class,
            \App\Listeners\CreateRelatedEarningInfoListener::class,
        ],
        \App\Events\OtherCoinpaymentsEvent::class => [
            \App\Listeners\VerifyUserListener::class,
            \App\Listeners\MakeDepositListener::class,
            \App\Listeners\UpdateUserBalanceAfterDepositListener::class,
        ],
        \App\Events\UpdateBalanceAfterDepositEvent::class => [
            \App\Listeners\UpdateBalanceAfterDepositListener::class,
        ],
        \App\Events\UpdatePlanAfterDepositEvent::class => [
            \App\Listeners\UpdatePlanAfterDepositListener::class,
        ],
        CreateSupportTicketEvent::class => [
            CreateSupportTicketEventListener::class,
            SendSupportTicketToAdminListener::class,
        ],
        ReplySupportTicketEvent::class => [
            UpdateTicketConversationListener::class,
            SendTicketReplyToAdminListener::class,
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    // protected $subscribe = [
    //     'App\Listeners\UpdateUserBalanceListener',
    // ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
