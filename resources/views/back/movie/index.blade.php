@extends('back.layouts.main')
@section('content')
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                Bütün Filmler
            </div>
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

    <!-- Update Movie Modal -->
    <div class="modal fade" id="movie_update_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Film Güncelleme</h5>
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

                            <input type="hidden" name="id" id="updateId" value="">
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="updateName" style="text-decoration: underline;">Film İsmi</label>
                                <input type="text" name="updateName" id="updateName" placeholder="Enter Name"
                                       class="form-control"
                                       value="" required>
                            </div>
                            <div class="form-group mb-4 col-12">

                                <label class="mb-1" for="updateImage" style="text-decoration: underline;">Film Resmi</label>
                                <br>
                                <div class="my-4">
                                    <img id="old_image" src="" height="150"></div>
                                <input type="text" name="updateImage" id="updateImage"
                                       class="form-control"
                                       value="" placeholder="Yeni Resmi giriniz" required>
                            </div>
                            <input type="hidden" id="old_director" value="12">
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="updateDirectorId" style="text-decoration: underline;">Yönetmen</label>
                                <select name="updateDirectorId" id="updateDirectorId" class="form-control">
                                    @foreach($directors as $director)
                                        <option value="{{$director->id}}">{{$director->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="updateRating" style="text-decoration: underline;">Puanı</label>
                                <input type="text" name="updateRating" id="updateRating"
                                       class="form-control" value="" required>
                            </div>

                            <div class="form-group mb-4 col-12">
                                <label class="mb-1" for="updateDescription" style="text-decoration: underline;">Açıklama</label>
                                <textarea type="text" name="updateDescription" id="updateDescription"
                                          class="form-control" required></textarea>
                            </div>

                        </div>
                        <input type="hidden" name="updateExamType" id="updateExamType">
                        <input type="hidden" name="updateId" id="updateId">
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="movieUpdatePost()">Güncelle</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
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

        function movieUpdate(id) {
            var old_director = $('#old_director');
            var options = $('#updateDirectorId').children();

            $.ajax({
                type: 'GET',
                url: '{{route('admin.movie.update')}}',
                data: {
                    id: id,
                },
                success: function (data) {
                    $('#updateId').val(id);
                    $('#updateName').val(data[0].name);
                    $('#old_image').attr('src',data[0].image);
                    $('#updateImage').val(data[0].image);
                    $('#updateRating').val(data[0].rating);
                    $('#updateDescription').val(data[0].description);
                    old_director.val(data[0].director_id);
                    $('#movie_update_modal').modal("toggle");
                    $('#updateDirectorId option[value="'+data[0].director_id+'"]').prop('selected', true);
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
