<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = [];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {
        if(isset($filters['month']) && $month = $filters['month']) {
            $query->whereMonth('created_at' , Carbon::parse($month)->month);
        }
        if(isset($filters['year']) && $year = $filters['year']) {
            $query->whereYear('created_at' , Carbon::parse($year)->year);
        }
    }

    public static function latestPosts()
    {
        return static::latest()
            ->take(5)
            ->get()
            ->toArray();
    }
}
