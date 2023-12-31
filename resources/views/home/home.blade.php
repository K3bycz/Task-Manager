@extends('layout.main')
@section('content')

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<div class="container">
    <div class="row" style="padding-top:10px">
        
        <div class ="col-md-4">
            <div class="clock mb-4">
                <div class="row">
                    <div class="col-md-12">
                        <span id="date" style="font-size:52px;"></span>
                    </div>
                    <div class="col-md-5">
                        <span id="clock" style="font-size:52px;"></span>
                    </div>
                    <div class="col-md-7 justify-content-end text-end" style="padding-top:40px">
                        <span id="weather">
                        </span>
                    </div>
                </div>
            </div>
            <div class="informationBox" style="height:69vh">
                <div class="row">
                    <div class="col-md-10 offset-1" style="margin-top:5px; background-color: #1b2431; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);text-align: center; font-size: 20px;">
                        Zadania na które masz mniej niż tydzień!
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if(count($lessThan7Days) > 0)
                            @php 
                                $count = 0; 
                                $colors = ['pink', '', 'blue'];
                                $index = 0;
                            @endphp
                            @foreach($lessThan7Days as $task) 
                                @if($count < 8)
                                    <table style="width:96%; margin:10px 10px 0px 10px">
                                        <tr>
                                            <td style="width: 100%; text-align: center;"><b>{{ $task->title }}</b></td>
                                            <td><b>ID:</b> {{ $task->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pozostały czas: <span class="countdown{{ $task->id }}"></span></td>
                                            <td class="{{ $colors[$index % count($colors)] }}"><a href="{{ route('tasks.show', ['task' => $task->id]) }}">Szczegóły</a></td>
                                        </tr>
                                    </table>
                                    @php 
                                        $count++;
                                        $index++
                                    @endphp
                                @endif
                            @endforeach
                            @if($count == 8 && count($lessThan7Days) > 8)
                                <div class="col-md-12" style="text-align: left; margin-top:10px; font-size:12px; margin-left:10px;">Dodatkowo {{ count($lessThan7Days) - $count }} zadań nie wyświetlono</div>
                            @endif
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
                    <div class="informationBox" style="height:51vh">
                        <div class="row">
                            <div class="col-md-10 offset-1" style="margin-top:5px; background-color: #1b2431; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);text-align: center; font-size: 20px;">
                                Zadania z wysokim priorytetem
                            </div>
                            @if(count($highPriority) > 0)
                                @php 
                                    $count = 0; 
                                    $colors = ['blue', 'pink', ''];
                                    $index = 0;
                                @endphp
                                @foreach($highPriority as $task) 
                                    @if($count < 6)
                                        <table style="width:93%; margin:10px 20px 0px 20px">
                                            <tr>
                                                <td style="width: 100%; text-align: center;"><b>{{ $task->title }}</b></td>
                                                <td><b>ID:</b> {{ $task->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kategoria: {{ $task->category }}</td>
                                                <td class="{{ $colors[$index % count($colors)] }}"><a href="{{ route('tasks.show', ['task' => $task->id]) }}">Szczegóły</a></td>
                                            </tr>
                                        </table>
                                        @php 
                                            $count++;
                                            $index++
                                        @endphp
                                    @endif
                                @endforeach
                                @if($count == 6 && count($highPriority) > 6)
                                    <div class="col-md-12" style="text-align: left; margin-top:10px; font-size:12px; margin-left:10px;">Dodatkowo {{ count($highPriority) - $count }} zadań nie wyświetlono</div>
                                @endif
                            @else
                                <div style="text-align:center;margin-top:10px;">Atualnie brak ultra-ważnych rzeczy</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">                
                    <div class="informationBox" style="margin-right:15px; height:51vh">
                        <div class="row">
                            <div class="col-md-10 offset-1" style="margin-top:5px; background-color: #1b2431; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);text-align: center; font-size: 20px;">
                                Zadania po terminie
                            </div>
                            @if(count($afterTheDeadline) > 0)
                                @php 
                                    $count = 0; 
                                    $colors = ['', 'pink', 'blue'];
                                    $index = 0;
                                @endphp
                                @foreach($afterTheDeadline as $task) 
                                    @if($count < 6)
                                        <table style="width:93%; margin:10px 20px 0px 20px">
                                            <tr>
                                                <td style="width: 100%; text-align: center;"><b>{{ $task->title }}</b></td>
                                                <td><b>ID:</b> {{ $task->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kategoria: {{ $task->category }}</td>
                                                <td class="{{ $colors[$index % count($colors)] }}"><a href="{{ route('tasks.show', ['task' => $task->id]) }}">Szczegóły</a></td>
                                            </tr>
                                        </table>
                                        @php 
                                            $count++;
                                            $index++
                                        @endphp
                                    @endif 
                                @endforeach
                                @if($count == 6 && count($afterTheDeadline) > 6)
                                    <div class="col-md-12" style="text-align: left; margin-top:10px; font-size:12px; margin-left:10px;">Dodatkowo {{ count($afterTheDeadline) - $count }} zadań nie wyświetlono</div>
                                @endif
                            @else
                                <div style="text-align:center;margin-top:10px;">Ze wszystkim jesteś wyrobiony &#128526; </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin:0; margin-right:15px;">
                <div class="summaryBox" style="height:38vh"> 
                    <div class="container-fluid pt-3">   
                        <div class="row" style="margin-top:10px; height:22vh">   
                            <div class="col-md-4">     
                                <div class="row" style="background-color:#3b4e6b; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5); margin-right:5px; margin-left:5px;">
                                    <div class="col-10 offset-1" style="margin-top:5px; background-color: #1b2431; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);">
                                        <div style="text-align: center; font-size: 19;">
                                            Liczba wszystkich zadań: 
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="background-color:#3b4e6b; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5); padding-bottom:25px; margin-right:5px; margin-left:5px;">
                                    <div class="col-1 offset-2" style="font-size:32px; margin-top:25px;">
                                        {{ $tasksCount }}
                                    </div>
                                    <div class="col-2 offset-6">
                                        <img src="{{ asset('/images/task.png') }}" alt="TaskIcon" style="width: 55px; height: 65px; margin-top:15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">     
                                <div class="row" style="background-color:#3b4e6b; margin-right:5px; margin-left:5px; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5)">
                                    <div class="col-10 offset-1" style="margin-top:5px; background-color: #1b2431; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);">
                                        <div style="text-align: center; font-size: 19;">
                                            Liczba zadań w pracy: 
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="background-color:#3b4e6b; margin-right:5px; margin-left:5px; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5); padding-bottom:30px;">
                                    <div class="col-1 offset-2" style="font-size:32px; margin-top:25px;">
                                        {{ $countJob }}
                                    </div>
                                    <div class="col-2 offset-6">
                                        <img src="{{ asset('/images/job.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; margin-top:15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">     
                                <div class="row" style="margin-right:5px; margin-left:5px; background-color:#3b4e6b; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5)">
                                    <div class="col-10 offset-1" style="margin-top:5px; background-color: #1b2431; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);">
                                        <div style="text-align: center; font-size: 19;">
                                            Liczba zadań ukończonych: 
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-right:5px; margin-left:5px; background-color:#3b4e6b; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5); padding-bottom:30px;">
                                    <div class="col-1 offset-2" style="font-size:32px; margin-top:25px;">
                                        {{ $countDone }}
                                    </div>
                                    <div class="col-2 offset-6">
                                        <img src="{{ asset('/images/checkmark.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; margin-top:15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">     
                                <div class="row" style="background-color:#3b4e6b; margin-right:5px; margin-left:5px; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5)">
                                    <div class="col-10 offset-1" style="margin-top:5px; background-color: #1b2431; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);">
                                        <div style="text-align: center; font-size: 19;">
                                            Liczba zadań na studia: 
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="background-color:#3b4e6b; margin-right:5px; margin-left:5px; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5); padding-bottom:20px;">
                                    <div class="col-1 offset-2" style="font-size:32px; margin-top:25px;">
                                        {{ $countStudy }}
                                    </div>
                                    <div class="col-2 offset-6">
                                        <img src="{{ asset('/images/hat.png') }}" alt="TaskIcon" style="width: 70px; height: 70px; margin-top:15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">     
                                <div class="row" style="background-color:#3b4e6b; margin-right:5px; margin-left:5px; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5)">
                                    <div class="col-10 offset-1" style="margin-top:5px; background-color: #1b2431; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);">
                                        <div style="text-align: center; font-size: 19;">
                                            Liczba zadań w domu: 
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="background-color:#3b4e6b; margin-right:5px; margin-left:5px; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5); padding-bottom:30px;">
                                    <div class="col-1 offset-2" style="font-size:32px; margin-top:25px;">
                                        {{ $countHome }}
                                    </div>
                                    <div class="col-2 offset-6">
                                        <img src="{{ asset('/images/house.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; margin-top:15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">     
                                <div class="row" style="background-color:#3b4e6b; margin-right:5px; margin-left:5px; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5)">
                                    <div class="col-10 offset-1" style="margin-top:5px; background-color: #1b2431; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);">
                                        <div style="text-align: center; font-size: 19;">
                                            Zadania w hobby:
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="background-color:#3b4e6b; margin-right:5px; margin-left:5px; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5); padding-bottom:30px;">
                                    <div class="col-1 offset-2" style="font-size:32px; margin-top:25px;">
                                        {{ $countHobby }}
                                    </div>
                                    <div class="col-2 offset-6">
                                        <img src="{{ asset('/images/hen.png') }}" alt="TaskIcon" style="width: 60px; height: 60px; margin-top:15px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/clock.js') }}"></script>

<script>
    $(document).ready(function() {
        function updateCountdown() {
            @foreach($lessThan7Days as $task)
                var deadline{{ $task->id }} = new Date("{{ $task->deadline }}");
                var now{{ $task->id }} = new Date();
                var timeLeft{{ $task->id }} = deadline{{ $task->id }} - now{{ $task->id }};

                var days{{ $task->id }} = Math.floor(timeLeft{{ $task->id }} / (1000 * 60 * 60 * 24));
                var hours{{ $task->id }} = Math.floor((timeLeft{{ $task->id }} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes{{ $task->id }} = Math.floor((timeLeft{{ $task->id }} % (1000 * 60 * 60)) / (1000 * 60));

                $(".countdown{{ $task->id }}").html(days{{ $task->id }} + " dni " + hours{{ $task->id }} + " godzin " + minutes{{ $task->id }} + " minut");
            @endforeach
        }

        setInterval(updateCountdown, 1000);
        updateCountdown();

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(sendLocationToServer);
        } else {
            console.log("Geolokacja nie jest wspierana przez twoją przeglądarkę!");
        }

        function sendLocationToServer(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            $.ajax({
            type: 'GET',
            url: '/getWeather/' + latitude + '/' + longitude,
            data: {
                _token: '{{ csrf_token() }}'
            },
                success: function(response) {
                    $('#weather').html(
                        '<p class="p-0 m-0">' + response.name + '</p>' +
                        '<p class="p-0 m-0">' + response.weather[0].description + ', ' + ((response.main.temp - 273.15).toFixed(1)) + '°C</p>'
                    );
                },
                error: function(error) {
                    console.error('Wystąpił błąd:', error);
                }
            });
        }
    });
</script>


@endsection