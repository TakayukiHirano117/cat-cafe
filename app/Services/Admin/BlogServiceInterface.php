<?php

namespace App\Services\Admin;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;

interface BlogServiceInterface
{
    public function getAllBlog(): Collection;

    public function getBlog($id): Blog;

    public function storeBlog(array $blogRequestData): void;

    public function updateBlog($request, $id): void;
}