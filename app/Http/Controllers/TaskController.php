<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    // display all tasks in a space
    public function index($userId, $spaceId){
        //retrieve all tasks in a space
        $tasks = Task::where('space_id', $spaceId)
            ->orderBy('status', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        //check if tasks exist
        return view('tasks.index', ['tasks' => $tasks, 'userId' => $userId, 'spaceId' => $spaceId]);
    }

    // display the form to create a new task
    public function create($userId, $spaceId){
        return view('tasks.create', ['userId' => $userId, 'spaceId' => $spaceId]);
    }

    // store a new task
    public function store($userId, $spaceId){
        //validate data of the form
        request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'due_date' => ['required', 'date'],
        ], [
            'title.required' => 'The title field is required',
            'title.string' => 'The title field must be a string',
            'title.max' => 'The title field must not exceed 255 characters',
            'description.required' => 'The description field is required',
            'description.string' => 'The description field must be a string',
            'due_date.required' => 'The due date field is required',
            'due_date.date' => 'The due date field must be a date',
        ]);

        // retrieve the data from the form
        $title = request('title');
        $description = request('description');
        $due_date = request('due_date');

        // create a new task
        Task::create([
            'title' => $title,
            'description' => $description,
            'due_date' => $due_date,
            'space_id' => $spaceId,
        ]);

        // redirect to the task's index page
        return redirect()->route('task.index', ['userId' => $userId, 'spaceId' => $spaceId])
            ->with('success', 'Task created successfully');
    }

    // display the form to edit a task
    public function edit($userId, $spaceId, $taskId){
        // retrieve the task
        $task = Task::find($taskId);

        // check if the task exists
        if(!$task){
            return redirect()->route('task.index', ['userId' => $userId, 'spaceId' => $spaceId])
                ->withErrors(['error' => 'Task not found']);
        }

        return view('tasks.edit', ['task' => $task, 'userId' => $userId, 'spaceId' => $spaceId]);
    }

    // update a task
    public function update($userId, $spaceId, $taskId){
        // retrieve the task
        $task = Task::find($taskId);

        // check if the task exists
        if(!$task){
            return redirect()->route('task.index', ['userId' => $userId, 'spaceId' => $spaceId])
                ->withError('error', 'Task not found');
        }

        //validate data of the form
        request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'due_date' => ['required', 'date'],
        ], [
            'title.required' => 'The title field is required',
            'title.string' => 'The title field must be a string',
            'title.max' => 'The title field must not exceed 255 characters',
            'description.required' => 'The description field is required',
            'description.string' => 'The description field must be a string',
            'due_date.required' => 'The due date field is required',
            'due_date.date' => 'The due date field must be a date',
        ]);

        // retrieve the data from the form
        $title = request('title');
        $description = request('description');
        $due_date = request('due_date');

        // update the task
        $task->title = $title;
        $task->description = $description;
        $task->due_date = $due_date;
        $task->save();

        // redirect to the task's index page
        return redirect()->route('task.index', ['userId' => $userId, 'spaceId' => $spaceId])
            ->with('success', 'Task updated successfully');
    }

    // delete a task
    public function destroy($userId, $spaceId, $taskId){
        // delete the task
        Task::destroy($taskId);

        // redirect to the task's index page
        return redirect()->route('task.index', ['userId' => $userId, 'spaceId' => $spaceId])
            ->with('success', 'Task deleted successfully');
    }

    // search for a task
    public function search($userId, $spaceId){
        // retrieve the search term
        $searchTerm = request('search');
        $searchTermLower = strtolower(request('search'));
        $searchTermUpper = strtoupper(request('search'));
        $searchTermCapitalized = ucfirst(request('search'));

        // retrieve all tasks in a space that match the search term
        $tasks = Task::where('space_id', $spaceId)
            ->where(function($query) use ($searchTermLower, $searchTermUpper, $searchTermCapitalized) {
                $query->where('title', 'like', '%' . $searchTermLower . '%')
                    ->orWhere('title', 'like', '%' . $searchTermUpper . '%')
                    ->orWhere('title', 'like', '%' . $searchTermCapitalized . '%')
                    ->orWhere('description', 'like', '%' . $searchTermLower . '%')
                    ->orWhere('description', 'like', '%' . $searchTermUpper . '%')
                    ->orWhere('description', 'like', '%' . $searchTermCapitalized . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // check if tasks exist
        return view('tasks.index', ['tasks' => $tasks, 'userId' => $userId, 'spaceId' => $spaceId, 'searchTerm' => $searchTerm, 'searchTermLower' => $searchTermLower, 'searchTermUpper' => $searchTermUpper, 'searchTermCapitalized' => $searchTermCapitalized]);
    }

    // add check functionality
    public function check($userId, $spaceId, $taskId){
        // retrieve the task
        $task = Task::find($taskId);

        // update the task
        $task->status = 0;
        $task->save();

        // redirect to the task's index page
        return redirect()->route('task.index', ['userId' => $userId, 'spaceId' => $spaceId]);
    }

    // remove check functionality
    public function uncheck($userId, $spaceId, $taskId){
        // retrieve the task
        $task = Task::find($taskId);

        // update the task
        $task->status = 1;
        $task->save();

        // redirect to the task's index page
        return redirect()->route('task.index', ['userId' => $userId, 'spaceId' => $spaceId]);
    }

    // add star functionality
    public function star($userId, $spaceId, $taskId){
        // retrieve the task
        $task = Task::find($taskId);

        // update the task
        $task->status = 2;
        $task->save();

        // redirect to the task's index page
        return redirect()->route('task.index', ['userId' => $userId, 'spaceId' => $spaceId]);
    }

    // remove star functionality
    public function unstar($userId, $spaceId, $taskId){
        // retrieve the task
        $task = Task::find($taskId);

        // update the task
        $task->status = 1;
        $task->save();

        // redirect to the task's index page
        return redirect()->route('task.index', ['userId' => $userId, 'spaceId' => $spaceId]);
    }
}












