<?php

use App\Notifications\SubscriptionRenewalFailed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Services\Twitter;
use App\Repositories\UserRepository;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// -------------------------------------------------------------------------------------------------------

// Core Concepts (Video)

            //app()->bind('Concepts', function() { //--> multiple ids per statement
    
           // app()->singleton('Concepts', function() { // --> one ID (one instance) 
    
           //     return new \App\Concepts;
    
           // });

//-----------------------------------------------------------
//1      
Route::get ('/CoreConcepts/Twitter', 'coreConceptsController@show');

//-----------------------------------------------------------
// 3
Route::get('/Coreconcepts/TwitterService', function(Twitter $twitter) {
    
    dd($twitter);
   return view('CoreConcepts/TwitterService');
   
});

//-----------------------------------------------------------
//1
app()->singleton('App\Services\Twitter', function() {
   
    return new Twitter(config('services.twitter.secret')); 
   //return new App\Services\Twitter('this is my twitter statement'); 
   //return new App\Services\Twitter('aip-key from twitter');
});

//-----------------------------------------------------------
//
Route::get('/CoreConcepts/UserRepository', Function(UserRepository $users) {
    
    dd($users);
    
    return view('CoreConcepts/UserRepository');
});

//-----------------------------------------------------------
//1           
Route::get('/CoreConcepts/coreconcept', function() {
   
    return view('CoreConcepts/coreconcept');
});

//-----------------------------------------------------------
//2
Route::get('/CoreConcepts/ServiceProviders', function() {
    
    dd(app('service'));
   
    return view('CoreConcepts/ServiceProviders');
});

//-----------------------------------------------------------
//1
Route::get('/CoreConcepts/Containers', function () {
   
   //dd(app(Filesystem::class));
   
   dd(app('App\Concepts'));
   
   // dd(app('Concepts'), app('Concepts'));
  
    return view('CoreConcepts/Containers');
    
});

// -------------------------------------------------------------------------------------------------------





//Testing (Beginning)

Route::post('rooms', function () {
   
    $attributes = request()->validate(['name' => 'required']);
    $attributes['user_id'] = auth()->id();
   
    App\Team::create($attributes);
   
   
    return redirect('/');
   
});
    

//Eloquent Relationships 
Route::get('/', function () {
    
   $user = App\User::first();
   
   $user->posts()->create([
    'title' => 'Example',
    'body' => 'Example body'
   ]);
   
  $example = $post->tags()->attach(1);
   
   return view('welcome');
   
});

//Trigger a notification
Route::get('/notification', function() {
    
   $user = App\User::first(); 
   
   $user->notify(new SubscriptionRenewalFailed);
   
   return view('notification');
   
});

//Sessions

//Route::get('/', function(Request $request) {
    
    //return session('Adam', 'Charlotte');
    //return session('name');
    //session(['name' => 'Charlotte']);
    
    //return $request->session()->get('abc', 'default');
    
    //$request->flash(); //Saves for one more page load
   
   //return view('welcome');
   
//});

Route::get('session', function() {
   
    return view('session');
});

function flash($message) {
        session()->flash('message', $message);
}


Route::get('create', function() {

    return view('create');

});

Route::post('session', function() {

    flash('Your user-session has been created! Refresh page to see session removed.');
   
    return redirect('session');

});

/*
GET /deadlines (index)
GET /deadlines/create (create)
GET /deadline/1 (show)
POST /deadlines (store)
GET /deadline/1/edit (edit)
PATCH /deadlines/1 (update)
DELETE /deadlines/1 (destroy)
*/

Route::get ('/', 'PagesController@home');
Route::get ('/modules', 'PagesController@modules');
Route::get ('/rooms', 'PagesController@rooms');

Route::resource('/deadlines','deadlineController')->middleware('auth');

//Route::get ('/deadlines/', 'deadlineController@index');
//Route::get ('/deadlines/create', 'deadlineController@create');
//Route::post ('/deadlines', 'deadlineController@store');
//Route::get ('/deadlines/{deadline}','deadlineController@show');
//Route::get ('/deadlines/{deadline}/edit','deadlineController@edit');
//Route::patch ('/deadlines/{deadline}','deadlineController@show');
//Route::delete ('/deadlines/{deadline}','deadlineController@delete');

Route::post('/deadlines/{deadline}/tasks', 'ProjectTasksController@store');
//Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::post('completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('completed-tasks/{task}', 'CompletedTasksController@destroy');

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/modules', function () {
    
  //  $module =[
   // 'Advanced Software Engineering',
  //  'Production Project',
  //  'Developing Mobile Applications',
   // 'Digital Security'
 //   ];
    
 //   return view('about', [
 //   'modules' => $module]);
//});

//Route::get('/contact', function () {
  //  return view('contact');
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
