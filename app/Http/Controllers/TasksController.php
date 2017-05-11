<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    //
    public function index() {

        //$tasks = DB::table('tasks')->latest()->get();

        $tasks = Task::all();

        return view('tasks.index', [
          'tasks' => $tasks
        ]);
    }

    //laravel assumes primary key
    public function show(Task $task) {         //($id) before, but laravel can do a ::find(*) if the names of the variables in the route and controller match a model? Name changes it breaks

      //$task = Task::find($id);

      return view('tasks.show', [
        'task' => $task
      ]);
    }

}
