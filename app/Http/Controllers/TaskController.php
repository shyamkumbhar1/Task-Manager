<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TaskController extends Controller
{

    public function index(): View
    {
        $tasks = Task::latest()->paginate(5);

        return view('tasks.index',compact('tasks'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create(): View
    {
        return view('tasks.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
                        ->with('success','Task created successfully.');
    }

    public function show(Task $task): View
    {
        return view('tasks.show',compact('task'));
    }


    public function edit(Task $task): View
    {
        return view('tasks.edit',compact('task'));
    }


    public function update(Request $request, Task $task): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
                        ->with('success','Task updated successfully');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index')
                        ->with('success','Task deleted successfully');
    }
}
