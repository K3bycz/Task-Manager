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
                                            <p>Nazwa zadania<br> <input required type=text id="title" name="title" value="{{$task->title}}"></p> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p>Kategoria<br> 
                                                <select class="js-example-basic-single" style="width:100%" name="category" id="categorySelect" value="{{ $task->category }}">
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
                                                <select class="js-example-basic-single" style="width:100%" name="status" id="statusSelect"> 
                                                    <option value="Nowe" @if($task->status === "Nowe") selected @endif>Nowe</option>
                                                    <option value="W trakcie" @if($task->status === "W trakcie") selected @endif>W trakcie</option>
                                                    <option value="Zakończone" @if($task->status === "Zakończone") selected @endif>Zakończone</option>
                                                </select>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 blue">
                                            <p><input type="checkbox" name="deadline" id="deadlineCheckbox" style="width: 20px; height: 20px;" {{ $task->deadline ? 'checked' : '' }}/>Deadline</p>
                                            <p id="deadlineInputContainer" style="display: none"> 
                                                <input type="datetime-local" name="deadline" value="{{ $task->deadline }}">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 pink">
                                            <p><input type="checkbox" name="priority" style="width: 20px; height: 20px;"  {{ $task->priority ? 'checked' : '' }}/>Wysoki Priorytet</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Opis zadania <br> <textarea id="description" name="description" placeholder="(max. 250 znaków)">{{$task->description}}</textarea></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 order-3" style="text-align:right">
                                            <button type="submit" class="addButton formLink formButton" style="margin-bottom:20px;">Zapisz zmiany</button>
                                        </div>
                                    </form>
                                        <div class="col-4 order-2" style="text-align:center">
                                            <form method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="deleteButton formLink formButton"  onclick="return confirm ('Czy na pewno chcesz usunąć to zadanie?')">Usuń zadanie</button>
                                            </form> 
                                        </div>
                                        <div class="col-4 order-1" style="text-align:left">
                                            <button class="backButton formLink"><a href="/tasks" class=>&#x2190; Wróc do listy</a></button>
                                        </div>
                                    </div>
                                @if ($errors->has('title'))
                                    <div class="alert">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-12 ">
                                                Wprowadzono błędny tytuł!
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <button type="button" class=" alertButton mt-2"> Ok </button>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($errors->has('description'))
                                    <div class="alert">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-12 ">
                                                Wprowadzono błędny opis!
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <button type="button" class=" alertButton mt-2"> Ok </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(session('success')) 
                                    <div class="alert">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-12 ">
                                            {{ session('success') }}
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <button type="button" class=" alertButton mt-2"> Ok </button>
                                            </div>
                                        </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#deadlineCheckbox').change(function() {
            if ($(this).is(':checked')) {
                $('#deadlineInputContainer').css('display', 'block');
            } else {
                $('#deadlineInputContainer').css('display', 'none');
                $('input[type="datetime-local"][name="deadline"]').val('');
            }
        });

        if ($('#deadlineCheckbox').is(':checked')) {
            $('#deadlineInputContainer').css('display', 'block');
        } else {
            $('#deadlineInputContainer').css('display', 'none');
        }

        $('.alertButton').on('click', function() {
            $('.alert').hide();
        });
        
        $('.js-example-basic-single').select2({
            minimumResultsForSearch: Infinity
        });
    });
</script>
