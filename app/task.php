<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
   
    
        protected $table = 'task';
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

        public function todolist()
        {
            return $this->belongsTo('App\todolist');
        }
}
