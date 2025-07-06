<?php

namespace App\Services\Admin;

use App\Repositories\Admin\BlogRepository;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;
use Storage;

class BlogService implements BlogServiceInterface
{
    public function __construct(protected BlogRepository $blogRepository)
    {
    }

    /**
     * ブログを全件取得する
     */
    public function getAllBlog(): Collection
    {
        return $this->blogRepository->getAllBlog();
    }

    /**
     * ブログ１件の詳細データを取得する
     */
    public function getBlog($id): Blog
    {
        return $this->blogRepository->getBlog($id);
    }

    /**
     * ブログを登録する
     */
    public function storeBlog(array $blogRequestData): void
    {
        $savedImagePath = $blogRequestData['image']->store('blogs', 'public');
        $blogRequestData['image'] = $savedImagePath;
        $this->blogRepository->store($blogRequestData);
    }

    /**
     * ブログを更新する
     */
    public function updateBlog($request, $id): void
    {
        $blog = $this->blogRepository->getBlog($id);
        $validatedRequestData = $request->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($blog->image);
            $validatedRequestData['image'] = $request->file('image')->store('blogs', 'public');
        }

        $this->blogRepository->update($blog, $validatedRequestData);
    }

    public function deleteBlog($id): void
    {
        $blog = $this->blogRepository->getBlog($id);
        Storage::disk('public')->delete($blog->image);
        $blog->delete();
    }
}
