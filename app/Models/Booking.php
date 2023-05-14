<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'check_in',
        'check_out',
        'hotel_id',
        'guest_adult',
        'guest_children',
        'currency',
        'residency',
        'book_hash',
        'partner_order_id',
    ];
}
