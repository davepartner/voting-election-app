<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        //go to the database 
        //retrieve the details of settings

        $currentTime = Carbon::now();

        $setting = Setting::find(1);

        View::share('getViewSetting', $setting);

        if($currentTime->gt($setting->nomination_start_date) && $currentTime->lt($setting->nomination_end_date)){
             //return true if currenttime is inbetween nomination date range
             View::share('isWithinNominationPeriod', 'yes');
             View::share('isWithinVotingPeriod', 'no');
        }else{
            View::share('isWithinNominationPeriod', 'no');
            View::share('isWithinVotingPeriod', 'no');
            //check if current time is within voting period
                if($currentTime->gt($setting->voting_start_date) && $currentTime->lt($setting->voting_end_date)){
                            //return true if currenttime is inbetween nomination date range
                            View::share('isWithinVotingPeriod', 'yes');
                    }
        }




    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
