<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class updatetab extends Command
{  protected $signature = 'reservations:delete-expired';
    protected $description = 'Delete expired reservations';

    public function handle()
    {
        // Find expired reservations
        $expiredReservations = Reservation::where('to', '<', Carbon::now())->get();

        // Delete expired reservations
        foreach ($expiredReservations as $reservation) {
            $reservation->delete();
        }

        $this->info('Expired reservations deleted successfully.');
    }
    }

    /**
     * Delete expired reservations.
     */
  

