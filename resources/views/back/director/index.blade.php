@extends('back.layouts.main')
@section('content')
    <div class="container">
    <div class="card">
        <div class="card-header">
            Bütün Yönetmenler
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Yönetmenin Resmi</th>
                    <th>Yönetmenin Adı</th>
                    <th>Oynadığı Filmler</th>
                </tr>
                @foreach($directors as $director)
                    <tr>
                        <td>
                            <img src="{{$director->image}}" height="100">
                        </td>
                        <td>
                            {{$director->name}}
                        </td>
                        <td>
                            @foreach($director->movies as $movie)
                                <span>{{$movie->name}}</span>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>
@endsection
