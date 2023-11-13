<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->get();

        return view('admin/project/index', ['projects' => $projects]);
    }

    public function create()
    {
        $project_categories = ProjectCategory::orderBy('name', 'ASC')->get();

        return view('admin/project/add', ['project_categories' => $project_categories]);
    }

    public function store(Request $request)
    {
        // validasi form
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'body' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:5120'
        ]);

        // menyimpan foto ke dalam public/avatar
        $saveImage['thumbnail'] = Storage::putFile('public/image', $request->file('thumbnail'));

        //menambahkan data ke database
        Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            // 'body' => $validated['body'],
            'category_id' => $validated['category_id'],
            'thumbnail' => $saveImage['thumbnail']
        ]);

        return redirect('/project');
    }

    public function edit($id)
    {
        $project_categories = ProjectCategory::get();
        $project = Project::with('category')->findOrFail($id);

        return view('admin/project/edit', ['blog_categories' => $project_categories, 'blog' => $project]);
    }

    public function update(Request $request, $id)
    {
        // mendapatkan data blog
        $dataProject = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            // 'body' => 'required|string',
            'category_id' => 'required',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:5120'
        ]);

        // cek data avatar
        if ($request->file('thumbnail')) {
            // hapus foto yang lama
            Storage::delete($dataProject->thumbnail);

            // simpan foto yang baru
            $newImage['thumbnail'] = Storage::putFile('public/thumbnail', $request->file('thumbnail'));
        }

        // update data pada database berdasarkan id
        Project::where('id', $id)->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            // 'body' => $validated['body'],
            'category_id' => $validated['category_id'],
            'thumbnail' => $newImage['thumbnail']
        ]);


        return redirect('/project');
    }

    public function destroy($id)
    {
        Project::destroy($id);

        return redirect('/project');
    }
}
