@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{ asset('css/notesList.css') }}">

<div class="container">
    <div class="row p-4 pb-0 m-1">
        <div class="col-md-7 icon">
            <a href="{{ route('notes.list', ['selectedCategory' => 'all']) }}"><div class="btn dark1btn" style="font-weight:bold">Wszystkie</div></a>
            <a href="{{ route('notes.list', ['selectedCategory' => 'Osobiste']) }}"><div class="btn bluebtn" style="font-weight:bold">Osobiste</div></a>
            <a href="{{ route('notes.list', ['selectedCategory' => 'Biznesowe']) }}"><div class="btn purplebtn" style="font-weight:bold">Biznesowe</div></a>
            <a href="{{ route('notes.list', ['selectedCategory' => 'Edukacyjne']) }}"><div class="btn pinkbtn" style="font-weight:bold">Edukacyjne</div></a>
            <a href="{{ route('notes.list', ['selectedCategory' => 'Projekty']) }}"><div class="btn magentabtn" style="font-weight:bold">Projekty</div></a>
        </div>
        <div class="col-md-3 pagination">
            {{ $notes->onEachSide(1)->links('pagination::bootstrap-4') }}
        </div>
        <div class="col-md-2 btn" style="color: #5d3fd3; text-align:right" data-bs-toggle="modal" data-bs-target="#addNotesModal">
            <i class="bi bi-plus-circle"></i> Dodaj notatke
        </div>
    </div>
    <!-- MODAL -->
    <div class="modal fade" id="addNotesModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true"  style="color:black">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Dodaj notatke</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" style="padding:5px;" action="/notes/create" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="title">Tytuł:</label>
                            <input type="text" name="title" class="form-control mb-3">
                        </div>
                        <div class="col-12">
                            <label for="category">Kategoria notatki:</label><br>
                            <select class="js-example-basic-single" style="width:50%; padding:5px;" name="category" id="categorySelect">
                                <option value="Osobiste">Osobiste</option>
                                <option value="Biznesowe">Biznesowe</option>
                                <option value="Edukacyjne">Edukacyjne</option>
                                <option value="Projekty">Projekty</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="mt-3" for="description">Dodaj opis:</label>
                            <textarea class="form-control rounded shadow" style="max-height:200px;" class="mb-3" name="description" placeholder="(max.100 znaków)" maxlength="100" rows="6"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="mt-3" for="attachments">Załączniki</label>
                            <input type="file" name="attachments" class="mb-3">
                        </div>
                        <div class="col-12 d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-dark">Dodaj notatke</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </div>
    <!-- /MODAL -->
    <div class="row row-cols-5 g-4 mt-0 m-4">
        @foreach ($notes as $note)
            <div class="col">
                <div class="card" style="height:235px">
                    <div class="card-body">
                    <p class="text-muted mb-0 pb-0"> {{ $note->created_at }}</p>
                    <div class="card-title   
                        @if ($note->category === 'Osobiste')
                            blue
                        @elseif ($note->category === 'Biznesowe')
                            purple
                        @elseif ($note->category === 'Edukacyjne')
                            pink
                        @elseif ($note->category === 'Projekty')
                            magenta
                        @endif mb-0">
                        <ul style="list-style: none;">
                            <li> {{ $note->title }} </li>
                        </ul>
                    </div> 
                        <div class="row">
                            @if ($note->attachments != null)
                                @php
                                    $extension = pathinfo($note->attachments, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                                    <div class="col-4">
                                        <img src="{{ Storage::url('attachments/' . $note->attachments) }}" alt="attachments" style="border: solid white 0.5px; width: 100px; height: 100px; margin-top: 5px;">
                                    </div>
                                    <div class="col-8">{{ $note->description }}</div>
                                @elseif (in_array($extension, ['mp3', 'webm', 'wav', 'ogg', 'm4a'])) 
                                    <div class="col-12">
                                        <audio controls style="width: 100%; height: 40px; margin-top: 5px;">
                                            <source src="{{ Storage::url('attachments/' . $note->attachments) }}" type="audio/mpeg">
                                            Twoja przeglądarka nie obsługuje odtwarzacza audio.
                                        </audio>
                                    </div>
                                    <div class="col-12">{{ $note->description }}</div>
                                @endif

                                
                            @else
                                <div class="col-12">{{ $note->description }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@if ($notes->isEmpty())
<div class="row" style="margin-top:40px;">
        <div class="col-md-4 offset-4 p-3" style="text-align:center">
            Brak notatek!
        </div>
    </div>
@endif
<footer class="fixed-bottom">
    <div class="container">
        @if ($errors->has('title'))
            <div class="alert alert-danger col-lg-6 offset-lg-3">
                Wprowadzono błędny tytuł!
            </div>
        @elseif ($errors->has('description'))
            <div class="alert alert-danger col-lg-6 offset-lg-3">
                Wprowadzono błędny opis!
            </div>
        @elseif ($errors->has('attachment'))
            <div class="alert alert-danger col-lg-6 offset-lg-3">
                Załącznik ma zły format!
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-info col-lg-6 offset-lg-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
</footer>

<script>
    $(document).ready(function() {

        $('.imageUpload').on('change', function() {
            const fileInput = this;
            const maxFileSize = 5 * 1024 * 1024; // 5 MB

            if (fileInput.files.length > 0) {
            const fileSize = fileInput.files[0].size;

                if (fileSize > maxFileSize) {
                    alert('Plik jest za duży. Maksymalna wielkość to 5 MB.');
                    $(this).val('');
                }
            }
        });

        $('.js-example-basic-single').select2({
            minimumResultsForSearch: Infinity
        });
    });
</script>
@endsection