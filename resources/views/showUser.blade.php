@extends('layout.main')
@section('content')
<link rel="stylesheet" href="{{ asset('css/showUser.css') }}">
<style>
.icon a {
    background-image: none;
    color: white; 
    -webkit-background-clip: initial; 
    -webkit-text-fill-color: initial;
    transition: none;
  }
  
.icon a::before{
    background:none;
    transition:none;
}
</style>
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-3 order-1 mt-4 pb-2"> </div>
        <div class="col-md-3 order-3 mt-4 pb-2"> </div>
        <div class="col-md-6 order-2">
            <div class="row user-background mt-4"  style="height:200px;background-color:#333333; color:white">
                <div class="col-md-3">
                    @if ($avatar != null)
                        <img src="data:image/jpeg;base64,{{ base64_encode($avatar) }}" alt="Avatar"
                            style="border-radius: 100px; width: 150px; height: 150px; margin-top: 10px; margin-bottom: 25px;">
                    @else
                        <img src="{{ asset('/images/user.png') }}" alt="User"
                            style="border-radius: 100px; width: 150px; height: 150px; margin-top: 10px; margin-bottom: 25px;">
                    @endif
                </div>
                <div class="col-md-8">
                <h1>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h1>
                <p class="mt-2">
                    @if (isset(Auth::user()->bio)) 
                        {{ Auth::user()->bio }}
                    @else
                        Nie podano informacji </p>
                    @endif
                </div>
                <div class="col-md-1">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" style="background:none; border:none;" data-bs-toggle="modal" data-bs-target="#formModal">
                                <i class="bi bi-gear mt-3" style="font-size:32px"></i>
                            </button>
                            <!-- MODAL -->
                            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true"  style="color:black">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="formModalLabel">Edytuj profil</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Ustaw nowe zdjęcie profilowe:</p>
                                            <form method="POST" style="padding:5px;" action="{{ route('file.upload') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" id="imageUpload" style="position:relative; left:1.5%" name="avatar"> <br>
                                                <button type="submit" class="btn btn-secondary mt-1">
                                                    Prześlij zdjęcie
                                                </button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                                            <button type="button" class="btn btn-primary">Zapisz zmiany</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /MODAL -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 icon">
                        <a href="/logout"><i class="bi bi-door-open" style="font-size:32px; margin-left:13px"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row user-info pt-3" style="background-color:#333333; color:white">
                <div class="col-md-6 pb-4">
                    <p class="m-0 p-0">ID użytkownika = {{ Auth::id() }}</p>
                    <p class="m-0 p-0">Adres e-mail użytkownika = {{ Auth::user()->email }}</p>
                    <p class="m-0 p-0">Data założenia konta = {{ Auth::user()->created_at}}</p>
                </div>
                <div class="col-md-5">
                    @if (isset(Auth::user()->country))
                        <p class="m-0 p-0">Kraj pochodzenia:</p>
                    @elseif (isset(Auth::user()->region))
                        <p class="m-0 p-0">Region:</p>
                    @endif
                </div>
                <div class="col-md-1 icon">
                    <a href="/sendMail"><i class="bi bi-envelope" style="font-size:32px; margin-left:13px"></i></a>
                </div>
            </div>
        </div>
    </div>
    @if (session('message'))
    <div class="row">
        <div class="col-md-4 offset-4">
            <div class="alert alert-success mt-4">
                {{ session('message') }}
            </div>
        </div>
    </div>
    @endif
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