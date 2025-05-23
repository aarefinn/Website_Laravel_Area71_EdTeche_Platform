<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'price', 'discount', 'duration', 
        'instructor', 'photo', 'status'
    ];

    /**
     * Relationship with Order Details
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'course_id', 'id');
    }
}
