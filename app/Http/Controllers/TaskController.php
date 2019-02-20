<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Auth');
    }

    public function index(Request $request, Task $task)
    {
        //gets all the tasks based on current user id
        $allTasks = $task->whereIn('user_id', $request->user())->with('user');
        $tasks = $allTasks->orderBy('created_at','desc')->take(10)->get();

        //return json response
        return response()->json(['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //validate
        $this->validate($request,[
           'name' => 'required|max:255'
        ]);
        //create a new task based on user tasks relationship
        $task = $request->user()->tasks()->create([
           'name' => $request->name,
        ]);

        //returns tasks with the user objejct
        return response()->json($task->with('user')->find($task->id));

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
