<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Schedule extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'schedule_id', 
        'user_id', 
        'start_date', 
        'end_date', 
        'from_time', 
        'end_time', 
        'status', 
        'deleted', 
        'updated_at', 
        'created_at'
    ];

    protected $primaryKey = 'schedule_id'; // Replace 'user_id' with the actual primary key column name of your users table

}
