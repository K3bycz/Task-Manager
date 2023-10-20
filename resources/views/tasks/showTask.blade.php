@extends('layout.main')
@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/showTask.css') }}">
</head>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deadlineCheckbox = document.getElementById('deadlineCheckbox');
        const deadlineInputContainer = document.getElementById('deadlineInputContainer');

        
        deadlineCheckbox.addEventListener('change', function () {
            if (this.checked) {
                deadlineInputContainer.style.display = 'block';
            } else {
                deadlineInputContainer.style.display = 'none';
                
                const deadlineInput = document.querySelector('input[type="datetime-local"][name="deadline"]');
                deadlineInput.value = '';
            }
        });

        if (deadlineCheckbox.checked) {
            deadlineInputContainer.style.display = 'block';
        } else {
            deadlineInputContainer.style.display = 'none';
        }
    });
</script>

<div class="titleBlock">
    Szczegóły zadania
</div>
    <div class="show">

    @if(!empty($task))
        <form method="POST">
            @csrf
            @method('PUT') 
            
        <div class="form">
            <p><br></p>
            <div class="id_box"> ID: {{ $task->id }}</div><br>

            <div id="title_box">
                Nazwa zadania<br> <input type=text name=title value="{{$task->title}}">
            </div><br>

            <div class="category_box">
                Kategoria <br><select name="category" id="select" value="{{ $task->category }}">
                    <option {{ $task->category === 'Praca' ? 'selected' : '' }}> Praca </option>
                    <option {{ $task->category === 'Studia' ? 'selected' : '' }}> Studia </option>
                    <option {{ $task->category === 'Dom' ? 'selected' : '' }}> Dom </option>
                    <option {{ $task->category === 'Hobby' ? 'selected' : '' }}> Hobby </option>
                    <option {{ $task->category === 'Inne' ? 'selected' : '' }}> Inne </option>
                </select><br>
            </div>

            <div class="status_box">
                Status <br><select name="status" id="select" value="{{ $task->status }}">
                    <option {{ $task->status === 'Nowe' ? 'selected' : '' }}> Nowe </option>
                    <option {{ $task->status === 'W trakcie' ? 'selected' : '' }}> W trakcie </option>
                    <option {{ $task->status === 'Zakończone' ? 'selected' : '' }}> Zakończone </option>
                </select><br>
            </div>

            <div class="create_date_box">Data utworzenia zadania: {{$task->created_at}}</div>

            <div class="deadline">
                <input type="checkbox" name="deadline" id="deadlineCheckbox" {{ $task->deadline ? 'checked' : '' }} style="width: 20px; height: 20px;"/>Deadline
                <p id="deadlineInputContainer" style="display: none"> 
                <input type="datetime-local" name="deadline" value="{{ $task->deadline }}">
                </p>
            </div>

            <p><input type="checkbox" name="priority" {{ $task->priority ? 'checked' : '' }} style="width: 20px; height: 20px;"/>Wysoki Priorytet</p>
            
            <p>Opis zadania <br> <textarea name=description>{{$task->description}}</textarea></p>

           
            <button type="submit" class="editTask">Zapisz zmiany</button> 
            </form>

            <form method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="deleteTask"  onclick="return confirm ('Czy na pewno chcesz usunąć to zadanie?')">Usuń zadanie</button>
            </form> 

            <div class="backToList"><a href="/tasks" >&#x2190; Powrót do listy zadań</a></div>

        </div> 
                                
        
            
    </div>  

@else
    <div class="error">BŁĄD! -- Nie udało się pobrać informacji o zadaniu</div>
@endif
@endsection