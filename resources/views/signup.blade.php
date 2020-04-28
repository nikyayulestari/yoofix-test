<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sign Up Yoofix</title>

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
            <form action="/signup" method="POST">
            {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="email" class="form-control" id="emailUser" name="emailUser" placeholder="Email" required="">
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control" id="nameUser" name="nameUser" placeholder="Nama lengkap" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <select id="provinceUser" name="provinceUser" class="form-control" required="">
                            <option selected>Pilih provinsi domisili</option>
                            @foreach($data_province as $province)
                                <option>{{$province['province']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- <script type="text/javascript">
                    $('#provinceUser').on('change',function(e){ //ada e untuk console dibawah aja
                        console.log(e); // gabegitu penting keknya nih 
                        $('#cityUser').append('<option value=""> uyee </option>'); // append bisa juga diganti html
                    });
                    </script> -->

                    <div class="form-group col-lg-6">
                        <select id="cityUser" name="cityUser" class="form-control">
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
                    <textarea class="form-control" id="addressUser" name="addressUser" placeholder="Alamat" required="" rows=3></textarea>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <input type="text" class="form-control" id="kontakUser" name="kontakUser" placeholder="Nomor Telepon/HP" required="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign up</button><a href="/fixer" style="margin-left: 10px;"><b>Daftar sebagai fixer</b></a>
            </form>
        </div>
    </body>
</html>
