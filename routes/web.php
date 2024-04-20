<?php

use App\Models\Plan;
use GuzzleHttp\Client;
use App\Models\AltCoin;
use App\Events\TestingEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\SupportController;
use App\Http\Middleware\EnsureNoStuckOrders;
use App\Http\Middleware\MoveCompletedOrdersToTradeHistory;
use App\Http\Controllers\Admin\SupportController as AdminSupportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $plans = Plan::where('status', 'ON')->orderByRaw("CAST(rate AS SIGNED)")->get();
    return view('welcome', compact('plans'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::post('/make-coinpayment', 'HomeController@coinPaymentsDeposit');
Route::get('/alt/coin/get/{symbol}', function($symbol){
    $coin              = AltCoin::where('from_pair', $symbol)->first();
    return $coin->ratio;
});

Route::get('/sitemap.xml',function(){
    return response()->view('website.sitemap.index')->header('Content-Type', 'xml');
});

Route::get('/resource', function () {
    return view('resources');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/price-index', function () {
    return view('market');
});

// Route::get('/home-three', 'TradesController@index');

Route::middleware(ProtectAgainstSpam::class)->group(function() {
    Auth::routes(['verify' => true]);
});

Route::get('/home', 'HomeController@index')->name('home')->middleware(['verified', EnsureNoStuckOrders::class, MoveCompletedOrdersToTradeHistory::class]);
Route::get('/demo', 'HomeController@demo')->name('demo')->middleware(['verified', EnsureNoStuckOrders::class, MoveCompletedOrdersToTradeHistory::class]);
Route::get('/ret/Opr/{type}', 'HomeController@retOpenOrders');

Route::post('/user/setup/2fa', 'VerificationController@setup');
Route::post('/user/check/vc', 'VerificationController@index');
Route::post('/user/skip/2fa', 'VerificationController@skip');

Route::post('/market/trade', 'TradesController@store');
Route::post('/limit/trade', 'TradesController@limitTrade');
Route::post('/stop/limit/trade', 'TradesController@stopLimitTrade');
Route::get('/trade/limit', 'TradesController@limit');
Route::get('/market/{transaction_id}/status', 'TradesController@status');

Route::get('/tps', 'TpsController@index');
Route::get('/tps/run', 'TpsController@run')->name('tps');
Route::post('/tps/{bot_name}/license/key/verify', 'TpsController@verify');
Route::get('/tps/{bot_name}/redirect', 'TpsController@redirect');
Route::post('/tps/save/trades', 'TpsController@save');
Route::post('/tps/start/trades', 'TpsController@start');

Route::get('/onboarding', 'OnboardingController@index')->name('onboarding')->middleware('verified');
Route::post('/onboarding', 'OnboardingController@store')->middleware('verified');

// Route::get('/settings', 'HomeController@settings')->name('settings')->middleware('verified');
Route::get('/profile', 'HomeController@profile')->name('profile')->middleware('verified');
Route::post('/profile', 'HomeController@profile_upload')->name('profile.upload');

Route::get('/wallets', 'HomeController@wallets')->name('wallets')->middleware('verified');
Route::get('/swap', 'HomeController@swap')->name('swap')->middleware('verified');
Route::post('/make/swap', 'HomeController@makeSwap')->name('swap.make')->middleware('verified');

Route::get('/my-orders', 'HomeController@myOrders')->name('trader.orders')->middleware('verified');
Route::get('/withdraw-logs', 'HomeController@withdrawLogs')->name('trader.withdrawal.logs')->middleware('verified');
Route::get('/withdraw', 'HomeController@withdraw')->name('trader.withdrawal')->middleware('verified');
Route::post('/withdraw', 'HomeController@withdrawal_request');

Route::get('/deposit-logs', 'HomeController@depositLogs')->name('trader.deposit.logs')->middleware('verified');
Route::get('/deposit', 'HomeController@deposit')->name('trader.deposit.make')->middleware('verified');
Route::post('/deposit-details', 'HomeController@depositDetails')->name('trader.deposit.qr')->middleware('verified');
Route::post('/deposit-confirm', 'HomeController@depositProof')->name('deposit.proof')->middleware('verified');
// Route::get('/deposit/proof/{coin_name?}', 'HomeController@proof')->name('deposit.proof')->middleware('verified');
// Route::post('/deposit/proof', 'HomeController@upload_proof');

Route::get('/live-earnings', 'HomeController@liveEarnings')->name('trader.earnings')->middleware('verified');
Route::get('/plans', 'HomeController@plans')->name('trader.plans')->middleware('verified');
Route::get('/verification', 'HomeController@verification')->name('verification')->middleware('verified');
Route::post('/verification', 'HomeController@submit_verification');

/*
    ==================================================================
               User Support
    ==================================================================
*/
Route::get('/user/support', [SupportController::class, 'index'])->name('support');
Route::get('/support/new', [SupportController::class, 'new'])->name('support.new');
Route::post('/support/new', [SupportController::class,'create'])->name('support.store');
Route::get('/support/tickets', [SupportController::class,'tickets'])->name('support.tickets');
Route::get('/support/tickets/{support_id}', [SupportController::class, 'single'])->name('support.tickets.single');
Route::post('/support/tickets/reply', [SupportController::class, 'reply'])->name('support.tickets.reply');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@show_login_form')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout.submit');
    Route::get('/dashboard', 'Admin\HomeController@index')->name('admin.dashboard');

    Route::get('/open/orders/all', 'Admin\HomeController@open_orders')->name('admin.open.orders');
    Route::get('/trade/history/all', 'Admin\HomeController@trade_history')->name('admin.trade.history');
    Route::post('/trade/history/{trx_id}/edit', 'Admin\HomeController@trade_edit');

    Route::get('/trade/earnings/all', 'Admin\HomeController@trade_earnings')->name('admin.trade.earnings');
    Route::get('/trade/earnings/user/{user_id}', 'Admin\HomeController@single_user_earnings')->name('admin.single.trade.earnings');

    Route::get('/multiple/trade/signals', 'Admin\TradeSignalsController@index')->name('admin.multiple.trade.signals');
    Route::get('/limit/trade/signals', 'Admin\TradeSignalsController@limit');
    Route::get('/stop/limit/trade/signals', 'Admin\TradeSignalsController@stop_limit');

    Route::post('/create/limit/trade/signals', 'Admin\TradeSignalsController@create_limit');
    Route::post('/create/stop/limit/trade/signals', 'Admin\TradeSignalsController@create_stop_limit');



    Route::get('/single/trade/signals/{user_id}', 'Admin\TradeSignalsController@single')->name('admin.single.trade.signals');
    Route::get('/multiple/trade/signals/live', 'Admin\TradeSignalsController@live')->name('admin.multiple.trade.signals.live');
    Route::get('/multiple/trade/signals/demo', 'Admin\TradeSignalsController@demo')->name('admin.multiple.trade.signals.demo');
    Route::post('/trade/signal/delete/{session_id}/{type}', 'Admin\TradeSignalsController@delete');
    Route::get('/trade/signal/{user_id}/{session_id}/{trade_type}', 'Admin\TradeSignalsController@user')->name('admin.trade.signal.user');
    Route::get('/trade/signals/{session_id}/{trade_type}', 'Admin\TradeSignalsController@users')->name('admin.trade.signals.users');
    Route::post('/multiple/trade/signals', 'Admin\TradeSignalsController@create');

    Route::get('/plans', 'Admin\PlansController@index')->name('admin.plans');
    Route::get('/plans/create', 'Admin\PlansController@create')->name('admin.plans.create');
    Route::post('/plans/create', 'Admin\PlansController@store');
    Route::post('/plans/update', 'Admin\PlansController@update');
    Route::post('/plans/delete/{plan_id}', 'Admin\PlansController@destroy');

    Route::get('/users/all', 'Admin\UsersController@index')->name('admin.users.all');
    Route::get('/users/edit/{user_id}', 'Admin\UsersController@edit')->name('admin.users.edit');
    Route::post('/users/update/{user_id}/{type}', 'Admin\UsersController@update')->name('admin.users.update');
    Route::post('/users/deactivate', 'Admin\UsersController@deactivate')->name('admin.users.deactivate');
    Route::post('/users/delete', 'Admin\UsersController@delete')->name('admin.users.delete');

    Route::get('/deposit/all', 'Admin\DepositsController@index')->name('admin.deposit.all');
    Route::get('/deposit/user/{user_id}', 'Admin\DepositsController@show')->name('admin.single.deposit.all');
    Route::post('/deposit/user/{trx_id}/edit', 'Admin\DepositsController@update');

    Route::get('/deposit/approved', 'Admin\DepositsController@approved')->name('admin.deposit.approved');
    Route::post('/deposit/approve', 'Admin\DepositsController@approve');
    Route::get('/deposit/cancelled', 'Admin\DepositsController@cancelled')->name('admin.deposit.cancelled');
    Route::post('/deposit/cancel', 'Admin\DepositsController@cancel');

    Route::get('/withdrawal/all', 'Admin\WithdrawalsController@index')->name('admin.withdrawal.all');
    Route::get('/withdrawal/user/{user_id}', 'Admin\WithdrawalsController@show')->name('admin.single.withdrawal.all');
    Route::get('/withdrawal/approved', 'Admin\WithdrawalsController@approved')->name('admin.withdrawal.approved');
    Route::post('/withdrawal/approve', 'Admin\WithdrawalsController@approve');
    Route::get('/withdrawal/cancelled', 'Admin\WithdrawalsController@cancelled')->name('admin.withdrawal.cancelled');
    Route::post('/withdrawal/cancel', 'Admin\WithdrawalsController@cancel');

    Route::get('/license-keys', 'Admin\LicenseKeysController@index')->name('admin.license.keys');
    Route::post('/license-keys/create', 'Admin\LicenseKeysController@create');

    Route::get('/cryptocurrency', 'Admin\CryptocurrencyController@index')->name('admin.cryptocurrency');
    Route::post('/cryptocurrency/create', 'Admin\CryptocurrencyController@create');
    Route::post('/cryptocurrency/edit', 'Admin\CryptocurrencyController@edit');
    Route::post('/cryptocurrency/delete/{currency_id}', 'Admin\CryptocurrencyController@delete');

    Route::get('/wallets', 'Admin\WalletAddressesController@index')->name('admin.wallets');
    Route::post('/wallet/create', 'Admin\WalletAddressesController@create');
    Route::post('/wallet/edit', 'Admin\WalletAddressesController@edit');
    Route::post('/wallet/delete/{wallet_id}', 'Admin\WalletAddressesController@delete');

    Route::get('/coin/pairs', 'Admin\CoinPairsController@index')->name('admin.coin.pairs');
    Route::post('/coin/pairs/create', 'Admin\CoinPairsController@create');
    Route::post('/coin/pairs/delete/{pair_id}', 'Admin\CoinPairsController@destroy');

    Route::get('/alt/coins', 'Admin\AltCoinController@index')->name('admin.alt.coins');
    Route::post('/alt/coins/create', 'Admin\AltCoinController@create');
    Route::post('/alt/coins/delete/{pair_id}', 'Admin\AltCoinController@destroy');

    Route::get('/support/all', [AdminSupportController::class, 'all'])->name('admin.support.all');
    Route::get('/support/ticket/{ticket_id}', [AdminSupportController::class, 'single'])->name('admin.support.single');
    Route::post('/support/close', [AdminSupportController::class, 'close'])->name('admin.support.close');
    Route::post('/support/tickets/reply', [AdminSupportController::class, 'reply'])->name('admin.support.reply');
});