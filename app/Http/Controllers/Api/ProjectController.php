<?php

namespace App\Http\Controllers\Api;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $results = Project::with('type:id,name','type.projects','technologies:name')->get();
        return response()->json([
            'results'=>$results,
        ]);
    }
    public function show($slug){
        $project = Project::where('slug', $slug)->first();
        if($project){
            return response()->json([
            'success'=>true,
            'project'=>$project,
        ]);
        } else {
            return response()->json([
                'success'=>false,
                'project'=>'nessuno progetto trovato ',
            ]);
        }
        
    }
}
