<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sign Up Fixer Yoofix</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
            window.setTimeout(function() {
              $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
              });
            }, 3000);
        </script>

    </head>

    <body>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert" id="alert_message">
            {{session('sukses')}}
        </div>
    @elseif(session('gagal'))
        <div class="alert alert-danger" role="alert" id="alert_message">
            {{session('gagal')}}
        </div>
    @endif

        <div class="kop">
            <div class="img">
                <img src="{{asset('assets/img/logo-yoofix.png')}}" alt="">
            </div>
        </div>
        <div class="position-ref">
            <form action="/fixer/create" method="POST">
            {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control" id="nameFixer" name="nameFixer" placeholder="Nama lengkap" required="">
                    </div>
                    <div class="col-lg-6">
                        <select class="form-control" id="nameService" name="nameService">
                            <option selected>Pilih keahlian Anda</option>
                            @foreach($data_service as $service)
                                <option>{{$service['nameService']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <select id="provinceFixer" name="provinceFixer" class="form-control">
                            <option selected>Pilih provinsi domisili</option>
                            @foreach($data_province as $province)
                                <option>{{$province['province']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <select id="cityFixer" name="cityFixer" class="form-control">
                            <option selected>Pilih kota domisili</option>
                            @foreach($data_city as $city)
                                @if($city['province'] == "DI Yogyakarta") 
                                <option>{{$city['type']}} {{$city['city_name']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="addressFixer" name="addressFixer" placeholder="Alamat" required="" rows=3></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Sign up</button><a href="/" style="margin-left: 10px;"><b>Daftar sebagai user</b></a>
            </form>
        </div>
    </body>
</html>
