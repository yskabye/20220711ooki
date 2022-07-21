<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use App\Models\Task;
use App\Http\Requests\TodolistRequest;
use Illuminate\Support\Facades\Auth;

class TodolistController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $todolists = Todolist::where('user_id', $user->id)->get();
        $tasks = Task::all();

        $task_id = session()->put('task_id', 0);
        $keyword = session()->put('keyword', '') . '*';

        return view('index', ['todolists' => $todolists, 'tasks' => $tasks, 'user' => $user]);
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

    public function find(Request $request)
    {
        $task_id = $request->session()->get('task_id');
        $keyword = $request->session()->get('keyword') . '*';
        $user = Auth::user();
        $todolists = Todolist::where('user_id', $user->id)->where('task_id', $task_id)->where('todo_memo', 'like', $keyword)->get();
        $tasks = Task::all();
        return view('todolist.find', ['todolists' => $todolists, 'tasks' => $tasks, 'user' => $user]);
    }

    public function search(Request $request)
    {
        dd($request);
        $request->session()->put('task_id', $request->task_id) ;
        dd($request->task_id);
        $request->session()->put('keyword', $request->keyword) ;

        /*return redirect('/todo/find');*/
    }

    public function list_update(TodolistRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todolist::where('id', $request->id)->update($form);

        return redirect('/todo/find');
    }

    public function list_remove(TodolistRequest $request)
    {
        Todolist::find($request->id)->delete();

        return redirect('/todo/find');
    }
}
