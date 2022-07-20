<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '家事'
        ];
        Task::create($param) ;

        $param = [
            'name' => '勉強'
        ];
        Task::create($param) ;

        $param = [
            'name' => '運動'
        ];
        Task::create($param) ;

        $param = [
            'name' => '食事'
        ];
        Task::create($param) ;

        $param = [
            'name' => '移動'
        ];
        Task::create($param) ;
    }
}
