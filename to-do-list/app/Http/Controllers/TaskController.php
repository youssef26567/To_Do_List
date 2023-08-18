<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
public function index(){
$task=Task::orderby('id','desc')->paginate(5);
$page='Tasks';
$titles='To_Do_List';
return view('task',['page'=>$page ,'tasks'=>$task,'title'=>$titles]);
}
public function create(){
    $page="Create New Tasks";
    return view("create_tasks",['page' =>  $page ]);
}
public function store(Request $request){

Task::create([
    "title"=>$request->title,
    "description"=>$request->description ,
     "status"=>'pending',
    "due_date"=>$request->due_date
]);
return redirect()->route('tasks.index');

}
public function show($task){

$task=Task::findOrFail($task);
$page='information';
    //dd($task) ;
return view('card_tasks',['page'=>$page,"task"=>$task]);
}
public function destroy($task){
    $task=Task::findOrFail($task);
        //dd($task) ;
        $task->delete();
        return redirect()->back();
    }
public function edit($task){
    $task=Task::find($task);
    $page='Update_Form';
    return view('update_tasks',["task"=>$task,'page'=>$page]);

}
public function update(Request $request,$task){

    $task = Task::find($task);
    $task->title = $request->input('title');
    $task->description = $request->input('description');
    // $task->status=$request->input('status') ;
    $task->due_date=$request->input('due_date');
    $task->update();
    return redirect()->route('tasks.index');
}

public function indexsaerch()
    {
        return view('result');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $results = Task::where('title', 'LIKE', "%$searchTerm%")
            ->orWhere('status', 'LIKE', "%$searchTerm%")
            ->get();

        return view('result',compact('results'));
    }
}
