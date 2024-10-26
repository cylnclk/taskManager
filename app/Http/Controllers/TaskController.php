<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Atanan görevleri görmek için kullanılmaktadır
    */
    public function index()
    {
        $user = User::with('tasks')->find(Auth::id());
        return view('tasks.index', ['tasks' => $user->tasks]);
    }
    /**
     * Kendi oluşturduğu görevleri görmek için kullanılmaktadır
     */
    public function myTask()
    {
        return view('tasks.index', ['tasks' => Task::where('created_by', Auth::id())->get()]);
    }
    public function create()
    {
        return view('tasks.create');
    }
    public function store(TaskRequest $request)
    {

        $newTask = Task::create($request->all());
        $task = Task::find($newTask->id);
        $task->users()->sync([Auth::id()]);

        return redirect()->route('tasks.index');
    }
    public function show(Task $task)
    {
        return $task;
    }
    public function edit(Task $task) {
        return view('tasks.edit', ['task' => $task,'users'=>User::all()]);
    }
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        $task->users()->sync($request->user_id);
        return redirect()->route('tasks.index');
    }
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('Görev Silindi');
    }

    public function completed(Task $task)
    {
        $task->update(['status' => 'completed']);
        return redirect()->route('tasks.index')->with('Görev Tamamlandı');

    }

}
