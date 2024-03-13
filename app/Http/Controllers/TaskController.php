<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('assignee','user')->where('user_id',Auth::user()->id)->orWhere('assignUserId',Auth::user()->id)->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Validate the input data
         $request->validate([
            'title' => 'required|max:255',
            'due_date' => 'required',
            'priority' => 'required',
            'status' => 'required',
        ]);

        // Create the task
        $request->request->add(['user_id' => Auth::user()->id]);
        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        // Validate the input data
        $request->validate([
            'title' => 'required|max:255',
            'due_date' => 'required',
            'priority' => 'required',
            'status' => 'required',
        ]);

        // Update the task
        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        // Delete the task
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function assignUserTask($task =null){
        $users = User::all();
        if($task){
            $task = Task::find($task);
            return view('tasks.user-assign-form')->with(['task'=>$task ,'users' =>$users]);
        }else{
            $tasks = Task::all();
            return view('tasks.user-task-assign-form')->with(['tasks'=>$tasks ,'users' =>$users]);
        }
       

    }
    public function assignToTask(Request $request,$task){

        $task = Task::find($task);
        $task->assignUserId = $request->user;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task Assign to user successfully.');
    }
    public function taskAssignToUser(Request $request){

        $task = Task::find($request->task_id);
        $task->assignUserId = $request->user;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task Assign to user successfully.');
    }

    public function assignProjectTask($task =null){
        $projects = Project::all();

        if($task){
            $task = Task::find($task);
            return view('tasks.project-assign-form')->with(['task'=>$task ,'projects' =>$projects]);
        }else{
            $tasks = Task::all();
            return view('tasks.project-task-assign-form')->with(['tasks'=>$tasks ,'projects' =>$projects]);
        }

    }
    public function assignToProject(Request $request,$task){

        $task = Task::find($task);
        $task->project_id = $request->project_id;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task Assign to Project successfully.');
    }
    public function assignTaskToProject(Request $request){

        $task = Task::find($request->task_id);
        $task->project_id = $request->project_id;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task Assign to Project successfully.');
    }
}
