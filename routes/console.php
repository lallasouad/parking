<?php

use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;



Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();



schedule::call(function () {
    Reservation::deleteExpiredReservations();
})->everyFiveSeconds();
 
