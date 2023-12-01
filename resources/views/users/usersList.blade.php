@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{ asset('css/taskList.css') }}">

@if($users->isEmpty())
    <div class="row" style="margin-top:40px;">
        <div class="col-md-2 offset-5 error">
            Nie udało się załadować listy użytkowników!
        </div>
    </div>
@else
    <div class="row" style="margin-top:10px;">
        <div class="col-md-8 offset-2">
            <div class="tableBackground">
                <div class="row">
                    <div class="col-md-12 p-4">
                        <table style="border-collapse: collapse; font-size: 16; width: 100%;">
                            <thead>
                            <tr style="background-color:#bcbcf2">
                                <th style="width: 5%"><b>ID</b></th>
                                <th style="text-align: left"><b>Imię</b></th>
                                <th style="text-align: left"><b>Nazwisko</b></th>
                                <th style="width: 30%"><b>Email</b></th>
                                <th style="width: 15%; padding:5px;"><b>Data utworzenia</b></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                    <th><b>{{ $user->id }}</b></th>
                                    <th style="text-align: left;">{{ $user->firstName }}</th>
                                    <th style="text-align: left">{{ $user->lastName }}</th>
                                    <th>{{ $user->email }}</th>
                                    <th>{{ $user->created_at }}</th>
                                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $users->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <div class="col-md-2">
            <div class="sortMenu"> 
                <label class="form-label" for="sortSelect">Filtry:</label>
                <select class="form-field" id="sortSelect" onchange="window.location.href = this.value;">
                    <option value=""></option>
                    <option value="{{ route('users.list', ['sort_by' => 'id', 'sort_order' => 'asc']) }}">Sortuj rosnąco</option>
                    <option value="{{ route('users.list', ['sort_by' => 'id', 'sort_order' => 'desc']) }}">Sortuj malejąco </option>
                    <option value="{{ route('users.list', ['sort_by' => 'lastName', 'sort_order' => 'asc']) }}">Nazwisko a-z</option>
                    <option value="{{ route('users.list', ['sort_by' => 'lastName', 'sort_order' => 'desc']) }}">Nazwisko z-a</option>
                    <option value="{{ route('users.list', ['sort_by' => 'created_at', 'sort_order' => 'asc']) }}">Data rejestracji rosnąco</option>
                    <option value="{{ route('users.list', ['sort_by' => 'created_at', 'sort_order' => 'desc']) }}">Data rejestracji malejąco</option>
                </select>
            </div>
        </div>
    </div>
@endif
@endsection