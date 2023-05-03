<?php

namespace App\Http\Controllers\Api;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $results = Project::with('type:id,name','type.projects','technologies:name')->get();
        return response()->json([
            'results'=>$results,
        ]);
    }
}
