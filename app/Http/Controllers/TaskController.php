<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function create(Request $request)
    {
        $task = Task::where('user_id', $request->user_id)->where('is_completed', 0)->get();

        $taskCount = $task->count();

        if ($taskCount === 5) {
            $validateTask = 'El usuario ya tiene 5 tareas pendientes.';
             return response()->json(['message' => 'Task was not saved in DB. ' . $validateTask]);
        }
        try {
            $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'company_id' => 'required',
                'user_id' => 'required',
            ]);

            $task = Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'is_completed' => false,
                'company_id' => $request->company_id,
                'user_id' => $request->user_id,
                'start_at' => now(),
            ]);

            $task->load('user', 'company');

            $response = [
                'id' => $task->id,
                'name' => $task->name,
                'description' => $task->description,
                'user' => $task->user->name,
                'company' => [
                    'id' => $task->company->id,
                    'name' => $task->company->name
                ]
            ];

            return response()->json($response);
        } catch (\Exception $error) {
            return response()->json(['message' => 'Task was not saved in DB', 'error' => $error->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
