@extends('layout.main')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="container text-center">
                <div class="user-background">
                    <hr><h1>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h1>
                    @if ($avatar != null)
                        <img src="data:image/jpeg;base64,{{ base64_encode($avatar) }}" alt="Avatar"
                            style="border-radius: 100px; width: 150px; height: 150px; margin-top: 10px; margin-bottom: 25px;">
                    @else
                        <img src="{{ asset('/images/user.png') }}" alt="User"
                            style="border-radius: 100px; width: 150px; height: 150px; margin-top: 10px; margin-bottom: 25px;">
                    @endif
                    <p><b>ID użytkownika = {{ Auth::id() }}</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container text-center">
                <hr>
                <p>Ustaw nowe zdjęcie profilowe:</p>
                <form method="POST" style="padding:5px;" action="{{ route('file.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="imageUpload" style="position:relative; left:1.5%" name="avatar"> <br>
                    <button type="submit"
                        style="padding:5px; margin-top:10px; background-color:#9191e9; border-radius:10px;">Prześlij
                        zdjęcie</button>
                </form>
                <hr>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Wyloguj się
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                
            </div>
        </div>
    </div>
@endsection

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