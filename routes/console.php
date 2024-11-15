<?php

use App\Console\Commands\DeleteCode;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;

// Commands
$this->command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Schedules
return [
    Schedule::command(DeleteCode::class)->everyTwoMinutes(),
];