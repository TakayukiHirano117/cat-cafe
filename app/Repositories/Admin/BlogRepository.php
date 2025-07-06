<?php

namespace App\Repositories\Admin;

use App\Models\Blog;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogRepository implements BlogRepositoryInterface
{
    /**
     * ブログを10件取得する
     * @return LengthAwarePaginator
     */
    public function getBlogs(): LengthAwarePaginator
    {
        return Blog::latest('updated_at')->paginate(10);
    }

    /**
     * ブログ１件の詳細データを取得する。
     * @param int $id
     * @return Blog
     */
    public function getBlog($id)
    {
        return Blog::findOrFail($id);
    }

    /**
     * ブログを登録する
     * @param array $blogRequestData
     * @return void
     */
    public function store(array $blogRequestData): void
    {
        Blog::create($blogRequestData);
    }

    /**
     * ブログを更新する
     * @param Blog $blog
     * @param array $blogRequestData
     * @return void
     */
    public function update($blog, $blogRequestData): void
    {
        $blog->update($blogRequestData);
    }
}
