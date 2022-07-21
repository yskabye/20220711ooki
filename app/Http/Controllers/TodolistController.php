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

    public function find()
    {
        $user = Auth::user();
        $todolists = Todolist::where('user_id', $user->id)->where('task_id', 0)->get();
        $tasks = Task::all();
        return view('todolist.find', ['todolists' => $todolists, 'tasks' => $tasks, 'user' => $user]);
    }

    public function search(Request $request)
    {
        $task_id = 0 ;
        if(isset($request->task_id)) $task_id = $request->task_id;
        $keyword = '';
        if(isset($request->keyword)) $keyword = $request->keyword;
        $request->session()->put('task_id', $task_id) ;
        $request->session()->put('keyword', $keyword) ;

        $user = Auth::user();
        $todolists = $this->GetDataList($user->id, $keyword, $task_id) ;
        $tasks = Task::all();

        return view('todolist.find', ['todolists' => $todolists, 'tasks' => $tasks, 'user' => $user]);
    }

    public function list_update(TodolistRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todolist::where('id', $request->id)->update($form);

        $task_id = $request->session()->get('task_id') ;
        $keyword = $request->session()->get('keyword') ;

        $user = Auth::user();
        $todolists = $this->GetDataList($user->id, $keyword, $task_id) ;
        $tasks = Task::all();
        
        return view('todolist.find', ['todolists' => $todolists, 'tasks' => $tasks, 'user' => $user]);
    }

    public function list_remove(TodolistRequest $request)
    {
        Todolist::find($request->id)->delete();

        $task_id = $request->session()->get('task_id') ;
        $keyword = $request->session()->get('keyword') ;

        $user = Auth::user();
        $todolists = $this->GetDataList($user->id, $keyword, $task_id) ;
        $tasks = Task::all();
        
        return view('todolist.find', ['todolists' => $todolists, 'tasks' => $tasks, 'user' => $user]);
    }

    private function GetDataList($user_id, $keyword, $task_id)
    {
        $todolists = [];

        if(strlen($keyword) > 0 && $task_id > 0){
            $todolists = Todolist::where('user_id', $user_id)->where('task_id', $task_id)->where('todo_memo', 'like', $keyword)->get();
        }
        else if($task_id > 0){
            $todolists = Todolist::where('user_id', $user_id)->where('task_id', $task_id)->get();
        }
        else if(strlen($keyword) > 0){
            $todolists = Todolist::where('user_id', $user_id)->where('todo_memo', 'LIKE', $keyword . '%' )->get();
        }else{
            $todolists = Todolist::where('user_id', $user_id)->get();
        }

        return $todolists;
    }

}
