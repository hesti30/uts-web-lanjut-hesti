<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $blogcategories = BlogCategory::orderBy('id', 'ASC')->get();

        return view('admin/blogcategory/index', ['blog_categories' => $blogcategories]);
    }

    public function create()
    {
        // ambil data category
        $data['blog_categories'] = BlogCategory::all();

        // create data (add)
        return view('admin/blogcategory/add', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        //menambahkan data ke database
        BlogCategory::create([
            'name' => $validated['name'],
        ]);

        return redirect('/blogcategory')->with('success', 'Blog Category Berhasil Dibuat!');
    }

    public function edit($id)
    {
        $category['blog_category'] = BlogCategory::findOrFail($id);

        return view('admin/blogcategory/edit', $category);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        BlogCategory::where('id', $id)->update([
            'name' => $validated['name'],
        ]);

        return redirect('/blogcategory')->with('success', 'Blog Category Berhasil Diubah!');
    }

    public function destroy($id)
    {
        BlogCategory::destroy($id);

        return redirect('/blogcategory')->with('success', 'Blog Category Berhasil Dihapus!');
    }
}
