<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ApiTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json([
            'status' => true,
            'tasks' => $tasks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Task Created successfully!",
            'task' => $task
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $task = Task::findOrFail($id);
            return response()->json([
                'task' => $task,
            ]);
        } catch (ModelNotFoundException $e) {
            throw ValidationException::withMessages([
                'id' => 'Task ID not found.',
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->fill($request->only([
                'title',
                'description'
            ]));

            $task->save();
            return response()->json([
                'task' => $task,
            ]);
        } catch (ModelNotFoundException $e) {
            throw ValidationException::withMessages([
                'id' => 'Task not found.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $post = Task::findOrFail($id);

            $post->delete();

            return response()->json(['message' => 'Task deleted successfully']);
        } catch (ModelNotFoundException $e) {
            throw ValidationException::withMessages([
                'id' => 'Task not found.',
            ]);
        }
    }
}
