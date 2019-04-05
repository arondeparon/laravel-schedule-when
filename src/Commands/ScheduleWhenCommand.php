<?php

namespace ArondeParon\ScheduleWhen\Commands;

use ArondeParon\ScheduleWhen\ScheduleWhen;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ScheduleWhenCommand extends Command
{
    protected $name = 'schedule:when';

    protected $signature = 'schedule:when {dateTime=now}';

    protected $description = 'List the commands that will run at a certain time';

    public function handle()
    {
        try {
            $moment = Carbon::parse($this->argument('dateTime'));
        } catch (\Exception $e) {
            $this->error("Could not parse {$this->argument('dateTime')} into a valid Carbon object.");
            return 1;
        }

        /** @var ScheduleWhen $matcher */
        $matcher = app(ScheduleWhen::class);
        $dueEvents = $matcher->handle($moment);

        if (count($dueEvents) === 0) {
            $this->info("No commands will run at {$this->argument('dateTime')}.");
            return 0;
        }

        $this->info("The following commands will run at {$moment->toDateTimeString()}:");

        $this->table([
            'expression',
            'command',
        ], $dueEvents);

        return 0;
    }
}