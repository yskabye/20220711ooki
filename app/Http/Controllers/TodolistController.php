<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use App\Http\Requests\TodolistRequest;

class TodolistController extends Controller
{
    public function index()
    {
        $todolists = Todolist::all();

        return view('index', ['todolists' => $todolists]);
    }
	
    public function add(TodolistRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todolist::create($form);
        return redirect('/');
    }

    public function update(TodolistRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todolist::where('id', $request->id)->update($form);

        return redirect('/');
    }
    
    public function remove(TodolistRequest $request)
    {
        Todolist::find($request->id)->delete();

        return redirect('/');
    } 
}
