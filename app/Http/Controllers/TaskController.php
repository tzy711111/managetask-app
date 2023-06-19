<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');
        /*Sort the data based on the due date and direction (ascending / descending)*/
        $tasks = Task::orderBy($sort, $direction)->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'required',
        ], [
            /*Display error message if title or due date is empty*/
            'title.required' => 'The title cannot  be empty.',
            'due_date.required' => 'The due date cannot  be empty.',
        ]);
    
        Task::create($input);
    
        /*Redirect to the task index page with a success message.*/
        return redirect()->route('tasks.index')->with('success_message', 'Task added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        /*Retrieve a task object using the task ID or throw an exception.*/
        $task = Task::findOrFail($id);
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        /*Retrieve a task object using the task ID or throw an exception.*/
        $task = Task::findOrFail($id);
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        /*Retrieve a task object using the task ID or throw an exception.*/
        $task = Task::findOrFail($id);
    
        $input = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'due_date' => 'required',
        ], [
             /*Display error message if title or due date is empty*/
            'title.required' => 'The title cannot  be empty.',
            'due_date.required' => 'The due date cannot  be empty.',
        ]);
    
        $task->update($input);
    
        /*Redirect to the task.show page with a success message.*/
        return redirect()->route('tasks.show', ['id' => $task->id])->with('success_message', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        /*Retrieve a task object using the task ID or throw an exception.*/
        Task::findOrFail($id)->delete();

         /*Redirect to the task index page with a success message.*/
        return redirect()->route('tasks.index')->with('success_message', 'Task deleted successfully!');
    }
}
