<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // display all tasks in a space
    public function index($userId, $spaceId){
        //retrieve all tasks in a space
        $tasks = Task::where('space_id', $spaceId)
            ->get();

        //check if tasks exist
        return view('tasks.index', ['tasks' => $tasks, 'userId' => $userId, 'spaceId' => $spaceId]);
    }
}
