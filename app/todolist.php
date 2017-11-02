<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todolist extends Model
{
  
    
        protected $table = 'todolist';
        public $timestamps = false;
       protected  $primaryKey= 'id';
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
    
        // protected $fillable = [
        //     'name', 'email', 'password','code_verify',
        // ];
    
        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        // protected $hidden = [
        //     'password', 'remember_token',
        // ];

        public function task()
        {
            return $this->hasMany('App\task');
        }
}


