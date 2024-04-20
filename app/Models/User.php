<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'gender',
        'date_of_birth',
        'currency',
        'address',
        'city',
        'state',
        'country',
        'password',
        'show_password',
        'plan',
        'plan_status',
        'main_balance',
        'demo_balance',
        'limit',
        'each_trade_time',
        'strtotime',
        'profile_img',
        'identification_verification',
        'active',
        'two_fa_status',
        'mailing_status',
        'verification_submission'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUser()
    {
        # code...
        $user     = DB::table('users')->where('id', Auth::user()->id)->first();
        return $user;
    }
}
