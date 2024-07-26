<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Item extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_id',
        'item_name',
        'item_price',
        'item_description',
        'item_image',
        'item_category',
        'item_stock',
        'item_status',
        'is_examination',
        'deleted',
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = 'item_id'; // Replace 'user_id' with the actual primary key column name of your users table

}
