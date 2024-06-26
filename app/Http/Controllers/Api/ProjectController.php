<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        $projects = Project::with('type', 'technologies')->get();

        return response()->json([
            'projects' => $projects
        ]);
    }

    public function show(Project $project)
    {
        $project->load('type', 'technologies');

        return response()->json([
            'project' => $project
        ]);
    }
}
