<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discount; // Add this line to import the Discount model

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    // Specify fillable attributes to prevent mass assignment vulnerabilities
    protected $fillable = [
        'brand',
        'model',
        'type',
        'price',
        'year',
        'mileage',
        'fuel_type',
        'transmission',
        'ssn',
        'purchase_date_time',
        'purchased_by_user_id',
        'comment',
        'comment_date_time'
    ];
    protected $casts = [
        'purchase_date_time' => 'datetime', // Cast purchase_date_time to Carbon instance
    ];
    public function buyer()
    {
        return $this->belongsTo(User::class, 'purchased_by_user_id');
    }

    // Relationship to Discount
    public function discounts()
    {
        return $this->hasMany(Discount::class, 'car_id');
    }
}
