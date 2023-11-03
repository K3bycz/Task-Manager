<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\TaskModel;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function main()
    {  
        $currentDateTime = now();

        $lessThan7Days = TaskModel::select('id', 'title', 'deadline')
            ->where('user_id',  Auth::id())
            ->whereRaw('julianday(deadline) - julianday(?) < 7', [$currentDateTime])
            ->whereRaw('julianday(deadline) - julianday(?) > 0', [$currentDateTime])
            ->where('status', '!=', 'Zakończone')
            ->get();

        $highPriority = TaskModel::select('id','title','category')
            ->where('user_id',  Auth::id())
            ->where('priority', 'on')
            ->where('status', '!=', 'Zakończone')
            ->get();

        $afterTheDeadline = TaskModel::select('id','title','category')
            ->where('user_id',  Auth::id())
            ->whereDate('deadline', '<', $currentDateTime)
            ->where('status', '!=', 'Zakończone')
            ->get();

        $tasksCount = TaskModel::all()
            ->where('user_id',  Auth::id())
            ->count();

        $countDone = TaskModel::all()
            ->where('user_id',  Auth::id())
            ->where('status','Zakończone')
            ->count();
        
        $countHome = TaskModel::all()
            ->where('user_id',  Auth::id())
            ->where('category','Dom')
            ->count();

        $countJob = TaskModel::all()
            ->where('user_id',  Auth::id())
            ->where('category','Praca')
            ->count();

        $countStudy = TaskModel::all()
            ->where('user_id',  Auth::id())
            ->where('category','Studia')
            ->count();

        $countHobby = TaskModel::all()
            ->where('user_id',  Auth::id())
            ->where('category','Hobby')
            ->count();
            
        return view('home.home', compact('lessThan7Days','highPriority','afterTheDeadline','tasksCount','countDone','countHome','countJob','countStudy','countHobby'));}

    public function index(): View
    {
        $sortBy = request('sort_by', 'id'); 
        $sortOrder = request('sort_order', 'asc');

        $tasks = TaskModel::select('id', 'title', 'category', 'status')
            ->where('user_id',  Auth::id())
            ->orderBy($sortBy, $sortOrder)
            ->simplePaginate(18); 

        return view('tasks.taskList', [
            'tasks' => $tasks ]);
    }

    public function show(int $taskId)
    {   
        $task = TaskModel::where('id', $taskId)->first();

        return view('tasks.showTask',[
            'task' => $task]); 
    }

    public function create() 
    {
        return view('tasks.taskCreate');}

    public function store(Request $request)
    {
    $data = $request;
    TaskModel::create([
        'title' => $data['title'],
        'category' => $data['category'] ?? null,
        'status' => $data['status'] ?? null,
        'deadline' => $data['deadline'] ?? null, 
        'priority' => $data['priority'] ?? null,
        'description' => $data['description']?? null, 
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'user_id' => Auth::user()->id,
    ]);

    return redirect()->route('tasks.create')->with('success', 'Zadanie zostało dodane.');
    }

    public function update(Request $request, int $taskId) 
    {
        $data = $request->all();

        TaskModel::find($taskId)
            ->update([
                'title' => $data['title'],
                'category' => $data['category'] ?? null,
                'status' => $data['status'] ?? null,
                'deadline' => $data['deadline'] ?? null,
                'priority' => $data['priority'] ?? null,
                'description' => $data['description'] ?? null,
                'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('tasks.list')->with('success', 'Zadanie zostało zaktualizowane.');}

    public function destroy(Request $request, int $taskId) 
    {
        $data = $request->all();

        TaskModel::find($taskId)
            ->delete();
    
    return redirect()->route('tasks.list')->with('success', 'Zadanie zostało usunięte.');}
}
