@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{ asset('css/ranking.css') }}">

@if($users->isEmpty())
    <div class="row" style="margin-top:40px;">
        <div class="col-md-2 offset-5 error">
            Nie udało się załadować listy użytkowników!
        </div>
    </div>
@else
    <div class="row m-2">
        <!-- ZADANIA -->
        <div class="col-12 col-md-6 mt-3 rankingBox">
            <div style="border-bottom: white 1px solid;"><p><h3 class="text-center justify-content-center">Ukończone zadania</h3></p></div>
            <div class="container">
                <div class="justify-content-center text-center d-flex">
                    @if(!isset($tasksRank[1]) || empty($tasksRank[1]))
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="silver" style="position: relative; padding-top: 20px; margin-bottom:30px;">
                                <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid silver 4px"></div>
                                <p class="m-0 p-0">Brak danych o użytkowniku
                            </div>
                        </div>
                    @else
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="silver" style="padding-top:20px;">
                                @if ($tasksRank[1]->avatar != null)
                                    <div class="avatar mb-2"><img src="data:image/jpeg;base64, {{ base64_encode($tasksRank[1]->avatar) }}"  alt="User"  style="width:130px; height:130px; border-radius:50%; border: solid silver 4px"></div>
                                @else
                                    <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid silver 4px"></div>
                                @endif
                                <p class="m-0 p-0">{{ $tasksRank[1]->firstName }} {{ $tasksRank[1]->lastName }}</p>
                                <p class="m-0 p-0" style="font-size:17px"><img src="{{ asset('/images/silver-medal.png') }}" style="width:30px; height:30px;"> {{ $tasksRank[1]->tasks }} <i class="bi bi-trophy-fill"></i></p>
                            </div>
                        </div>
                    @endif
                    
                    @if(!isset($tasksRank[0]) || empty($tasksRank[0]))
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="gold" style="position: relative; padding-top: 20px; margin-bottom:30px;">
                                <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid gold 4px"></div>
                                <p class="m-0 p-0">Brak danych o użytkowniku
                            </div>
                        </div>
                    @else
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="gold">
                                @if ($tasksRank[0]->avatar != null)
                                    <div class="avatar mb-2"><img src="data:image/jpeg;base64, {{ base64_encode($tasksRank[0]->avatar) }}"  alt="User"  style="width:130px; height:130px; border-radius:50%; border: solid gold 4px"></div>
                                @else
                                    <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid gold 4px"></div>
                                @endif
                                <p class="m-0 p-0">{{ $tasksRank[0]->firstName }} {{ $tasksRank[0]->lastName }}</p>
                                <p class="m-0 p-0" style="font-size:17px"><img src="{{ asset('/images/gold-medal.png') }}" style="width:30px; height:30px;"> {{ $tasksRank[0]->tasks }} <i class="bi bi-trophy-fill"></i></p>
                            </div>
                        </div>
                    @endif

                    @if(!isset($tasksRank[2]) || empty($tasksRank[2]))
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="bronze" style="position: relative; padding-top: 20px; margin-bottom:30px;">
                                <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid #d2855e 4px"></div>
                                <p class="m-0 p-0">Brak danych o użytkowniku
                            </div>
                        </div>
                    @else
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="bronze" style="position: relative; padding-top: 20px; margin-bottom:30px;">
                                @if ($tasksRank[2]->avatar != null)
                                    <div class="avatar mb-2"><img src="data:image/jpeg;base64, {{ base64_encode($tasksRank[2]->avatar) }}"  alt="User"  style="width:130px; height:130px; border-radius:50%; border: solid #d2855e 4px"></div>
                                @else
                                    <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid #d2855e 4px"></div>
                                @endif
                                <p class="m-0 p-0">{{ $tasksRank[2]->firstName }} {{ $tasksRank[2]->lastName }}</p>
                                <p class="m-0 p-0" style="font-size:17px"><img src="{{ asset('/images/bronze-medal.png') }}" style="width:30px; height:30px;"> {{ $tasksRank[2]->tasks }} <i class="bi bi-trophy-fill"></i></p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row g-2 justify-content-center mb-3">
                    @if(isset($tasksRank[3]))
                        @php $i=4 @endphp
                        @foreach ($tasksRank as $user)
                            @if ($loop->index >= 3)
                                <div class="col-7" style=" background-color: #3b4e6b !important; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5) !important; padding:5px; border-radius:10px;">
                                    <div class="row">
                                        <div class="col-2"> {{ $i++ }}. </div>
                                        <div class="col-8">  
                                            @if ($user->avatar != null)
                                                <img src="data:image/jpeg;base64, {{ base64_encode($user->avatar) }}"  alt="User"  style="width:20px; height:20px; border-radius:50%; margin-right:5px;">
                                            @else
                                            <img src="{{ asset('/images/user.png') }}" style="width:20px; height:20px; border-radius:50%; margin-right:5px;">
                                            @endif
                                            {{ $user->firstName }} {{ $user->lastName }}
                                        </div>
                                        <div class="col-2 text-end" style="font-size:17px">{{ $user->tasks }} <i class="bi bi-trophy-fill"></i></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- NOTATKI -->
        <div class="col-12 col-md-6 mt-3 rankingBox">
            <div style="border-bottom: white 1px solid;"><p><h3 class="text-center justify-content-center">Zrobione notatki</h3></p></div>
            <div class="container">
                <div class="justify-content-center text-center d-flex">
                    @if(!isset($notesRank[1]) || empty($notesRank[1]))
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="silver" style="position: relative; padding-top: 20px; margin-bottom:30px;">
                                <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid silver 4px"></div>
                                <p class="m-0 p-0">Brak danych o użytkowniku
                            </div>
                        </div>
                    @else
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="silver" style="padding-top:20px;">
                                @if ($notesRank[1]->avatar != null)
                                    <div class="avatar mb-2"><img src="data:image/jpeg;base64, {{ base64_encode($notesRank[1]->avatar) }}"  alt="User"  style="width:130px; height:130px; border-radius:50%; border: solid silver 4px"></div>
                                @else
                                    <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid silver 4px"></div>
                                @endif
                                <p class="m-0 p-0">{{ $notesRank[1]->firstName }} {{ $notesRank[1]->lastName }}</p>
                                <p class="m-0 p-0" style="font-size:17px"><img src="{{ asset('/images/silver-medal.png') }}" style="width:30px; height:30px;"> {{ $notesRank[1]->notes_count }} <i class="bi bi-trophy-fill"></i></p>
                            </div>
                        </div>
                    @endif
                    
                    @if(!isset($notesRank[0]) || empty($notesRank[0]))
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="gold" style="position: relative; padding-top: 20px; margin-bottom:30px;">
                                <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid gold 4px"></div>
                                <p class="m-0 p-0">Brak danych o użytkowniku
                            </div>
                        </div>
                    @else
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="gold">
                                @if ($notesRank[0]->avatar != null)
                                    <div class="avatar mb-2"><img src="data:image/jpeg;base64, {{ base64_encode($notesRank[0]->avatar) }}"  alt="User"  style="width:130px; height:130px; border-radius:50%; border: solid gold 4px"></div>
                                @else
                                    <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid gold 4px"></div>
                                @endif
                                <p class="m-0 p-0">{{ $notesRank[0]->firstName }} {{ $notesRank[0]->lastName }}</p>
                                <p class="m-0 p-0" style="font-size:17px"><img src="{{ asset('/images/gold-medal.png') }}" style="width:30px; height:30px;"> {{ $notesRank[0]->notes_count }} <i class="bi bi-trophy-fill"></i></p>
                            </div>
                        </div>
                    @endif

                    @if(!isset($notesRank[2]) || empty($notesRank[2]))
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="bronze" style="position: relative; padding-top: 20px; margin-bottom:30px;">
                                <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid #d2855e 4px"></div>
                                <p class="m-0 p-0">Brak danych o użytkowniku
                            </div>
                        </div>
                    @else
                        <div class="topuser text-center justify-content-center pb-2 p-5">
                            <div class="bronze" style="position: relative; padding-top: 20px; margin-bottom:30px;">
                                @if ($notesRank[2]->avatar != null)
                                    <div class="avatar mb-2"><img src="data:image/jpeg;base64, {{ base64_encode($notesRank[2]->avatar) }}"  alt="User"  style="width:130px; height:130px; border-radius:50%; border: solid #d2855e 4px"></div>
                                @else
                                    <div class="avatar mb-2"><img src="{{ asset('/images/user.png') }}" style="width:130px; height:130px; border-radius:50%; border: solid #d2855e 4px"></div>
                                @endif
                                <p class="m-0 p-0">{{ $notesRank[2]->firstName }} {{ $notesRank[2]->lastName }}</p>
                                <p class="m-0 p-0" style="font-size:17px"><img src="{{ asset('/images/bronze-medal.png') }}" style="width:30px; height:30px;"> {{ $notesRank[2]->notes_count }} <i class="bi bi-trophy-fill"></i></p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row g-2 justify-content-center mb-3">
                    @if(isset($notesRank[3]))
                        @php $i=4 @endphp
                        @foreach ($notesRank as $user)
                            @if ($loop->index >= 3)
                                <div class="col-7" style=" background-color: #3b4e6b !important; box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5) !important; padding:5px; border-radius:10px;">
                                    <div class="row">
                                        <div class="col-2"> {{ $i++ }}. </div>
                                        <div class="col-8">  
                                            @if ($user->avatar != null)
                                                <img src="data:image/jpeg;base64, {{ base64_encode($user->avatar) }}"  alt="User"  style="width:20px; height:20px; border-radius:50%; margin-right:5px;">
                                            @else
                                                <img src="{{ asset('/images/user.png') }}" style="width:20px; height:20px; border-radius:50%; margin-right:5px;">
                                            @endif
                                            {{ $user->firstName }} {{ $user->lastName }}
                                        </div>
                                        <div class="col-2 text-end" style="font-size:17px">{{ $user->notes_count }} <i class="bi bi-trophy-fill"></i></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>
@endif  

@endsection