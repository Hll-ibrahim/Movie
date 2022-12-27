<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('dashboard/bootstrap.min.css')}}" />
    <title>Welcome!!</title>
</head>
<body>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">LogIn</h3>
            </div>
            <div class="card-body">
                <form action="{{route('admin.login.post')}}" method="post" >
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first()}}
                        </div>
                    @endif
                    <div class="form-group my-3">
                        <input class="form-control" name="email" >
                    </div>
                    <div class="input-group my-3">
                        <input type="password" class="form-control" name="password" >
                    </div>
                    <span>Bir hesabın yok mu?</span><a href="{{route('admin.register')}}">Kaydol</a> <br>
                    <button type="Giriş" class="btn btn-success">Giriş</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
