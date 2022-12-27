@extends('back.layouts.main')
@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span>Film Ekle</span>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.movie.store')}}" method="post">
                    @csrf
                    <div class="form-group my-4" >
                        <label for="name">Film Adı</label>
                        <input class="form-control" id="name" type="text" name="name" autocomplete="off" required>
                    </div>
                    <div class="form-group my-4" >
                        <label for="image">Filmin Kapak Resmi (link)</label>
                        <input class="form-control" id="image" type="text" name="image" autocomplete="off"  required>
                    </div>
                    <div class="form-group my-4" >
                        <label for="rating">Filmin Puaanı</label>
                        <input type="number" step="0.1" class="form-control" id="rating" name="rating" required>
                    </div>
                    <div class="form-group my-4" >
                        <label for="director">Filmin Yönetmeni</label>
                        <select class="form-control" title="Choose one of the following..." name="director_id" id="director" required>
                            @foreach($directors as $director)
                            <option value="{{$director->id}}">{{$director->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-4" >
                        <label for="description">Filmin Açıklaması</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    @foreach($categories as $category)
                        <div class="form-group my-4" >
                            <input type="checkbox" id="{{$category->id}}" name="{{$category->id}}">
                            <label for="{{$category->id}}">{{$category->name}}</label>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Filmi Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
