@extends('back.layouts.main')
@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span>Film Güncelle</span>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.movie.update.post')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$movie->id}}">
                    <div class="form-group my-4" >
                        <label for="name">Film Adı</label>
                        <input value="{{$movie->name}}" class="form-control" id="name" type="text" name="name" required>
                    </div>
                    <img id="movie_image" src="{{asset("documents/".$movie->name."/".$movie->image)}}" height="150">
                    <div class="form-group my-4" >
                        <label for="image">Filmin Kapak Resmi</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="form-group my-4" >
                        <label for="description">Filmin Puanı</label>
                        <input value="{{$movie->rating}}" type="number" step="0.1" class="form-control" id="description" name="rating" required>
                    </div>
                    <div class="form-group my-4" >
                        <label for="director">Filmin Yönetmeni</label>
                        <select class="form-control" title="Choose one of the following..." name="director_id" id="director" required>
                            @foreach($directors as $director)
                                @if($movie->director_id == $director->id)
                                    <option selected value="{{$director->id}}">{{$director->name}}</option>
                                @else
                                    <option value="{{$director->id}}">{{$director->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-4" >
                        <label for="description">Filmin Açıklaması</label>
                        <textarea class="form-control" id="description" name="description" required> {{$movie->description}}</textarea>
                    </div>
                    @foreach($categories as $category)
                        @if($movie->isCategories($category->id))
                            <div class="form-group my-4" >
                                <input checked type="checkbox" id="{{$category->id}}" name="{{$category->id}}">
                                <label for="{{$category->id}}">{{$category->name}}</label>
                            </div>
                        @else
                            <div class="form-group my-4" >
                                <input  type="checkbox" id="{{$category->id}}" name="{{$category->id}}">
                                <label for="{{$category->id}}">{{$category->name}}</label>
                            </div>
                        @endif
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Filmi Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
