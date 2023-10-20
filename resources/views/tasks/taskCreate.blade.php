@extends('layout.main')

<head>
    <link rel="stylesheet" href="{{ asset('css/taskCreate.css') }}">
</head>

@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const priorytetCheckbox = document.getElementById('deadlineCheckbox');
        const deadlineInputContainer = document.getElementById('deadlineInputContainer');

        priorytetCheckbox.addEventListener('change', function () {
            if (this.checked) {
                deadlineInputContainer.style.display = 'block';
            } else {
                deadlineInputContainer.style.display = 'none';}
        });
    });
</script>

    <div class="titleBlock">
        Formularz tworzenia zadania 
    </div>
    <div class="formBackground">

        <div class="form">
        <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
            <p><br></p>
            <p>Nazwa zadania<br> <input type=text name=title></p> 
            
            <p>Kategoria <br> <select name="category" id="select">
                <option value="Praca">Praca</option>
                <option value="Studia">Studia</option>
                <option value="Dom">Dom</option>
                <option value="Hobby">Hobby</option>
                <option value="Inne">Inne</option>
            </select></p>

            <p>Status <br> <select name="status" id="select">
                <option value="Nowe">Nowe</option>
                <option value="W trakcie">W trakcie</option>
                <option value="Zakończone">Zakończone</option>
            </select></p>

            <p><input type="checkbox" name="deadline" id="deadlineCheckbox" style="width: 20px; height: 20px;"/>Deadline</p>
                <p id="deadlineInputContainer" style="display: none"> 
                    <input type="datetime-local" name="deadline">
                </p>

            <p><input type="checkbox" name="priority" style="width: 20px; height: 20px;"/>Wysoki Priorytet</p>
            
            <p>Opis zadania <br> <textarea name=description></textarea></p>

            <button type="submit">Dodaj zadanie</button>
            <p> </p>

        </div>
            @if(session('success'))
                <div class="alert">
                    <br>{{ session('success') }}
                </div>
            @endif
    </div>

@endsection