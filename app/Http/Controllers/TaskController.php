<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
{
    /**
     * Store a new incomplete task for the authenticated user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // validate the given request
        $data = $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);
        $input = $request->all();
        $task = new Task();
        $task->task = request("title");
        $task->iscompleted = 0;
        $task->user_id = Auth::user()->id;
        $task->save();
        return redirect()->back()->with("message", "Task has been added");

    }

    /**
     * Mark the given task as complete and redirect to tasks index.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */


    public function taskupdate(Task $task, $id)
    {
       $task=Task::find($id);
        if($task->iscompleted == false){
            $task->iscompleted = true;
        }else{
            $task->iscompleted = false;
        }
        $task->save();
        return response()->json($task);
    }


}
