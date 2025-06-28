<?php

namespace App\Repositories\Admin;

use App\Models\Blog;

class BlogRepository
{
    /**
     * ブログを登録する
     * @param array $blogRequestData
     * @return void
     */
    public function store(array $blogRequestData): void
    {
        Blog::create($blogRequestData);
    }
}
