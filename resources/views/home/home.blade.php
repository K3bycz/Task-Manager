@extends('layout.main')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<div class="row" style="padding-top:10px">
    <div class ="col-md-4">
        <div class="informationBox" style="height:86vh";>
            <div class="row">
                <div class="col-md-10 offset-1" style="margin-top:5px; background-color: #9191e9; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);text-align: center;  font-family: Sans MS, Comic Sans, cursive; font-size: 20px;">
                    Zadania na które masz mniej niż tydzień!
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($lessThan7Days) > 0)
                        {{ $count = 0; }}
                        @foreach($lessThan7Days as $task) 
                            @if($count < 7)
                                <script>
                                    function updateCountdown{{ $task->id }}() {
                                        var deadline = new Date("{{ $task->deadline }}");
                                        var now = new Date();
                                        var timeLeft = deadline - now;

                                        var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                                        var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));

                                        document.getElementById("countdown{{ $task->id }}").innerHTML = days + " dni " + hours + " godzin " + minutes + " minut";}

                                    setInterval(updateCountdown{{ $task->id }}, 1000);
                                    updateCountdown{{ $task->id }}();
                                </script>

                    
                                <table style="border-collapse: collapse; width: 98%; margin-left:1%;">
                                    <tr>
                                        <td style="width: 100%; text-align: center;"><b>{{ $task->title }}</b></td>
                                        <td><b>ID:</b> {{ $task->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pozostały czas: <span id="countdown{{ $task->id }}"></span></td>
                                        <td><a href="{{ route('tasks.show', ['task' => $task->id]) }}">Szczegóły</a></td>
                                    </tr>
                                </table>
                                {{ $count++; }}
                            @endif
                        @endforeach
                    @else
                        <div style="text-align:center;margin-top:10px;">Na szczęście nic Cie nie goni &#128515;</div>
                    @endif 
                </div>
            </div>
        </div>
    </div>
    <div class ="col-md-8">
        <div class="row">
            <div class="col-md-6">
                <div class="informationBox" style="height:40vh">
                    <div class="row">
                        <div class="col-md-10 offset-1" style="margin-top:5px; background-color: #9191e9; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);text-align: center;  font-family: Sans MS, Comic Sans, cursive; font-size: 20px;">
                            Zadania z wysokim priorytetem
                        </div>
                        @if(count($highPriority) > 0)
                            {{ $count = 0; }}
                            @foreach($highPriority as $task) 
                                @if($count < 3)
                                    <table style="border-collapse: collapse; width: 98%; margin-left:1%;">
                                        <tr>
                                            <td style="width: 100%; text-align: center;"><b>{{ $task->title }}</b></td>
                                            <td><b>ID:</b> {{ $task->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kategoria: {{ $task->category }}</td>
                                            <td><a href="{{ route('tasks.show', ['task' => $task->id]) }}">Szczegóły</a></td>
                                        </tr>
                                    </table>
                                    {{ $count++; }}
                                @endif
                            @endforeach
                        @else
                            <div style="text-align:center;margin-top:10px;">Atualnie brak ultra-ważnych rzeczy</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">                
                <div class="informationBox" style="margin-right:15px; height:40vh">
                    <div class="row">
                        <div class="col-md-10 offset-1" style="margin-top:5px; background-color: #9191e9; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);text-align: center;  font-family: Sans MS, Comic Sans, cursive; font-size: 20px;">
                            Zadania po terminie
                        </div>
                        @if(count($afterTheDeadline) > 0)
                            {{ $count = 0; }}
                            @foreach($afterTheDeadline as $task) 
                                @if($count < 3)
                                    <table style="border-collapse: collapse; width: 98%; margin-left:1%;">
                                        <tr>
                                            <td style="width: 100%; text-align: center;"><b>{{ $task->title }}</b></td>
                                            <td><b>ID:</b> {{ $task->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kategoria: {{ $task->category }}</td>
                                            <td><a href="{{ route('tasks.show', ['task' => $task->id]) }}">Szczegóły</a></td>
                                        </tr>
                                    </table>
                                    {{ $count++; }}
                                @endif
                            @endforeach
                        @else
                            <div style="text-align:center;margin-top:10px;">Ze wszystkim jesteś wyrobiony &#128526; </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin:0; margin-right:15px;">
            <div class="informationBox" style="margin-top:10px; height:45vh">    
                <div class="col-md-12"> 
                    <div class="row">       
                        <div class="col-md-4">     
                            <div class="row">
                                <div class="col-10 offset-1">
                                    <div style="text-align: left; font-size: 19;">
                                        Liczba wszystkich zadań:<br>
                                        {{ $tasksCount }}
                                    </div>
                                    <img src="{{ asset('/images/task.png') }}" alt="TaskIcon" style="width: 55px; height: 65px; left: 81%; bottom:95%; position: relative;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="countBox">
                                <div style="text-align: left; font-size: 19;">
                                    Liczba zadań w pracy:<br>
                                    {{ $countJob }}
                                </div>
                                <img src="{{ asset('/images/job.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; left: 80%; bottom:90%; position: relative;">
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="countBox">
                                <div style="text-align: left; font-size: 19;">
                                    Liczba zadań ukończonych:<br>
                                    {{ $countDone }}
                                </div>
                                <img src="{{ asset('/images/checkmark.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; left: 80%; bottom:90%; position: relative;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">  
                        <div class="countBox">
                            <div style="text-align: left; font-size: 19;">
                                Liczba zadań na studia:<br>
                                {{ $countStudy }}
                            </div>
                            <img src="{{ asset('/images/hat.png') }}" alt="TaskIcon" style="width: 70px; height: 70px; left: 80%; bottom:95%; position: relative;">
                        </div>
                    </div>
                    <div class="col-md-4">  
                        <div class="countBox">
                            <div style="text-align: left; font-size: 19;">
                                Liczba zadań w domu:<br>
                                {{ $countHome }}
                            </div>
                            <img src="{{ asset('/images/house.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; left: 80%; bottom:90%; position: relative;">
                        </div>
                    </div>
                    <div class="col-md-4">  
                        <div class="countBox">
                            <div style="text-align: left; font-size: 19;">
                                Liczba zadań związanych z hobby:<br>
                                {{ $countHobby }}
                            </div>
                            <img src="{{ asset('/images/hen.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; left: 80%; bottom:90%; position: relative;">
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </div>
</div>
@endsection