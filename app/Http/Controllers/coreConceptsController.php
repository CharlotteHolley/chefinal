<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Twitter;

class coreConceptsController extends Controller
{
    public function show(Twitter $twitter) 
    //public function show (Filesystem $file) {
    //  dd($file)->get();  
    //}
    {
   //$filesystem = app('Illuminate\Filesystem\Filesystem');
    //$twitter = app('twitter');
        dd($twitter);
        
    return view('CoreConcepts/twitter');
        
    }

        
}