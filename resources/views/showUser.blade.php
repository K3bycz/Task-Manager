@extends('layout.main')

<style>
    .userInfo{
        text-align: center;
        right:14%;
        position: relative;
        width:113%;
        padding-left: 10px;
        padding-top: 10px;
    }
</style>

<script>
document.getElementById('imageUpload').addEventListener('change', function () {
  const fileInput = this;
  const maxFileSize = 5 * 1024 * 1024; // 5 MB

  if (fileInput.files.length > 0) {
    const fileSize = fileInput.files[0].size;

    if (fileSize > maxFileSize) {
      alert('Plik jest za duży. Maksymalna wielkość to 5 MB.');
      fileInput.value = ''; // Wyczyszczenie pola pliku
    }
  }
});
</script>

@section('content')
    <div class="container">

        <div class="userInfo">
            <hr>
            <h1> {{ Auth::user()->firstName }} {{ Auth::user()->lastName }} </h1>

            @if ($avatar != null)
                <img src="data:image/jpeg;base64,{{ base64_encode($avatar) }}" alt="Avatar" style="border-radius:100px;width:150px;height:150px;position: relative; margin-top:10px; margin-bottom:25px;">
            @else
                <img src="{{ asset('/images/user.png') }}" alt="User" style="border-radius:100px; width:150px;height:150px;position: relative; margin-top:10px; margin-bottom:25px;">
            @endif

            <p><b>ID użytkownika = {{ Auth::id() }}</b>
            <hr>

            <p>Ustaw nowe zdjęcie profilowe:</p>
            <form method="POST" style="padding:5px;" action="{{ route('file.upload') }}" enctype="multipart/form-data">
                @csrf
                <input type="file" id="imageUpload" style="position:relative; left:1.5%" name="avatar"> <br>
                <button type="submit" style="padding:5px; margin-top:10px; background-color:#9191e9; border-radius:10px;">Prześlij zdjęcie</button>
            </form>    
            <hr>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Wyloguj się
                </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>

            </div>    
        </div> 
        <div class="row">
        <div class="col-md-6">
            <p>To jest kolumna 1.</p>
        </div>
        <div class="col-md-6">
            <p>To jest kolumna 2.</p>
        </div>
    </div>
    </div>
    
    


@endsection    

