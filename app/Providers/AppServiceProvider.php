<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\AccountObserver;
use App\Services\Sms\SmsGlobalSender;
use App\Services\Sms\SmsSender;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SmsSender::class, SmsGlobalSender::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(AccountObserver::class);
    }
}
