
<div class="col-lg-4">
    <div class="card">
        <header class="card-header">
            <h3 class="card-title">Categories</h3>
        </header>
        <main class="card-body">
            <div class="row">
                <div class="col">
                    <nav class="navbar">
                        <ul class="navbar-nav">
                            @foreach($categories as $category)
                                <li class="nav-item">
                                    <a href="{{route('category.index',$category->id)}}" class="nav-link">
                                        <h3>
                                            {{$category->name}}
                                        </h3>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>
    <div class="card mt-5">
        <header class="card-header">
            <h3 class="card-title">Side Widget</h3>
        </header>
        <main class="card-body">
            <p class="card-text">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Incidunt sunt consequatur corrupti autem iste eos sit dicta
                mollitia obcaecati natus. Totam nesciunt soluta inventore
                voluptatum, incidunt tempora non quo obcaecati.
            </p>
        </main>
    </div>
</div>
