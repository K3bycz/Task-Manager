@extends('layout.main')
@section('content')

<link rel="stylesheet" href="{{ asset('css/notesList.css') }}">

<div class="container">
    <div class="row p-4 pb-0 m-1">
        <div class="col-md-8">
             <div class="btn dark1btn" style="font-weight:bold">Wszystkie</div>
             <div class="btn bluebtn" style="font-weight:bold">Osobiste</div>
             <div class="btn purplebtn" style="font-weight:bold">Biznesowe</div>
             <div class="btn pinkbtn" style="font-weight:bold">Edukacyjne</div>
             <div class="btn magentabtn" style="font-weight:bold">Projekty</div>
        </div>
        <div class="col-md-2">
            PAGINACJA
        </div>
        <div class="col-md-2 btn" style="color: #5d3fd3; text-align:right" data-bs-toggle="modal" data-bs-target="#addNotesModal">
            <i class="bi bi-plus-circle"></i> Dodaj notatke
        </div>
    </div>
    <div class="row row-cols-5 g-4 mt-0 m-4">
        
        <div class="col">
            <div class="card" style="height:240px">
                <div class="card-body">
                <p class="text-muted"> time </p>
                <div class="card-title"><ul><li> UHUHUHU </li></ul></div> <!-- max170 -->
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut quos ipsam libero nam voluptates amet ad ipsum provident. Doloremque, quisquam necessitatibus?
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection