<?php


namespace ArondeParon\ScheduleWhen\Tests;

use ArondeParon\ScheduleWhen\ScheduleWhen;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

class ScheduleWhenTest extends TestCase
{
    /** @var Schedule */
    protected $schedule;

    /** @var ScheduleWhen */
    protected $scheduleWhen;

    public function test_it_will_return_an_empty_array_if_none_match()
    {
        $results = $this->scheduleWhen->handle(Carbon::now());

        $this->assertCount(0, $results);
    }

    public function test_it_will_return_an_array_of_matched_items()
    {
        $mockedCommand = $this->mock(Command::class);
        $anotherCommand = $this->mock(Command::class);

        Carbon::setTestNow(Carbon::now()->setTimeFromTimeString('08:00'));

        $this->schedule->command($mockedCommand)
            ->daily()
            ->at('08:00');

        $this->schedule->command($anotherCommand)
            ->hourly();

        $results = $this->scheduleWhen->handle(Carbon::now());

        $this->assertCount(2, $results);
    }

    public function test_it_will_not_return_items_that_occur_on_other_intervals()
    {
        $mockedCommand = $this->mock(Command::class);
        $anotherCommand = $this->mock(Command::class);
        $someOtherCommand = $this->mock(Command::class);

        Carbon::setTestNow(Carbon::now()->setTimeFromTimeString('08:00'));

        $this->schedule->command($mockedCommand)
            ->daily()
            ->at('08:00');

        $this->schedule->command($anotherCommand)
            ->hourly();

        $this->schedule->command($someOtherCommand)
            ->dailyAt('08:01');

        $results = $this->scheduleWhen->handle(Carbon::now());

        $this->assertCount(2, $results);
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->schedule = app(Schedule::class);
        $this->scheduleWhen = app(ScheduleWhen::class);
    }
}