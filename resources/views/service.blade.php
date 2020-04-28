<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Service Yoofix</title>

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
            <form action="/service/create" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control" id="nameService" name="nameService" placeholder="Nama layanan" required="">
                    </div>
                    <div class="form-group col-lg-4">
                        <input type="text" class="form-control" id="priceService" name="priceService" placeholder="Tarif per jam" required="">
                    </div>
                    <div class="form-group col-lg-2">
                        <button type="submit" class="btn btn-primary">Buat Baru</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="position-ref" style="margin-top: 30px;">
            <div class="row">
                <table class="table table-hover tulisan">
                    <tr>
                        <th>ID</th>
                        <th>Nama Layanan</th>
                        <th>Tarif</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($data_service as $service)
                    <tr>
                        <td>{{$service->IDService}}</td>
                        <td>{{$service->nameService}}</td>
                        <td>Rp {{$service->priceService}}</td>
                        <td><a href="#" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#ubahService{{$service->IDService}}">Ubah</a>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#hapusService{{$service->IDService}}">Hapus</button></td>

                        <!-- ** Modal Ubah Service Start ** -->
                        <div class="modal fade" id="ubahService{{$service->IDService}}" tabindex="-1" role="dialog" aria-labelledby="ubahService{{$service->IDService}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ubahService{{$service->IDService}}">Layanan Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/service/{{$service->IDService}}/update" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="nameService" id="nameService" value="{{$service->nameService}}" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="priceService" id="priceService" value="{{$service->priceService}}" required="">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                                            <button type="submit" id="form-submit" class="btn btn-success btn-sm">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ** Modal Ubah Service End ** -->
                        <!-- Modal Hapus Service Start -->
                        <div class="modal fade" id="hapusService{{$service->IDService}}" tabindex="-1" role="dialog" aria-labelledby="hapusService{{$service->IDService}}" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="hapusService{{$service->IDService}}">Hapus Service</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">Kamu yakin ingin menghapus service ini?</div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                                <a href="/service/{{$service->IDService}}/delete" class="btn btn-danger btn-sm" id="hapus">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- ** Modal Hapus Service End ** -->
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </body>
</html>
