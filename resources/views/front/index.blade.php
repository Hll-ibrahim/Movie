@extends('front.layouts.main')
@section('content')

    @foreach($movies as $movie)
        <div class="col-lg-4">
            <div class="card my-5">
                <img
                    src="/documents/{{$movie->id}}/{{$movie->image}}"
                    alt=""
                    class="card-img-top img-thumbnail"
                />
                <main class="card-body">
                    <h4 class="card-title">{{$movie->name}}</h4>
                    <p class="card-text">
                        {{$movie->description}}
                    </p>
                    <a href="{{route('single',$movie->id)}}" class="btn btn-primary">Read More</a>
                </main>
                <footer class="card-footer">{{$movie->created_at}}</footer>
            </div>
        </div>

        @endforeach
        </div>

        </div>

        @include('front.widget.categoryWidget')
        @endsection


