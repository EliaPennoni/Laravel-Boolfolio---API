<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// models
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = Project::get();
        $projects = Project::with('type', 'technologies')->paginate(3);
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'ok',
            'data' => [
                'projects' => $projects

            ],

        ]);
    }

    public function show(string $slug)
    {
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'ok',
                'data' => [
                    'projects' => $project
                ],

            ]);
        } else {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Bad',
            ]);

        }

    }
}

