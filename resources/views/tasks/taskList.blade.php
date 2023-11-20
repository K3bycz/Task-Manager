@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{ asset('css/taskList.css') }}">

@if($tasks->isEmpty())
    <div class="row" style="margin-top:40px;">
        <div class="col-md-2 offset-5 error p-3">
            Nie udało się załadować żadych zadań!
        </div>
    </div>
@else
    <div class="row" style="margin-top:10px;">
        <div class="col-md-8 offset-2">
            <div class="tableBackground">
                <div class="row">
                    <div class="col-md-12 p-4">
                        <table style="border-collapse: collapse; font-size: 16; width: 100%;">
                            <thead>
                                <tr style="background-color:#bcbcf2">
                                    <th style="width: 5%"><b>ID</b></th>
                                    <th style="text-align: left"><b>Tytuł</b></th>
                                    <th style="width: 10%"><b>Kategoria</b></th>
                                    <th style="width: 10%"><b>Status</b></th>
                                    <th style="width: 10%"><b>Opcje</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <th><b>{{ $task->id }}</b></th>
                                        <th style="text-align: left">{{ $task->title }}</th>
                                        <th>{{ $task->category }}</th>
                                        <th>{{ $task->status }}</th>
                                        <th>
                                            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">Szczegóły</a>
                                        </th>
                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $tasks->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <div class="col-md-2">
            <div class="sortMenu"> 
                <label class="form-label" for="sortSelect">Filtry:</label>
                <select class="form-field" id="sortSelect" onchange="window.location.href = this.value;">
                    <option value=""></option>
                    <option value="{{ route('tasks.list', ['sort_by' => 'id', 'sort_order' => 'asc']) }}">Sortuj rosnąco</option>
                    <option value="{{ route('tasks.list', ['sort_by' => 'id', 'sort_order' => 'desc']) }}">Sortuj malejąco </option>
                    <option value="{{ route('tasks.list', ['sort_by' => 'title', 'sort_order' => 'asc']) }}">Tytuł a-z</option>
                    <option value="{{ route('tasks.list', ['sort_by' => 'title', 'sort_order' => 'desc']) }}">Tytuł z-a</option>
                </select>
            </div>
        </div>
    </div>
@endif
  
@endsection