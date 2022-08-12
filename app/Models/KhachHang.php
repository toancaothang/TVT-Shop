<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Notifications\Notifiable;
class KhachHang extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasFactory;
    protected $table = 'user';
    protected $fillable = [
        'username',
        'password',
        'email',
        'address',
        'birth',
        'gender',
        'status',
        'remember_token',
    ];
     /**
     * Get the password for the user.
     *
     * @return string
     */
   

    
}

