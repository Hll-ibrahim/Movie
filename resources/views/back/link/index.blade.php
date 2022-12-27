@extends('back.layouts.main')
@section('content')

    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Linkler</h1>
            </div>
            <div class="card-body">
                <a class="btn btn-success" href="javascript:void(0)" id="createNewLink">Link Ekle</a>
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>İsim</th>
                        <th>Link</th>
                        <th width="300px">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading">Linki Düzenle</h4>
                </div>
                <div class="modal-body">
                    <form id="linkForm" name="linkForm" class="form-horizontal">
                        <input type="hidden" name="link_id" id="link_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-2 control-label">Link</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="link" name="link" placeholder="Enter Link" value="" maxlength="50" required="">
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
                ajax: "{{ route('admin.links.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'link', name: 'link'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            $('#createNewLink').click(function () {
                $('#saveBtn').val("create-link");
                $('#link_id').val('');
                $('#linkForm').trigger("reset");
                $('#modelHeading').html("Link Ekle");
                $('#ajaxModel').modal('show');
            });
            $('body').on('click', '.editLink', function () {
                var link_id = $(this).data('id');
                $.get("{{ route('admin.links.index') }}"+"/" + link_id +"/edit", function (data) {
                    $('#ajaxModel').modal('show');
                    $('#link_id').val(data.id);
                    $('#name').val(data.name);
                    $('#link').val(data.link);
                })
            });
            $('#saveBtn').click(function (e) {
                e.preventDefault();

                $.ajax({
                    data: $('#linkForm').serialize(),
                    url: "{{ route('admin.links.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $('#linkForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.deleteLink', function () {

                var link_id = $(this).data("id");
                confirm("Are You sure want to delete !");

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('admin.links.store') }}/"+link_id,
                    success: function (data) {
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>
@endsection
