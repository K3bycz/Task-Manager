@extends('layout.main')
<style>
.titleBlock {
        font-family: Sans MS, Comic Sans, cursive;
        font-size: 24px;
        padding-left: 1%;
        padding-top: 1%;
        box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);
        background-color: #d1d1f6;
        height: 5%;
        position: relative;
        z-index: 1;
        text-align: left;}

    th {
        font-weight: normal;
        padding: 4px 10px;
        border-style: solid;
        border-width: 1px;}

    .tableBackground {
        margin-top: 16px;
        padding: 10px;
        height: 80%;
        width: 60%;
        position: relative;
        left: 20%;
        background-color: #d1d1f6;
        box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.5);
        font-family: Arial, sans-serif;}
 
    .list{
        font-family: Arial, sans-serif;
        padding-top: 10px;
        padding-left: 10px;
    }
    
  
</style>

@section('content')

<div class="titleBlock">
    Lista Użytkowników
</div>

<div class="tableBackground">
    <table style="border-collapse: collapse; font-size: 16; width: 100%;">
        <thead>
            <tr style="background-color:#bcbcf2">
                <th style="width: 5%"><b>ID</b></th>
                <th style="text-align: left"><b>Imię</b></th>
                <th style="text-align: left"><b>Nazwisko</b></th>
                <th style="width: 30%"><b>Email</b></th>
                <th style="width: 15%"><b>Data utworzenia</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th><b>{{ $user->id }}</b></th>
                    <th style="text-align: left">{{ $user->firstName }}</th>
                    <th style="text-align: left">{{ $user->lastName }}</th>
                    <th>{{ $user->email }}</th>
                    <th>{{ $user->created_at }}</th>
                </tr>    
            @endforeach
        </tbody>
    </table>
@endsection