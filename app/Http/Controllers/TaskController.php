<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{

    /**
     * Display a list of all of the user's task.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('tasks.index');
    }

}
