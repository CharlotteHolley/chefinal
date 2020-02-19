<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('welcome');
    }
    
    public function modules() {
        $module =[
    'Advanced Website Engineering',
    'Advanced Software Engineering',
    'Production Project',
    'Developing Mobile Applications',
    'Digital Security'
    ];
    
    return view('modules', [
    'module' => $module]);
    }
    
    public function rooms() {
        return view('rooms');
    }
}


