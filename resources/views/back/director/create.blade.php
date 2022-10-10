@extends('back.layouts.main')
@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span>Yönetmen Ekle</span>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.director.store')}}" method="post">
                    @csrf
                    <div class="form-group my-4" >
                        <label for="name">Yönetmen Adı</label>
                        <input class="form-control" id="name" type="text" name="name" required>
                    </div>
                    <div class="form-group my-4" >
                        <label for="image">Yönetmenin Resmi (link)</label>
                        <input class="form-control" id="image" type="text" name="image" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Yönetmeni Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
