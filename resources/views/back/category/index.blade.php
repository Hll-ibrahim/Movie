@extends('back.layouts.main')
@section('content')
    @if ($errors->any())
        <div id="Error_Copy" class="d-none">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container mt-3">
    <h1>Kategoriler</h1>
    <a class="btn btn-success" href="javascript:void(0)" id="createNewCategory">Kategori Ekle</a>
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="300px">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">Kategoriyi Düzenle</h4>
            </div>
            <div class="modal-body">
                <form id="categoryForm" name="categoryForm" class="form-horizontal">
                    <input type="hidden" name="category_id" id="category_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Kaydet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'}
        });
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.categories.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $('#createNewCategory').click(function () {
            $('#saveBtn').val("create-category");
            $('#category_id').val('');
            $('#categoryForm').trigger("reset");
            $('#modelHeading').html("Kategori Ekle");
            $('#ajaxModel').modal('show');
        });
        $('body').on('click', '.editCategory', function () {
            var category_id = $(this).data('id');
            $.get("{{ route('admin.categories.index') }}"+"/" + category_id +"/edit", function (data) {
                $('#ajaxModel').modal('show');
                $('#category_id').val(data.id);
                $('#name').val(data.name);
            })
        });
        $('#saveBtn').click(function (e) {
            e.preventDefault();

            $.ajax({
                data: $('#categoryForm').serialize(),
                url: "{{ route('admin.categories.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı!',
                        html: 'Kategori kaydedildi.',
                        showConfirmButton: true,
                        confirmButtonText: "Tamam",
                    })
                    $('#categoryForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
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
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteCategory', function () {
            var category_id = $(this).data("id");
            var category_name = $(this).data("name");
            Swal.fire({
                title: category_name,
                html: 'Kategoriyi silmek istediğinize emin misiniz?',
                showDenyButton: true,
                confirmButtonText: 'Sil',
                denyButtonText: `İptal`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('admin.categories.store') }}/"+category_id,
                        success: function (data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı',
                                html: category_name + ' kategorisi silindi!',
                                showConfirmButton: true,
                                confirmButtonText: "Tamam",
                            });
                            table.draw();
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
                } else if (result.isDenied) {
                    Swal.fire('Kategori silinmedi!', '', 'info')
                }
            })
        });
    });
</script>

@endsection
