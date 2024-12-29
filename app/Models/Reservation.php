<?php

namespace App\Models;

use App\Models\User;
use App\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Reservation extends Model
{
    protected $fillable = ['car_type','place_id', 'ft','from','to', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function pid() {
        return $this->belongsTo(Place::class, 'place_id');
    }
    public function deleteExpiredReservations()
    {  $now = Carbon::now();
    
    $expiredReservations = $this->where('to', '<=', $now)->get();

    foreach ($expiredReservations as $reservation) {
        $reservation->delete();
    }
    
    
        
    }
}
