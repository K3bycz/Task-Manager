@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{ asset('css/taskCreate.css') }}">

    @if(!empty($task))
    
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="form">
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="container">
                                <form method="POST">
                                    @csrf
                                    @method('PUT') 
                                    <div class="row">
                                        <div class="col-md-2 id_box">
                                            ID: {{ $task->id }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12" style="margin-top:10px;">
                                            <p>Nazwa zadania<br> <input required type=text name="title" value="{{$task->title}}"></p> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p>Kategoria<br> 
                                                <select name="category" id="select">
                                                    <option value="Praca" @if($task->category === "Praca") selected @endif>Praca</option>
                                                    <option value="Studia" @if($task->category === "Studia") selected @endif>Studia</option>
                                                    <option value="Dom" @if($task->category === "Dom") selected @endif>Dom</option>
                                                    <option value="Hobby" @if($task->category === "Hobby") selected @endif>Hobby</option>
                                                    <option value="Inne"  @if($task->category === "Hobby") selected @endif>Inne</option>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="col-4 offset-1">
                                            <p>Status<br>
                                                <select name="status" id="select" value="{{ $task->status }}">
                                                    <option value="Nowe" @if($task->status === "Nowe") selected @endif>Nowe</option>
                                                    <option value="W trakcie" @if($task->status === "W trakcie") selected @endif>W trakcie</option>
                                                    <option value="Zakończone" @if($task->status === "Zakończone") selected @endif>Zakończone</option>
                                                </select>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p><input type="checkbox" name="deadline" id="deadlineCheckbox" style="width: 20px; height: 20px;" {{ $task->deadline ? 'checked' : '' }}/>Deadline</p>
                                            <p id="deadlineInputContainer" style="display: none"> 
                                                <input type="datetime-local" name="deadline" value="{{ $task->deadline }}">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p><input type="checkbox" name="priority" style="width: 20px; height: 20px;" {{ $task->priority ? 'checked' : '' }}/>Wysoki Priorytet</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Opis zadania <br> <textarea name="description" placeholder="(max. 250 znaków)">{{$task->description}}</textarea></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 order-3" style="text-align:right">
                                            <button type="submit" class="formLink formButton" style="margin-bottom:20px;">Zapisz zmiany</button>
                                        </div>
                                    </form>
                                        <div class="col-4 order-2" style="text-align:center">
                                            <form method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="formLink formButton"  onclick="return confirm ('Czy na pewno chcesz usunąć to zadanie?')">Usuń zadanie</button>
                                            </form> 
                                        </div>
                                        <div class="col-4 order-1" style="text-align:left">
                                            <button class="formLink"><a href="/tasks" class=>&#x2190; Wróc do listy</a></button>
                                        </div>
                                    </div>
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
    @else
    <div class="row" style="margin-top:40px;">
        <div class="col-md-2 offset-5 error">
            Nie udało się załadować szczegółów zadania!
        </div>
    </div>
    @endif

@endsection

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