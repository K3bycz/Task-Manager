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
<div class="row">
    <div class="col-md-6 offset-3">
        <div class="form">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="container">
                        <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                            <div class="row">
                                <div class="col-12" style="margin-top:10px;">
                                    <p>Nazwa zadania<br> <input required type=text name="title"></p> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p>Kategoria<br> 
                                        <select name="category" id="select">
                                            <option value="Praca">Praca</option>
                                            <option value="Studia">Studia</option>
                                            <option value="Dom">Dom</option>
                                            <option value="Hobby">Hobby</option>
                                            <option value="Inne">Inne</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="col-4 offset-1">
                                    <p>Status<br>
                                        <select name="status" id="select">
                                            <option value="Nowe">Nowe</option>
                                            <option value="W trakcie">W trakcie</option>
                                            <option value="Zakończone">Zakończone</option>
                                        </select>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p><input type="checkbox" name="deadline" id="deadlineCheckbox" style="width: 20px; height: 20px;"/>Deadline</p>
                                    <p id="deadlineInputContainer" style="display: none"> 
                                        <input type="datetime-local" name="deadline">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p><input type="checkbox" name="priority" style="width: 20px; height: 20px;"/>Wysoki Priorytet</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p>Opis zadania <br> <textarea name="description" placeholder="(max. 250 znaków)"></textarea></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit addTaskButton" style="margin-bottom:20px;">Dodaj zadanie</button>
                                </div>
                            </div>
                        </form> 
                        @if ($errors->has('title'))
                        <div class="alert">
                            Wprowadzono błędny tytuł!
                        </div>
                        @elseif ($errors->has('description'))
                        <div class="alert">
                            Wprowadzono błędny opis!
                        </div>
                        @endif
                        @if(session('success'))
                            <div class="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div> 
       </div>
    </div>    
</div>
@endsection