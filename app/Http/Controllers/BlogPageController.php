<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function blogPage()
    {
        $blogs = Blog::with('category')
            ->get();

        $newblogs = Blog::with('category')
            ->orderBy('id', 'DESC')
            ->paginate(1);

        return view('blogs/index', ['blogs' => $blogs, 'new_blog' => $newblogs]);
    }

    public function detailBlogPage($id)
    {
        $blog = Blog::with('category')
            ->findOrFail($id);

        return view('blogs/detail', ['blogs' => $blog]);
    }
}
