@extends('front.layouts.main')
@section('content')

    <div class="card my-5">
        <img
            src="{{$movie->image}}"
            alt=""
            class="card-img-top img-thumbnail"
        />
        <main class="card-body">
            <h4 class="card-title">{{$movie->name}}</h4>
            <p class="card-text">
                {{$movie->description}}
            </p>
        </main>
        <footer class="card-footer">
            {{$movie->director->name}}
        </footer>
    </div>
    </div>
    </div>

        @include('front.widget.categoryWidget')
        @endsection




