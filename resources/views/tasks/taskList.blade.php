@extends('layout.main')
@section('content')

<style>
    th {
        font-weight: normal;
        padding: 4px 10px;
        border-style: solid;
        border-width: 1px;
    }

    .tableBackground {
        margin-top:20px;
        background-color: #d1d1f6;
        box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);
        font-family: Arial, sans-serif;
    }

    .sortMenu{
        text-align: center;
        padding-top: 10px;
        z-index: 2;
    }

    .error{
        display: grid;
        place-items: center;
        background-color: #d1d1f6;
        box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);
        border-radius:5px;
        height:50px;
        font-size:18px;
    }

    .pagination{
        margin-top:10px;
    }

    .pagination li {
        padding-left: 10px;
        background-color: #d1d1f6;
    }
    .pagination .page-item.active .page-link{
        background-color:#5d3fd3;
        border-color:#5d3fd3;
    }
    .pagination a::before{
        background:none;
        transition:none;
    }
    .page-item.disabled .page-link
    {
        background-color:#bcbcf2;
        border-color:#bcbcf2;
    }
    .page-link{
        border-color:#5d3fd3;
    }
</style>

@if($tasks->isEmpty())
    <div class="row" style="margin-top:40px;">
        <div class="col-md-2 offset-5 error">
            Nie udało się załadować żadych zadań!
        </div>
    </div>
@else
    <div class="row" style="margin-top:15px">
        <div class="col-md-2 offset-5">
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
    <div class="row">
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
    </div>
@endif
  
@endsection