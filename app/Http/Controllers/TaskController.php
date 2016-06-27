<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Repository\TaskRepository;

class TaskController extends Controller
{

    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;
    
    public function __construct(TaskRepository $tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Display a list of all of the user's task.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //$tasks = $request->user()->tasks()->get();
        return view('pages/tasks.index', ['tasks' => $this->tasks->forUser($request->user())]);
    }

    public function store(Request $request)
    {
        $status = "";
        $input = $request->all();
        $model = new Task();
        if ($model->validate($input))
        {
            // success code
            $model->name = $request->name;
//            $request->user()->tasks()->save($model);
            if ($this->tasks->saveTask($request->user(), $model))
            {
                $status = "saved";
            }
            else
            {
                $status = "error";
            }

            return redirect('/tasks')->with('status', $status);
        }
        else
        {
            //return back()->withInput();
            return redirect('/tasks')
                            ->withErrors($model->getErrors())
                            ->withInput();
        }
    }

    public function destroy(Request $request, Task $task)
    {
        $this->tasks->deleteTask($request->user(), $task);
        return redirect('/tasks');
    }

}
