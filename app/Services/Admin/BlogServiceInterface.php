<?php

namespace App\Services\Admin;

use App\Models\Blog;
use Illuminate\Pagination\LengthAwarePaginator;

interface BlogServiceInterface
{
    public function getBlogs(): LengthAwarePaginator;

    public function getBlog($id): Blog;

    public function storeBlog(array $blogRequestData): void;

    public function updateBlog($request, $id): void;
}