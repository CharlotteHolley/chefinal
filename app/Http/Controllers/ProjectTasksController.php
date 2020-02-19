<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\deadline;

class ProjectTasksController extends Controller
{
    
    public function store(Deadline $deadline) {
        
        $attributes = request()->validate(['description' => 'required', 'min:5', 'max:255']);
        
        $deadline->addTask($attributes);
        
      //  $deadline->addTask(request('description'));
        
     //   Task::create([
     //    'deadline_id' => $deadline->id,
     //   'description' => request('description')
     //   ]);
        
        return back();
    }    
    
}
