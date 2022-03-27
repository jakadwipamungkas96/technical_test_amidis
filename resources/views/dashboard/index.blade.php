@extends('layout.header')

    @section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Data Kelurahan</h4>
            <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah Data</button>
        </div>
        <div class="card-body">

            <?php
                // print_r("<pre>");
                // print_r($list_kelurahan->toArray());
                // exit();
            ?>
            <table class="table table-bordered" id="tbl_kelurahan">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Kelurahan</th>
                        <th class="text-center">Nama Kecamatan</th>
                        <th class="text-center">Nama Kota</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_kelurahan as $key => $value)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-left">{{$value->kelurahan_name}}</td>
                            <td class="text-left">{{$value->kecamatan_name}}</td>
                            <td class="text-left">{{$value->kota_name}}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <button type="button" onclick="showupdate('{{$value}}')" class="btn btn-info">Update</button>
                                    <button type="button" onclick="showdelete('{{$value}}')" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="modalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddLabel">Add Data Kelurahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/save_kelurahan" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="namakelurahan">Nama Kelurahan</label>
                            <input type="text" class="form-control" id="namakelurahan" name="namakelurahan" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="namakecamatan">Nama Kecamatan</label>
                            <input type="text" class="form-control" id="namakecamatan" name="namakecamatan" required>
                        </div>
                        <div class="form-group">
                            <label for="namakota">Nama Kota</label>
                            <input type="text" class="form-control" id="namakota" name="namakota" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Save</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="mdlUpdate" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="mdlUpdateLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdlUpdateLabel">Update Data Kelurahan <span class="nm_kelurahan"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/update_kelurahan" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="namakelurahan">Nama Kelurahan</label>
                            <input type="hidden" class="form-control" id="upd_idkelurahan" name="idkelurahan" required>
                            <input type="text" class="form-control" id="upd_namakelurahan" name="namakelurahan" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="namakecamatan">Nama Kecamatan</label>
                            <input type="text" class="form-control" id="upd_namakecamatan" name="namakecamatan" required>
                        </div>
                        <div class="form-group">
                            <label for="namakota">Nama Kota</label>
                            <input type="text" class="form-control" id="upd_namakota" name="namakota" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Update</button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="cancelUpdate()" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Update Modal -->
    <div class="modal fade" id="mdlDelete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="mdlDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content p-5">
                <h6 class="text-center">Apakah anda yakin akan menghapus data kelurahan <span class="del_nm_kelurahan"></span> ?</h6>
                <form action="/delete_kelurahan" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" class="form-control" id="del_idkelurahan" name="del_idkelurahan">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Delete</button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="cancelDelete()" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        function showupdate(value) {
            $("#mdlUpdate").modal("show");
            var dt = JSON.parse(value);
            $("#upd_idkelurahan").val(dt.id);
            $("#upd_namakelurahan").val(dt.kelurahan_name);
            $("#upd_namakecamatan").val(dt.kecamatan_name);
            $("#upd_namakota").val(dt.kota_name);
            $(".nm_kelurahan").html("<b>"+dt.kelurahan_name+"</b>");
        }

        function cancelUpdate() {
            $("#upd_namakelurahan").val("");
            $("#upd_namakecamatan").val("");
            $("#upd_namakota").val("");
            $(".nm_kelurahan").html("<b></b>");
        }

        function showdelete(value) {
            $("#mdlDelete").modal("show");
            var dt = JSON.parse(value);
            $("#del_idkelurahan").val(dt.id);
            $(".del_nm_kelurahan").html("<b>"+dt.kelurahan_name+"</b>");
        }

        function cancelDelete() {
            $("#del_idkelurahan").val("");
            $(".del_nm_kelurahan").html("<b></b>");
        }
    </script>
    @endsection