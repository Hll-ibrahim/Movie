@extends('back.layouts.main')
@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-header">
                Bütün Kategoriler
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Kategori Adı</th>
                        <th>Kategoriye Ait Filmler</th>
                        <th></th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                @foreach($category->movies as $movie)
                                    <span>{{$movie->name}}</span><br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="{{route('admin.category.delete',$category->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="card my-4">
            <div class="card-header">
                <div class="card-title">
                    <span>Kategori Ekle</span>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.category.store')}}" method="post">
                    @csrf
                    <div class="form-group my-4" >
                        <label for="name">Kategori Adı</label>
                        <input class="form-control" id="name" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Kategori Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
