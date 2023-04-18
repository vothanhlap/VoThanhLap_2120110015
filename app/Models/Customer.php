<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class Customer extends Authenticatable
{
    use HasFactory;
    protected $table = 'vtl_custumer';
    public $timestamps = false;

    protected $fillable = [
        'password',
        'username',
        'email',
        'status',
        'token'
    ];
}
