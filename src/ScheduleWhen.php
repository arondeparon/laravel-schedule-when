<?php

namespace ArondeParon\ScheduleWhen;

use Carbon\CarbonInterface;
use Cron\CronExpression;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Console\Kernel;

class ScheduleWhen
{
    /**
     * @var Schedule
     */
    private $schedule;

    /**
     * @var Kernel
     */
    private $kernel;

    public function __construct(Schedule $schedule, Kernel $kernel)
    {
        $this->schedule = $schedule;
        $this->kernel = $kernel;
    }

    public function handle(CarbonInterface $moment): array
    {
        $dueEvents = [];

        foreach ($this->schedule->events() as $event) {
            if (CronExpression::factory($event->getExpression())->isDue($moment->toDateTimeString())) {
                $dueEvents[] = [
                    'expression' => $event->getExpression(),
                    'command' => $event->command,
                ];
            }
        }

        return $dueEvents;
    }
}