@extends('layout.main')
@section('content')

<style>
    .titleBlock {
        font-family: Sans MS, Comic Sans, cursive;
        font-size: 24px;
        padding-left: 1%;
        padding-top: 1%;
        box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);
        background-color: #d1d1f6;
        height: 5%;
        position: relative;
        z-index: 1;
        text-align: left;}

    th {
        font-weight: normal;
        padding: 4px 10px;
        border-style: solid;
        border-width: 1px;}

    .tableBackground {
        padding: 10px;
        height: 80%;
        width: 60%;
        position: relative;
        left: 20%;
        background-color: #d1d1f6;
        box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);
        font-family: Arial, sans-serif;}

    .sortMenu{
        text-align: center;
        height: 3.5%;
        position: absolute; 
        padding-top: 10px;
        width: 14%;
        top: 1%; 
        right: 1%;
        z-index: 2;}

    .pagination{
        text-align: center;
        position:absolute;
        bottom: 0%; 
        right: 45%;
        z-index: 2;}

    .editTask{
        position: relative;
        text-align: center;
        left:35%;
        width: 30%;
        height: 45px;}
</style>

<div class="titleBlock">
    Lista Zadań
</div>

<div class="sortMenu"> 
<label for="sortSelect">Filtry:</label>
    <select id="sortSelect" onchange="window.location.href = this.value;">
        <option value=""></option>
        <option value="{{ route('tasks.list', ['sort_by' => 'id', 'sort_order' => 'asc']) }}">Sortuj rosnąco</option>
        <option value="{{ route('tasks.list', ['sort_by' => 'id', 'sort_order' => 'desc']) }}">Sortuj malejąco </option>
        <option value="{{ route('tasks.list', ['sort_by' => 'title', 'sort_order' => 'asc']) }}">Tytuł a-z</option>
        <option value="{{ route('tasks.list', ['sort_by' => 'title', 'sort_order' => 'desc']) }}">Tytuł z-a</option>
        <option value="{{ route('tasks.list', ['sort_by' => 'title', 'sort_order' => 'desc']) }}">Tytuł z-a</option>
    </select>
</div>
<p> </p>
<div class="tableBackground">
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
    <p>  {{ $tasks->links() }}</p> 
</div>
</div>
@endsection