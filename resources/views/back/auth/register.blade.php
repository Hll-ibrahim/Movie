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
            <h3 class="card-title">Kayıt Ol</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.register.post')}}" method="post" >
                @csrf
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger my-alert">
                        {{$error}}
                    </div>
                @endforeach
                <div class="form-group my-3">
                    <input class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group my-3">
                    <input class="form-control" name="email" placeholder="E-mail">
                </div>
                <div class="form-group my-3">
                    <input type="password" class="form-control" name="password" >
                </div>
                <div class="form-group my-3">
                    <input type="password" class="form-control" name="password_confirmation" >
                </div>

                <span>Zaten bir hesabın var mı?</span><a href="{{route('admin.login')}}">Giris</a>
                <button type="Giriş" class="btn btn-success">Kayıt Ol</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
