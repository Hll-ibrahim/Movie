@extends('back.layouts.main')
@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span>Kategori Güncelleme</span>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.category.updatePost')}}" method="post">
                    @csrf
                    <div class="form-group my-4" >
                        <label for="name">Kategori Adı</label>
                        <input value="{{$category->name}}" class="form-control" id="name" type="text" name="name" required>
                    </div>
                    @foreach($movies as $movie)
                        @if($category->isCategories($movie->id))
                            <div class="form-group my-4" >
                                <input checked type="checkbox" id="{{$movie->id}}" name="{{$movie->id}}">
                                <label for="{{$movie->id}}">{{$movie->name}}</label>
                            </div>
                        @else
                            <div class="form-group my-4" >
                                <input  type="checkbox" id="{{$movie->id}}" name="{{$movie->id}}">
                                <label for="{{$movie->id}}">{{$movie->name}}</label>
                            </div>
                        @endif
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Kategori Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
