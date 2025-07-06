<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Blog;
use App\Services\Admin\BlogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Storage;

class AdminBlogController extends Controller
{
    public function __construct(protected BlogService $blogService)
    {
    }

    public function index(): View
    {
        $blogs = $this->blogService->getAllBlog();

        return view('admin.blogs.index', ['blogs' => $blogs]);
    }

    public function create(): View
    {
        return view('admin.blogs.create');
    }

    public function store(StoreBlogRequest $request): RedirectResponse
    {
        $this->blogService->storeBlog(blogRequestData: $request->validated());

        return to_route('admin.blogs.index')->with('success', 'ブログを登録しました');
    }

    public function show(string $id): View
    {
        $blog = $this->blogService->getBlog(id: $id);

        return view('admin.blogs.show', ['blog' => $blog]);
    }

    public function edit(string $id): View
    {
        $blog = $this->blogService->getBlog(id: $id);

        return view('admin.blogs.edit', ['blog' => $blog]);
    }

    public function update(UpdateBlogRequest $request, string $id): RedirectResponse
    {
        $this->blogService->updateBlog(request: $request, id: $id);

        return to_route('admin.blogs.index')->with('success', 'ブログを更新しました');
    }

    public function destroy(string $id)
    {
        $this->blogService->deleteBlog(id: $id);

        return to_route('admin.blogs.index')->with('success', 'ブログを削除しました');
    }
}
