@extends('layout.main')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<div class="titleBlock">
    Pulpit
</div>

<div class="lessThan7Days">

<div class="titleBox1">
   Zadania na które masz mniej niż tydzień!
</div>

    @if(count($lessThan7Days) > 0)
        @php $count = 0; @endphp
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
                    <br>
                    @php $count++; @endphp
                @endif
            @endforeach

    @else
        <div style="text-align:center;margin-top:10px;">Na szczęście nic Cie nie goni &#128515;</div>
    @endif

</div>

<div class="highPriorityTasks">
<div class="titleBox2">
   Zadania z wysokim priorytetem
</div>

    @if(count($highPriority) > 0)
        @php $count = 0; @endphp
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
                        </table><br>
                    @php $count++; @endphp
                @endif
            @endforeach
    @else
        <div style="text-align:center;margin-top:10px;">Atualnie brak ultra-ważnych rzeczy</div>
    @endif
</div>

<div class="afterTheDeadline">
<div class="titleBox3">
    Zadania po terminie
</div>
@if(count($afterTheDeadline) > 0)
        @php $count = 0; @endphp
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
                        </table><br>
                    @php $count++; @endphp
                @endif
            @endforeach
    @else
        <div style="text-align:center;margin-top:10px;">Ze wszystkim jesteś wyrobiony &#128526; </div>
    @endif
</div>

<div class="summary">
    <div class="countBox">
        <div style="text-align: left; font-size: 19;">
            Liczba wszystkich zadań:<br>
            {{ $tasksCount }}
        </div>
        <img src="{{ asset('/images/task.png') }}" alt="TaskIcon" style="width: 55px; height: 65px; left: 81%; bottom:95%; position: relative;">
    </div>
    <div class="countBox">
        <div style="text-align: left; font-size: 19;">
            Liczba zadań w pracy:<br>
            {{ $countJob }}
        </div>
        <img src="{{ asset('/images/job.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; left: 80%; bottom:90%; position: relative;">
    </div>
    <div class="countBox">
        <div style="text-align: left; font-size: 19;">
            Liczba zadań ukończonych:<br>
            {{ $countDone }}
        </div>
        <img src="{{ asset('/images/checkmark.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; left: 80%; bottom:90%; position: relative;">
    </div>
    <div class="countBox">
        <div style="text-align: left; font-size: 19;">
            Liczba zadań na studia:<br>
            {{ $countStudy }}
        </div>
        <img src="{{ asset('/images/hat.png') }}" alt="TaskIcon" style="width: 70px; height: 70px; left: 80%; bottom:95%; position: relative;">
    </div>
    <div class="countBox">
        <div style="text-align: left; font-size: 19;">
            Liczba zadań w domu:<br>
            {{ $countHome }}
        </div>
        <img src="{{ asset('/images/house.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; left: 80%; bottom:90%; position: relative;">
    </div>
    <div class="countBox">
        <div style="text-align: left; font-size: 19;">
            Liczba zadań związanych z hobby:<br>
            {{ $countHobby }}
        </div>
        <img src="{{ asset('/images/hen.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; left: 80%; bottom:90%; position: relative;">
    </div>
</div>



</div>
@endsection