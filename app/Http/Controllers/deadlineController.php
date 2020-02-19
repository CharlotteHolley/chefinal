<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\deadline;
use App\Mail\DeadlineCreated;
use App\Events\DeadlinePublished;

//use Illuminate\Http\Request;

class deadlineController extends Controller 
{

    
    public function index() {
        
      //$deadlines = auth()->user()->deadlines;
        
     //$deadlines = deadline::where('owner_id', auth()->id())->get();
        
        return view('deadlines/index', [
        
        'deadlines' => auth()->user()->deadlines
        
        ]);
    }
    
    public function create() {
                
      return view('deadlines/create');
      
    }
    
    public function store() {
        
       $attributes = request()->validate([ 
        
        'subject' => ['required', 'min:5', 'max:60'],
        'description' => ['required', 'min:10', 'max:255']
        ]);
        
        $attributes['owner_id'] = auth()->id();
        
        $deadline = Deadline::create($attributes);
        
        //event(new DeadlinePublished($deadline)); // fire an event

        return redirect('/deadlines');
        
    }
    
    public function show(Deadline $deadline) 
    //public function show (Filesystem $file) {
    //  dd($file)->get();  
    //}
    {
        
        //abort_if($deadline->owner_id !== auth()->id(), 403);
        $this->authorize('update', $deadline);
        //abort_if(\Gate::denies('update', $deadline), 403);
           
        return view('deadlines/show', compact('deadline'));
    
    }
    
    public function edit(Deadline $deadline) {
        
       // $deadline = Deadline::findOrFail($id);
        
        return view('deadlines/edit', compact('deadline'));
    
    }
    
    public function update(Deadline $deadline) {
    
    $this->authorize('update', $deadline);
    
    $deadline->update(request(['subject','description']));
            
    $deadline->save();
    
    return redirect('/deadlines');
    
    }
    
    public function destroy(Deadline $deadline) {
        
        $this->authorize('update', $deadline);
        
        
        //dd('delete'.$id);
        
       //Deadline::findOrFail($id)->delete();
       
       $deadline->delete();
    
       return redirect('/deadlines');
    
    }

}
