@extends('back.layouts.main')
@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                Bütün Filmler
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Film Resmi</th>
                        <th>Filmin Adı</th>
                        <th>Filmin Kategorileri</th>
                        <th>Filmin Puanı</th>
                        <th>Filmin Yönetmeni</th>
                        <th></th>
                    </tr>
                    @foreach($movies as $movie)
                        <tr>
                            <td>
                                <img src="{{$movie->image}}" height="150">
                            </td>
                            <td>
                                {{$movie->name}}
                            </td>
                            <td>
                                @foreach($movie->categories as $category)
                                    {{$category->name}}
                                @endforeach
                            </td>
                            <td>
                                {{$movie->rating}}
                            </td>
                            <td>
                                {{$movie->director->name}}
                            </td>
                            <td>
                                <a href="{{route('admin.movie.edit',$movie->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="{{route('admin.movie.delete',$movie->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
