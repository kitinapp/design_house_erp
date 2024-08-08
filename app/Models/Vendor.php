<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'city',
        'status'
    ];

    // Define the inverse relationship
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
