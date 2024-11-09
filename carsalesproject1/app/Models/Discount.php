<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car; // Add this line to import the Car model

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    // Specify fillable attributes to prevent mass assignment vulnerabilities
    protected $fillable = [
        'code',
        'percentage',
        'starting_time',
        'ending_time',
        'car_id'
    ];

    // Relationship to Car
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
