<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectPageController extends Controller
{
    public function projectPage()
    {
        $projects = Project::with('category')
            ->get();
        $project_categories = ProjectCategory::all();
        return view('/projects', compact('projects', 'project_categories'));
    }
}
