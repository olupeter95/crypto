<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Events\TestingEvent;
use DateTime;
use DateTimeZone;

class Trade extends Model
{
    use HasFactory;

    public function check_limit($up, $lp, $limit)
	{
		# code...
		//$rgn stands for randomly generated number
		switch($limit) {
            case '2x':
                $upl 	= $up * 2;
				$lpl 	= $lp * 2;
				$rgn    = mt_rand($upl,$lpl);
				return $rgn;
                break;

            case '5x':
                $upl 	= $up * 5;
				$lpl 	= $lp * 5;
				$rgn    = mt_rand($upl,$lpl);
				return $rgn;
                break;

            case '10x':
                $upl 	= $up * 10;
				$lpl 	= $lp * 10;
				$rgn    = mt_rand($upl,$lpl);
				return $rgn;
                break;

            case '20x':
                $upl 	= $up * 20;
				$lpl 	= $lp * 20;
				$rgn    = mt_rand($upl,$lpl);
				return $rgn;
                break;
	    }
	}

	public function make_a_trade($limit, $trade)
	{

		//Variables $up and $lp stands for "Upper Percentage" and "Lower Percentage"
		//Variables $upl and $lpl stands for "Upper Percentage Limit" and "Lower Percentage Limit"
		//E.g 4.3 - 6.15
		//4.3 is the Upper Percentage and 6.15 is the Lower Percentage

		if (($trade >= 200) && ($trade <= 499)) {
			# code...
			$up 	= ($trade * 4.3)/100;
			$lp 	= ($trade * 6.15)/100;

			return $this->check_limit($up, $lp, $limit);
		}
		elseif (($trade >= 500) && ($trade <= 999)) {
			# code...
			$up 	= ($trade * 3.86)/100;
			$lp 	= ($trade * 5.82)/100;

            // return $this->check_limit;

			return $this->check_limit($up, $lp, $limit);
		}
		elseif (($trade >= 1000) && ($trade <= 2999)) {
			# code...
			$up 	= ($trade * 3.3)/100;
			$lp 	= ($trade * 3.58)/100;

			return $this->check_limit($up, $lp, $limit);
		}
		elseif (($trade >= 3000) && ($trade <= 10000)) {
			# code...
			$up 	= ($trade * 2.9)/100;
			$lp 	= ($trade * 3.29)/100;

			return $this->check_limit($up, $lp, $limit);
		}
	}

	public function time_difference($trade_date, $trade_open_time, $timezone){
       
        $dt         = new DateTime("now", new DateTimeZone($timezone));
        $cdatetime  = DateTime::createFromFormat('Y-m-d H:i:s', $dt->format('Y-m-d').' '.$dt->format('H:i:s'));
    

        $Hour       = date("H:i:s", strtotime($trade_open_time)); 
        $day_part   = $trade_date[2].'-'.$this->getTradeMonth($trade_date[1]).'-'.$trade_date[0];
        $tdatetime  = DateTime::createFromFormat('Y-m-d H:i:s', $day_part.' '.$Hour);

        $diff = $tdatetime->diff($cdatetime)->i; 
        return $diff;
    }

    public function getTradeMonth($ch)
    {
        # code...
        switch ($ch){
            case 'Jan': 
                $month = '1';
            break;

            case 'Feb': 
                $month = '2';
            break;

            case 'Mar': 
                $month = '3';
            break;

            case 'Apr': 
                $month = '4';
            break;

            case 'May': 
                $month = '5';
            break;

            case 'Jun': 
                $month = '6';
            break;

            case 'Jul': 
                $month = '7';
            break;

            case 'Aug': 
                $month = '8';
            break;

            case 'Sep': 
                $month = '9';
            break;

            case 'Oct': 
                $month = '10';
            break;

            case 'Nov': 
                $month = '11';
            break;

            case 'Dec': 
                $month = '12';
            break;

        }

        return $month;
    }

}
