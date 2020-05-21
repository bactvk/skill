<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Message;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // \URL::forceScheme('https');
        view()->composer('admin.layouts.app',function($view){
            $messageNotSeen = Message::getMessageNotSeen(\Auth::user()->id);
            $view->with('messageNotSeen', $messageNotSeen );
        });

    }
}
