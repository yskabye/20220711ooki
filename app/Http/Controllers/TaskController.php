<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task(){
        return $this->belongsTo('App\Models\Todolist');
    }
}
