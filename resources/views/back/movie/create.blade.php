@extends('back.layouts.main')
@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <span>Film Ekle</span>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.movie.store')}}" method="post">
                        @csrf
                        <div class="form-group my-4" >
                            <label for="name">Film Adı</label>
                            <input class="form-control" id="name" type="text" name="name" required>
                        </div>
                        <div class="form-group my-4" >
                            <label for="image">Filmin Kapak Resmi (link)</label>
                            <input class="form-control" id="image" type="text" name="image" required>
                        </div>
                        <div class="form-group my-4" >
                            <label for="description">Filmin Puanı</label>
                            <input type="number" class="form-control" id="description" name="rating" required>
                        </div>
                        <div class="form-group my-4" >
                            <label for="director">Filmin Yönetmeni</label>
                            <select class="form-control" title="Choose one of the following..." name="director_id" id="director" required>
                                <option value="">Bir Yönetmen Seçiniz</option>
                                @foreach($directors as $director)
                                <option value="{{$director->id}}">{{$director->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-4" >
                            <label for="category">Filmin Kategorisi</label>
                            <select class="form-control" title="Choose one of the following..." name="category_id" id="category" required>
                                <option value="">Bir Kategori Seçiniz</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-4" >
                            <label for="description">Filmin Açıklaması</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Filmi Ekle</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
