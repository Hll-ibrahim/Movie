@extends("back.layouts.main")
@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                En İyi Filmler
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Film Resmi</th>
                        <th>Filmin Adı</th>
                        <th>Filmin Puanı</th>
                        <th>Filmin Yönetmeni</th>
                    </tr>
                    @foreach($movies as $movie)
                        <tr>
                            <td>
                                <img src="{{$movie->image}}" height="100">
                            </td>
                            <td>
                                {{$movie->name}}
                            </td>
                            <td>
                                {{$movie->rating}}
                            </td>
                            <td>
                               {{$movie->director->name}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
