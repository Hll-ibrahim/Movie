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
                                <input type="file" name="image" id="image"
                                       class="form-control"
                                       value="" placeholder="Film Resmini Giriniz.." required>
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="director_id" style="text-decoration: underline;">Yönetmen</label>
                                <select name="director_id" id="director_id" class="form-control">
                                    <option value="">Bir Yönetmen Seçiniz..</option>
                                    @foreach($directors as $director)
                                        <option id="update_director_{{$director->id}}" value="{{$director->id}}">{{$director->name}}</option>
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

    <!-- Update Movie Modal -->
    <div class="modal fade" id="movie_update_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Film Güncelle</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <form id="update_movie_form" method="post" enctype="multipart/form-data">
                        <div class="row mt-3 mb-4">

                            <input type="hidden" name="update_id" id="update_id" value="">
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="update_name" style="text-decoration: underline;">Film İsmi</label>
                                <input type="text" name="update_name" id="update_name" placeholder="Film İsmini Giriniz.."
                                       class="form-control"
                                       value="" required>
                            </div>

                            <div class="form-group mb-4 col-12">
                                <img src="" alt="" id="old_image" height="200px">
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="update_image" style="text-decoration: underline;">Yeni Resim</label>
                                <input type="file" name="update_image" id="update_image"
                                       class="form-control"
                                       value="" placeholder="Film Resmini Giriniz.." required>
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="update_director_id" style="text-decoration: underline;">Yönetmen</label>
                                <select name="update_director_id" id="update_director_id" class="form-control">
                                    <option value="">Bir Yönetmen Seçiniz..</option>
                                    @foreach($directors as $director)
                                        <option value="{{$director->id}}">{{$director->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="update_rating" style="text-decoration: underline;">Puanı</label>
                                <input type="text" name="update_rating" id="update_rating"
                                       class="form-control" value="" required>
                            </div>

                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="update_description" style="text-decoration: underline;">Açıklama</label>
                                <textarea type="text" name="update_description" id="update_description"
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
                    <button type="button" class="btn btn-primary" onclick="movieUpdatePost()">Değişiklikleri Kaydet</button>
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

        function updateModal(id) {
            $.ajax({
                type: 'GET',
                url: '{!! route('admin.movies.get')!!}',
                data: {id: id},
                success: function (data) {
                    console.log(data);
                    $('#update_name').val(data.name);
                    $('#old_image').attr('src', '/documents/' + data.id + '/' + data.image);
                    $('#update_director_id').val(data.director_id);
                    $('#update_rating').val(data.rating);
                    $('#update_description').val(data.description);
                    $('#update_id').val(id);

                    $('#movie_update_modal').modal("toggle");

                },
                error: function (xhr) {
                    console.log(xhr);
                    alert(xhr.responseText);
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
                    $('#update_name').val('');
                    $('#update_director_id').val('');
                    $('#update_image').val('');
                    $('#update_rating').val('');
                    $('#update_description').val('');
                    $('#update_id').val('');
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
                error: function (xhr) {
                    console.log(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Başarısız',
                        html: xhr.responseText,
                        showConfirmButton: true,
                        confirmButtonText: "Tamam",
                    });
                }
            });
        }

        function movieDelete(id,name){
            Swal.fire({
                title: 'Dikkat',
                html: name +' filmini silmek istediğinize emin misiniz?',
                icon: 'warning',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Sonuçlandır',
                denyButtonText: 'İptal',
            }).then((result) => {
                if (result.isConfirmed) {
                    alert(id);
                    $.ajax({
                        type: 'POST',
                        url: '{{route('admin.movie.delete')}}',
                        data: {id: id},
                        headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                        success: function (data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı',
                                html: 'Silme İşlemi Başarılı!',
                                showConfirmButton: true,
                                confirmButtonText: "Tamam",
                            });

                            dataTable.ajax.reload(null, false);
                            $('#movie_update_modal').modal("toggle");

                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Başarısız',
                                html: xhr.responseText,
                                showConfirmButton: true,
                                confirmButtonText: "Tamam",
                            });
                        }
                    });
                }
            })
        }
    </script>
@endsection
