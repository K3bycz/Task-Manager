<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
        
        $title = "Pulpit";

        return view('home.home', compact('lessThan7Days','highPriority','afterTheDeadline','tasksCount','countDone','countHome','countJob','countStudy','countHobby', 'title'));
    }

    public function index(): View
    {
        $sortBy = request('sort_by', 'id'); 
        $sortOrder = request('sort_order', 'asc');

        $tasks = TaskModel::select('id', 'title', 'category', 'status')
            ->where('user_id',  Auth::id())
            ->orderBy($sortBy, $sortOrder)
            ->Paginate(10); 
            
        $title="Lista wszystkich zadań";

        return view('tasks.taskList', [
            'tasks' => $tasks, 'title' => $title]);
    }

    public function show(int $taskId)
    {   
        $task = TaskModel::where('id', $taskId)->first();

        $title = "Zadanie nr.".$taskId;

        return view('tasks.showTask', [
            'task' => $task, 'title' => $title ]); 
    }

    public function create() 
    {
        $title ="Dodaj nowe zadanie";
        return view('tasks.taskCreate',[
            'title' => $title]);
    }

    public function store(Request $request)
    {
        $title ="Dodaj nowe zadanie";
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|regex:/^[a-zA-Z\ąćęłńóśźż\s\.\-]*$/iu|max:50',
            'category' => 'required',
            'status' => 'required',
            'priority' => 'nullable',
            'deadline' => 'nullable',
            'description' => 'nullable|regex:/^[a-zA-Z\ąćęłńóśźż\s\.\-]*$/iu|max:250',
        ]);

        if ($validator->fails()) {
            return redirect('/tasks/create')
                ->with(['title' => $title,])
                ->withErrors($validator)
                ->withInput();
        }

        TaskModel::create([
            'title' => $data['title'],
            'category' => $data['category'],
            'status' => $data['status'],
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
        $title ="Zadanie nr.".$taskId;
        
        $validator = Validator::make($data, [
            'title' => 'required|regex:/^[a-zA-Z\ąćęłńóśźż\s\.\-]*$/iu|max:50',
            'category' => 'required',
            'status' => 'required',
            'priority' => 'nullable',
            'deadline' => 'nullable',
            'description' => 'nullable|regex:/^[a-zA-Z\ąćęłńóśźż\s\.\-]*$/iu|max:250',
        ]);

        if ($validator->fails()) {
            return redirect('/tasks/create')
                ->with(['title' => $title,])
                ->withErrors($validator)
                ->withInput();
        }

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
        
        return redirect()->route('tasks.list')->with('success', 'Zadanie zostało zaktualizowane.');
    }

    public function destroy(Request $request, int $taskId) 
    {
        $data = $request->all();

        TaskModel::find($taskId)
            ->delete();
    
        return redirect()->route('tasks.list')->with('success', 'Zadanie zostało usunięte.');
    }
}
