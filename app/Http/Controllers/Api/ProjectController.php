<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index (Request $request) {
        // $projects = Project::all();
        $last6 = $request->input("last6");

        if ($last6) {
            $projects = Project::orderBy("created_at", "DESC")->limit(6)->get();
        } else {
            $projects = Project::all();
        }

        return response()->json($projects);
    }

    public function show ($id) {
        $project = Project::findOrFail($id);

        return response()->json($project);
    }
}
