<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Message;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $messageNotSeen = Message::getMessageNotSeen(\Auth::user()->id);
        dd($messageNotSeen);
    }
}
