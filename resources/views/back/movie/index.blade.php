@extends('back.layouts.main')
@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                Bütün Filmler
            </div>
            <button class="btn btn-success btn-block" onclick="movieCreate()">Film Ekle</button>
            <div class="card-body">
                <table id="movie-table" class="table">
                    <thead>
                        <tr>
                            <th>Film Resmi</th>
                            <th>Filmin Adı</th>
                            <th>Filmin Yönetmeni</th>
                            <th>Filmin Kategorileri</th>
                            <th>Filmin Puanı</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Film Resmi</th>
                        <th>Filmin Adı</th>
                        <th>Filmin Yönetmeni</th>
                        <th>Filmin Kategorileri</th>
                        <th>Filmin Puanı</th>
                        <th></th>
                    </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>

    <!-- Create Movie Modal -->
    <div class="modal fade" id="movie_create_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Film Ekle</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <form id="create_movie_form" method="post" enctype="multipart/form-data">
                        <div class="row mt-3 mb-4">

                            <input type="hidden" name="id" id="id" value="">
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="name" style="text-decoration: underline;">Film İsmi</label>
                                <input type="text" name="name" id="name" placeholder="Film İsmini Giriniz.."
                                       class="form-control"
                                       value="" required>
                            </div>
                            <div class="form-group mb-4 col-12">

                                <label class="mb-1" for="image" style="text-decoration: underline;">Film Resmi</label>
                                <input type="text" name="image" id="image"
                                       class="form-control"
                                       value="" placeholder="Film Resmini Giriniz.." required>
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="director_id" style="text-decoration: underline;">Yönetmen</label>
                                <select name="director_id" id="director_id" class="form-control">
                                    <option value="">Bir Yönetmen Seçiniz..</option>
                                    @foreach($directors as $director)
                                        <option value="{{$director->id}}">{{$director->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="rating" style="text-decoration: underline;">Puanı</label>
                                <input type="text" name="rating" id="rating"
                                       class="form-control" value="" required>
                            </div>

                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="description" style="text-decoration: underline;">Açıklama</label>
                                <textarea type="text" name="description" id="description"
                                          class="form-control" required></textarea>
                            </div>

                            @foreach($categories as $category)
                                <div class="form-group mb-4 col-12" >
                                    <input type="checkbox" id="{{$category->id}}" name="{{$category->id}}">
                                    <label for="{{$category->id}}">{{$category->name}}</label>
                                </div>
                                <br>
                            @endforeach


                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="movieCreatePost()">Ekle</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                </div>
            </div>
        </div>
    </div>





@endsection
@section('script')
    <script>

        // fetch
        dataTable = $('#movie-table').DataTable({
            order: [
                [0, 'DESC']
            ],
            processing: true,
            serverSide: true,
            scrollY: true,
            scrollCollapse: true,
            ajax: {
                url: '{!!route('admin.movies.fetch') !!}',
            },
            columns: [
                {data: 'image', name: 'image'},
                {data: 'name', name: 'name'},
                {data: 'director_id', name: 'director'},
                {data: 'categories', name: 'categories'},
                {data: 'rating', name: 'rating'},
                {data: 'crud', name: 'crud'},
            ]
        });

        //create
        function movieCreate(){
            $('#movie_create_modal').modal("toggle");
        }

        function movieCreatePost() {

            var formData = new FormData(document.getElementById('create_movie_form'));
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.movie.store')}}',
                dataType: "json",
                data: formData,
                headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        html: 'Ekleme Başarılı!',
                        showConfirmButton: true,
                        confirmButtonText: "Tamam",
                    });

                    dataTable.ajax.reload(null, false);
                    $('#create_movie_form').trigger("reset");
                    $('#movie_create_modal').modal("toggle");

                },
                error: function (data) {
                    var err = JSON.parse(data.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',
                        html: err.message,
                        showConfirmButton: true,
                        confirmButtonText: "Tamam",
                    });
                }
            });
        }


        function movieUpdatePost() {

            var formData = new FormData(document.getElementById('update_movie_form'));
            console.log(formData);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.movie.update.post')}}',
                dataType: "json",
                data: formData,
                headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        html: 'Güncelleme Başarılı!',
                        showConfirmButton: true,
                        confirmButtonText: "Tamam",
                    });

                    dataTable.ajax.reload(null, false);
                    $('#movie_update_modal').modal("toggle");

                },
                error: function (data) {
                    var err = JSON.parse(data.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',
                        html: err.message,
                        showConfirmButton: true,
                        confirmButtonText: "Tamam",
                    });
                }
            });
        }

    </script>
@endsection
