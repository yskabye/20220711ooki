<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todolist;

class TodolistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'todo_memo' => '入力２'
        ];
        Todolist::create($param) ;

        sleep(3) ;

        $param = [
            'todo_memo' => '入力３'
        ];
        Todolist::create($param) ;

        sleep(2) ;

        $param = [
            'todo_memo' => '入力４'
        ];
        Todolist::create($param) ;
    }
}
