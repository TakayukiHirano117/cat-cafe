<?php

namespace App\Services\Admin;

use App\Repositories\Admin\BlogRepository;

class BlogService
{
    public function __construct(protected BlogRepository $blogRepository)
    {
    }
    
    public function storeBlog(array $blogRequestData)
    {
        $savedImagePath = $blogRequestData['image']->store('blogs', 'public');
        $blogRequestData['image'] = $savedImagePath;
        $this->blogRepository->store($blogRequestData);
    }
}