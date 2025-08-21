<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
        'user_id', 'course_id', 'rate', 'review', 'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public static function getAllUserReview()
    {
        return ProductReview::with(['user', 'course'])->where('user_id', auth()->user()->id)->paginate(10);
    }
} 