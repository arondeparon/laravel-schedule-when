<?php

namespace ArondeParon\ScheduleWhen\Tests\Command;

use ArondeParon\ScheduleWhen\ScheduleWhen;
use ArondeParon\ScheduleWhen\Tests\TestCase;
use ArondeParon\ScheduleWhen\Commands\ScheduleWhenCommand;

class ScheduleWhenCommandTest extends TestCase
{
    public function test_it_requires_a_valid_date()
    {
        $this->mock(ScheduleWhen::class)
            ->shouldNotReceive('handle');

        $this->artisan(ScheduleWhenCommand::class, ['dateTime' => 'Banana Pancakes'])->assertExitCode(1);
    }

    public function test_it_will_default_to_now_if_no_argument()
    {
        $this->mock(ScheduleWhen::class)
            ->shouldReceive('handle');

        $this->artisan(ScheduleWhenCommand::class)->assertExitCode(0);
    }

    public function test_it_will_call_the_service_if_date_is_valid()
    {
        $this->mock(ScheduleWhen::class)
            ->shouldReceive('handle');

        $this->artisan(ScheduleWhenCommand::class)->assertExitCode(0);
    }
}