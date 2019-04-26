<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProject;
use App\Models\Project;

class ProjectController extends Controller
{
    public function create(StoreProject $request)
    {
        $request->validated();

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'repository'=> $request->repository,
            'user_id' => auth()->user()->id
        ]);

        return back();
    }

    public function destroy()
    {
        Project::destroy(request()->project_id);

        return back()->with('success', 'Post deleted successfully!');
    }
}
