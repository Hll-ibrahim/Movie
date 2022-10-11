@extends('back.layouts.main')
@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span>Yönetmeni Güncelle</span>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.director.update',$director->id)}}" method="post">
                    @csrf
                    <div class="form-group my-4">
                        <img src="{{$director->image}}" height="150"/>
                    </div>
                    <div class="form-group my-4" >
                        <label for="name">Yönetmen Adı</label>
                        <input class="form-control" id="name" type="text" name="name" value="{{$director->name}}" required>
                    </div>
                    <div class="form-group my-4" >
                        <label for="image">Yönetmenin Resmi (link)</label>
                        <input class="form-control" id="image" type="text" name="image" value="{{$director->image}}" required>
                    </div>
                    @foreach($movies as $movie)
                        @if($director->isDirected($movie->id))
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
                        <button type="submit" class="btn btn-primary btn-block">Yönetmeni Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
