<?php

namespace App\Repositories\Admin;

use App\Models\Blog;

class BlogRepository
{
    /**
     * ブログを登録する
     */
    public function store(array $blogRequestData): Blog
    {
        return Blog::create($blogRequestData);
    }
}