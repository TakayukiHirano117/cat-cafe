<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Services\Admin\BlogService;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function __construct(protected BlogService $blogService) {}

    public function index()
    {
        return view('admin.blogs.index');
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(StoreBlogRequest $request)
    {
        $this->blogService->storeBlog($request->validated());

        return redirect()->route('admin.blogs.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
