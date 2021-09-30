<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    /*public function store(Request $request)
    {

        $task = new Task;
    }*/

    function index()
    {

        $tasks = Task::orderBy('created_at', 'asc')->get();

        // dd($tasks);

        return view('tasks', ['tasks' => $tasks]);
    }

    function delete()
    {
        $tasksId = Task::select('id');
        Task::findOrFail($tasksId)->delete();
        return redirect('/');
    }

    function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    
    }
}
