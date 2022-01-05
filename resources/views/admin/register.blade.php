<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @include('layouts.css')
    <title>Register</title>
</head>

<body style="background-color: #f2f2f2;">
    <div class="p-3 mb-4">
        <div class="d-flex align-items-center justify-content-center mt-4">
            <img src="{{ asset('img/logo.png') }}" alt="logo" class="img">
        </div>
        <div class="d-flex align-items-center justify-content-center" style="height: 350px">
          <div class="card pb-3 shadow" style="width: 500px;">
              <div class="card-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><i data-feather="user"></i>  Nama</label>
                                <input type="text" name="nama_admin" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><i data-feather="map-pin"></i>  Alamat</label>
                                <input type="text" name="alamat_admin" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><i data-feather="phone"></i>  Nomor Telepon</label>
                                <input type="tel" name="nomor_telpon" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><i data-feather="mail"></i>  Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><i data-feather="lock"></i>  Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 mt-2">
                            <a href="{{ route('login.form') }}">Login disini.</a>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <button type="submit" class="btn btn-primary float-right">Register</button>
                        </div>
                    </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    @include('layouts.js')
</body>
</html>
