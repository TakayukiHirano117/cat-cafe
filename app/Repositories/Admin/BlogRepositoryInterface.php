<?php

namespace App\Repositories\Admin;

use App\Models\Blog;
use Illuminate\Pagination\LengthAwarePaginator;

interface BlogRepositoryInterface
{
    /**
     * ブログを10件取得する
     * @return LengthAwarePaginator
     */
    public function getBlogs();

    /**
     * ブログ１件の詳細データを取得する。
     * @param int $id
     * @return Blog
     */
    public function getBlog($id);

    /**
     * ブログを登録する
     * @param array $blogRequestData
     * @return void
     */
    public function store(array $blogRequestData): void;

    /**
     * ブログを更新する
     * @param Blog $blog
     * @param array $blogRequestData
     * @return void
     */
    public function update($blog, $blogRequestData): void;
} 