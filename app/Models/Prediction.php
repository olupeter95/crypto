<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Prediction extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'predictions';

    /**
        * The attributes that aren't mass assignable.
        *
        * @var array
    */
    protected $guarded = [];

    public function checkStatus($trade_details, $t_a, $from, $to)
    {
        # code...
        $prediction         = DB::table('predictions')->where([
            ['user_id',     '=',  Auth::user()->id],
            ['symbol',      '=',  $trade_details['trade_pair']],
            ['leverage',    '=',  $trade_details['trade_leverage']],
            ['interval',    '=',  $trade_details['trade_interval']], 
            ['buy_or_sell', '=',  $t_a],
            ['status',      '=',  'Not Used'],
            ['trade_type',  '=',  $trade_details['type']],
        ])->where('amount', '<=', $from)->where('amount', '>=', $to)->count();

        $status = ($prediction == 0) ? 'LOSS' : 'PROFIT';

        return $status;

    }
}
