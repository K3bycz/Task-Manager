@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{ asset('css/taskCreate.css') }}">

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
                                    <p>Nazwa zadania<br> <input required type=text id="title" name="title"></p> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p>Kategoria<br> 
                                        <select class="js-example-basic-single" style="width:100%" name="category" id="categorySelect">
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
                                        <select class="js-example-basic-single" style="width:100%" name="status" id="statusSelect">
                                            <option value="Nowe">Nowe</option>
                                            <option value="W trakcie">W trakcie</option>
                                            <option value="Zakończone">Zakończone</option>
                                        </select>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 blue">
                                    <p><input type="checkbox" name="deadline" id="deadlineCheckbox" style="width: 20px; height: 20px;"/>Deadline</p>
                                    <p id="deadlineInputContainer" style="display: none"> 
                                        <input type="datetime-local" name="deadline">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 pink">
                                    <p><input type="checkbox" name="priority" style="width: 20px; height: 20px;"/>Wysoki Priorytet</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p>Opis zadania <br> <textarea id="description" name="description" placeholder="(max. 250 znaków)"></textarea></p>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-4">
                                    <button type="submit" class="addButton formLink formButton"  style="margin-bottom:20px;">Dodaj zadanie</button>
                                </div>
                            </div>
                        </form>
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-md-12">
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
    </div>    
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#deadlineCheckbox').change(function() {
            if ($(this).is(':checked')) {
                $('#deadlineInputContainer').css('display', 'block');
            } else {
                $('#deadlineInputContainer').css('display', 'none');
            }
        });

        $('.alertButton').on('click', function() {
            $('.alert').hide();
        });

        $('.js-example-basic-single').select2({
            minimumResultsForSearch: Infinity
        });
    });
</script>