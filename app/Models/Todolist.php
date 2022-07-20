<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'created_at', 'todo_memo', 'task_id'];

    public function task(){
        return $this->hasOne('App\Models\Task');
    }

    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
