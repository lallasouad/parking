<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    protected $fillable = ['fname', 'subject', 'message' ,'user_id' ,'statut'];
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
