<?php


namespace ArondeParon\ScheduleWhen\Tests;


use ArondeParon\ScheduleWhen\ScheduleWhenServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ScheduleWhenServiceProvider::class
        ];
    }
}