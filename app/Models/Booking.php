<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'check_in',
        'check_out',
        'total_price',
        'payment_status'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}