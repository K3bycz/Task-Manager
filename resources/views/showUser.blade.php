@extends('layout.main')
@section('content')

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
td{
    padding:5px;
    color:white;
}
</style>

<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-3 order-1 mt-4 pb-2" style="background-image: url('data:image/jpeg;base64,{{ base64_encode($profileBackground) }}'); z-index: -2"> </div>
        <div class="col-md-3 order-3 mt-4 pb-2" style="background-image: url('data:image/jpeg;base64,{{ base64_encode($profileBackground) }}'); z-index: -2"> </div>
        <div class="col-md-6 order-2">
            <div class="row user-background mt-4"  style="height:200px;background-color:#333333; color:white; border-bottom:1px solid white !important">
                <div class="col-md-3">
                    @if ($avatar != null)
                        <img src="data:image/jpeg;base64, {{ base64_encode($avatar) }}" alt="Avatar"
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
                    „{{ Auth::user()->bio }}”
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
                                            <form method="POST" style="padding:5px;" action="{{ route('user.avatarUpload') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="avatar">Ustaw nowe zdjęcie profilowe:</label>
                                                    <input type="file" name="avatar" class="mb-3 imageUpload">
                                                </div>
                                                <div class="col-12">
                                                    <label for="avatar">Ustaw nowe tło profilu:</label>
                                                    <input type="file" name="profileBackground" class="mb-3 imageUpload">
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-dark">Prześlij pliki</button>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" style="padding:5px;" action="{{ route('user.update') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="country">Kraj zamieszkania:</label>
                                                   
                                                        <input type="text" id="country" name="country" style="padding-right:0px; !important; width:220px;">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="region">Region:</label>
                                                        <input type="text" name="region" placeholder="Region" value="{{ Auth::user()->region }}" class="mb-2">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="city">Miasto:</label>
                                                        <input type="text" name="city" placeholder="Miasto" value="{{ Auth::user()->city }}" class="mb-2">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="postcode">Kod pocztowy:</label>
                                                        <input type="text" name="postcode" placeholder="Kod pocztowy" value="{{ Auth::user()->postcode }}" class="mb-2">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="country">Ulica:</label>
                                                        <input type="text" name="street" placeholder="Ulica" value="{{ Auth::user()->street }}" class="mb-2">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="country">Numer domu:</label>
                                                        <input type="text" name="housenumber" placeholder="Numer domu" value="{{ Auth::user()->housenumber }}" class="mb-2">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end mt-2">
                                                    <button type="submit" class="btn btn-dark">Zapisz adres</button>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" style="padding:5px;" action="{{ route('user.updateBio') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-12">
                                                    <label class="mb-1" for="country">Zaaktualizuj opis profilu:</label>
                                                    <textarea class="form-control rounded shadow" style="max-height:250px;" name="bio" rows="6" placeholder="Opis profilu..."></textarea>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-dark">Zaaktualizuj informacje profilowe</button>
                                                </div>
                                            </form>
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
                <div class="col-md-5 pb-4">
                    <table>
                        <tbody style="text-align:center; border: 1px solid white">
                            <tr>
                                <td style="color:#939393">Adres e-mail</td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td style="color:#939393">ID</td>
                                <td>{{ Auth::user()->id }}</td>
                            </tr>
                            @if (isset(Auth::user()->country))  
                                <tr>
                                    <td style="color:#939393">Kraj</td>
                                    <td>{{ Auth::user()->country }}</td>
                                </tr>
                            @endif
                            @if (isset(Auth::user()->region))
                                <tr>
                                    <td style="color:#939393">Region</td>
                                    <td>{{ Auth::user()->region }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    
                    <div class="row" id="addressRow">
                        <div class="col-md-12">
                            <p class="m-0 p-0" style="color:#939393; font-weight:bold" id="addressOutput"></p>
                        </div>
                        <div class="col-md-12">
                            <span class="m-0 p-0" id="streetOutput"></span> <span class="m-0 p-0" id="houseNumberOutput"></span>
                        </div>
                        <div class="col-md-12">
                            <span class="m-0 p-0" id="postcodeOutput"></span> <span class="m-0 p-0" id="cityOutput"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 offset-3 icon">
                    <a href="/sendMail"><i class="bi bi-envelope" style="font-size:32px; margin-left:13px"></i></a>
                    <a href="#" id="sendButton"><i class="bi bi-eye" style="font-size:32px; margin-left:13px"></i></a>
                </div>
            </div>
            <div class="row user-background" style="height:300px;background-color:#333333; color:white; border-top:1px solid white !important">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <h5 class="mt-1 mb-3"> Posty </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="border-left:1px solid white !important">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <h5 class="mt-1 mb-3"> Twoje osiągnięcia </h5>
                        </div>
                    </div>
                    <div class="row pb-2" style="border-bottom:1px solid white !important">
                        <div class="col-md-12">
                            <div class="container-fluid">
                                <div class="row pb-2">
                                    @if($achievements != null)
                                        @foreach ($achievements as $achievement)
                                            <div class="col-md-3">
                                                <img src="{{ asset($achievement->url) }}" alt="User" style="width:45px; height:45px;"></a>
                                            </div>
                                        @endforeach
                                    @endif   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row mt-2">
                            <div class="col-md-12 d-flex justify-content-start align-items-center p-1" style="height:50px">
                                <p>Zadania <span class="text-muted" style="font-size:25px"> @if($countAll != null) {{ $countAll }} @endif</span></p>
                            </div>
                            <div class="col-md-12 d-flex justify-content-start align-items-center ml-2 p-1" style="height:50px"> 
                                <p>Zakończone <span class="text-muted" style="font-size:25px"> @if($countDone != null) {{ $countDone }} @endif</span></p>
                            </div>
                            <div class="col-md-12 d-flex justify-content-start align-items-center ml-2 p-1" style="height:50px">
                                <p>W trakcie <span class="text-muted" style="font-size:25px"> @if($countInProgress != null) {{ $countInProgress }} @endif</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="container mt-4">
        @if ($errors->has('country'))
            <div class="alert alert-danger col-lg-6 offset-lg-3">
                Wprowadzono błędną nazwę państwa!
            </div>
        @elseif ($errors->has('region'))
            <div class="alert alert-danger col-lg-6 offset-lg-3">
                Wprowadzono błędną nazwę regionu
            </div>
        @elseif ($errors->has('city'))
            <div class="alert alert-danger col-lg-6 offset-lg-3">
                Wprowadzono błędną nazwę miasta.
            </div>
        @elseif ($errors->has('postcode'))
            <div class="alert alert-danger col-lg-6 offset-lg-3">
                Wprowadzono błędny kod pocztowy.
            </div>
        @elseif ($errors->has('street'))
            <div class="alert alert-danger col-lg-6 offset-lg-3">
                Wprowadzono błędną nazwe ulicy.
            </div>
        @elseif ($errors->has('housenumber'))
            <div class="alert alert-danger col-lg-6 offset-lg-3">
                Wprowadzono błędny numer domu.
            </div>
        @elseif ($errors->has('avatar'))
            <div class="alert alert-danger col-lg-6 offset-lg-3">
                Załączony avatar ma zły format!
            </div>
        @elseif ($errors->has('bio'))
            <div class="alert alert-danger col-lg-6 offset-lg-3">
                Wprowadzono błędny opis profilu!
            </div>
        @endif
    </div>
</div>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#country").countrySelect();
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

    var button = ($("#sendButton")),
        addressOutput = ($("#addressOutput"))
        cityOutput = ($("#cityOutput"))
        postcodeOutput = ($("#postcodeOutput"))
        streetOutput = ($("#streetOutput"))
        houseNumberOutput = ($("#houseNumberOutput"))

    let dataLoaded = false;

    button.on("click", function(){
        if (!dataLoaded) {
            $.ajax({
                url:"/showAddress",
                method:"GET",
                dataType:"json",
                success:function(data, status, jqXHR){ 

                    console.log("Żądanie zakończone sukcesem");
                    if(data.city || data.postcode || data.street || data.housenumber) {
                        addressOutput.text("Adres użytkownika:");
                    }
                    if (data.city) {
                        cityOutput.text(data.city);
                    }
                    if (data.postcode) {
                        postcodeOutput.text(data.postcode);
                    }
                    if (data.street) {
                        streetOutput.text(data.street);
                    }
                    if (data.housenumber) {
                        houseNumberOutput.text(data.housenumber);
                    }
                    if(data.city || data.postcode || data.street || data.housenumber) {
                        $("#addressRow").css({
                        "border": "1px solid white",
                        "text-align": "center"
                        });
                    }
                    dataLoaded = true;
                    button.find('i').removeClass('bi-eye').addClass('bi-eye-slash');
                },

                error:function(jqXHR, status, errorThrown){ 
                    console.log("Żądanie zakończone errorem");
                }
            })
        } else {
            addressOutput.text('');
            cityOutput.text('');
            postcodeOutput.text('');
            streetOutput.text('');
            houseNumberOutput.text('');

            $("#addressRow").css({
                "border": "none",
                "text-align": "left"
            });

            dataLoaded = false;
            button.find('i').removeClass('bi-eye-slash').addClass('bi-eye');
        }

    });

});
</script>