<?php

namespace App\Services\Admin;

use App\Repositories\Admin\BlogRepository;

class BlogService
{
    public function __construct(protected BlogRepository $blogRepository) {}

    /**
     * ブログを登録する
     * @param array $blogRequestData
     * @return void
     */
    public function storeBlog(array $blogRequestData): void
    {
        $savedImagePath = $blogRequestData['image']->store('blogs', 'public');
        $blogRequestData['image'] = $savedImagePath;
        $this->blogRepository->store($blogRequestData);
    }
}
