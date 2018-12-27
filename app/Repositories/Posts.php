<?php

namespace App\Repositories;
use App\Post;
use App\Redis;

class Posts
{
    protected $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    public function all()
    {
        return Post::all();
    }

    public function showPosts()
    {
        return Post::latest()
            ->filter([
                'month' => request()->month,
                'year' => request()->year,
            ])
            ->simplePaginate(5);
    }

    public function archives()
    {
        return Post::selectRaw('year(created_at) as year, monthname(created_at) as month,count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}

