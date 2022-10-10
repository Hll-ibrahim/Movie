@extends('back.layouts.main')
@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span>Kategori Ekle</span>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.category.update',$category->id)}}" method="post">
                    @csrf
                    <div class="form-group my-4" >
                        <label for="name">Kategori Adı</label>
                        <input value="{{$category->name}}" class="form-control" id="name" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Kategori Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
