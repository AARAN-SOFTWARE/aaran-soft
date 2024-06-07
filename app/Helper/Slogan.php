<?php


namespace App\Helper;

use Carbon\Carbon;
use NumberFormatter;

class Slogan
{
    public static function facts(): string
    {
        date_default_timezone_set("Asia/Kolkata");

        $day = Carbon::now()->format('d');
        if ($day = "1") {
            return "Success is not final; failure is not fatal: it is the courage to continue that counts.";
        } else


            if ($day >= "2") {
                return "Business opportunities are like buses, there’s always another one coming.";
            } else


                if ($day >= "3") {
                    return "Success usually comes to those who are too busy to be looking for it.";
                } else


                    if ($day >= "4") {
                        return "If you really look closely, most overnight successes took a long time.";
                    }  else

                        if ($day >= "5") {
                            return "I owe my success to having listened respectfully to the very best advice, and then going away and doing the exact opposite.";
                        }  else

                            if ($day >= "6") {
                                return "Even if you are on the right track, you’ll get run over if you just sit there.";
                            }  else

                                if ($day >= "7") {
                                    return " The way to get started is to quit talking and begin doing.";
                                }  else


        return "Welcome, Have a nice day";
    }
}
