@extends('layout.header')

    @section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Data pasien</h4>
            <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah Data</button>
        </div>
        <div class="card-body">

            <?php
                // print_r("<pre>");
                // print_r($list_pasien->toArray());
                // exit();
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">ID Pasien</th>
                        <th class="text-center">Nama Pasien</th>
                        <th class="text-center">Tanggal Lahir</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Alamat Pasien</th>
                        <th class="text-center">Nomor Telepon</th>
                        <th class="text-center">RT/RW</th>
                        <th class="text-center">Kelurahan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_pasien as $key => $value)
                        <tr>
                            <td class="text-center">{{$key+1}}</td>
                            <td class="text-left">{{$value->id_pasien}}</td>
                            <td class="text-left">{{$value->nama_pasien}}</td>
                            <td class="text-left">{{$value->tanggal_lahir}}</td>
                            <td class="text-left">{{$value->jenis_kelamin}}</td>
                            <td class="text-left">{{$value->alamat_pasien}}</td>
                            <td class="text-left">{{$value->telepon}}</td>
                            <td class="text-left">{{$value->rt}} / {{$value->rw}}</td>
                            <td class="text-left">{{$value->kelurahan_name}}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="/generate-kartu/{{$value->id_pasien}}" target="__blank" type="button" class="btn btn-info">Cetak Kartu</a>
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
                    <h5 class="modal-title" id="modalAddLabel">Add Data pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/save_pasien" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="namapasien">Nama pasien</label>
                            <input type="text" class="form-control form-control-sm" id="namapasien" name="namapasien" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="tanggallahir">Tanggal Lahir</label>
                            <input type="date" class="form-control form-control-sm" id="tanggallahir" name="tanggallahir" required>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select type="text" class="form-control form-control-sm" id="jeniskelamin" name="jeniskelamin" required>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="nomortelepon">Nomor Telepon</label>
                            <input type="number" class="form-control form-control-sm" id="nomortelepon" name="nomortelepon" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="rt">RT</label>
                                    <input type="text" class="form-control form-control-sm" id="rt" name="rt" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="rw">RW</label>
                                    <input type="text" class="form-control form-control-sm" id="rw" name="rw" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan</label>
                            <select type="text" class="form-control form-control-sm" id="kelurahan" name="kelurahan" required>
                                <option value="" selected>-- Pilih Kelurahan --</option>
                                @foreach ($list_kelurahan as $k => $val)
                                    <option value="{{$val->id}}">{{$val->kelurahan_name}}</option>
                                @endforeach
                            </select>
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

    <script>

    </script>
    @endsection