<?php

namespace ArondeParon\ScheduleWhen;

use ArondeParon\ScheduleWhen\Commands\ScheduleWhenCommand;
use Illuminate\Support\ServiceProvider;

class ScheduleWhenServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        $this->commands([
            ScheduleWhenCommand::class
        ]);
    }
}
