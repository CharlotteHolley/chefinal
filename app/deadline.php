<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeadlineCreated;
use App\Events\DeadlinePublished;

class deadline extends Model
{
    //protected $fillable = [
    //'subject', 'description'
    //];
    
  protected $guarded = []; //(This used to allow ALL in)
  
//  protected static function boot() {
    
    //Mailables https://mailtrap.io/
    
//      parent::boot();
      
//      static::created(function ($deadline) {
          
//          \Mail::to('charlotteholley@email.com')-> send(
//        new DeadlineCreated($deadline)
//        );
//      });
//  }

protected $dispatchesEvents = [

'created' => DeadlinePublished::class

];
  
  public function owner() {
      
     return $this->belongsTo(User::class);
      
  }
  
  public function tasks()
    {
    return $this->hasMany(Task::class);
    }
    
    public function addTask($task) {
        
        $this->tasks()->create($task);
        
       // return Task::create([
       //  'deadline_id' => $this->id,
       // 'description' => $description
       // ]);
        
    }

}

