<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->get();

        return view('admin/blog/index', ['blogs' => $blogs]);
    }

    public function create()
    {
        $blog_categories = BlogCategory::orderBy('name', 'ASC')->get();

        return view('admin/blog/add', ['blog_categories' => $blog_categories]);
    }

    public function store(Request $request)
    {
        // validasi form
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:5120'
        ]);

        // menyimpan foto ke dalam public/avatar
        $saveImage['thumbnail'] = Storage::putFile('public/image', $request->file('thumbnail'));

        //menambahkan data ke database
        Blog::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'body' => $validated['body'],
            'category_id' => $validated['category_id'],
            'thumbnail' => $saveImage['thumbnail']
        ]);

        return redirect('/blog')->with('success', 'Blog Berhasil Dibuat!');
    }

    public function edit($id)
    {
        $blog_categories = BlogCategory::get();
        $blog = Blog::with('category')->findOrFail($id);

        return view('admin/blog/edit', ['blog_categories' => $blog_categories, 'blog' => $blog]);
    }

    public function update(Request $request, $id)
    {
        // mendapatkan data blog
        $dataBlog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:5120'
        ]);

        // cek data avatar
        if ($request->file('thumbnail')) {
            // hapus foto yang lama
            Storage::delete($dataBlog->thumbnail);

            // simpan foto yang baru
            $newImage['thumbnail'] = Storage::putFile('public/thumbnail', $request->file('thumbnail'));
        }

        // update data pada database berdasarkan id
        Blog::where('id', $id)->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'body' => $validated['body'],
            'category_id' => $validated['category_id'],
            'thumbnail' => $newImage['thumbnail']
        ]);


        return redirect('/blog')->with('success', 'Blog Berhasil Diubah!');
    }

    public function destroy($id)
    {
        Blog::destroy($id);

        return redirect('/blog')->with('success', 'Blog Berhasil Dihapus!');
    }
}
