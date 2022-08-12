<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table = 'bill';
    protected $fillable = [
        'receiver_fullname',
        'receiver_email',
        'user_id',
        'phone_number',
        'deliver_address',
        'notes',
    
    ];

}
