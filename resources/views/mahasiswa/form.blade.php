@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="box">
                <form class="form-horizontal" action="{{ isset($data) ? route('mahasiswa.update', $data->id) : route('mahasiswa.store') }}"
                      method="POST">
                    {{ csrf_field() }}
                    {{ isset($data) ? method_field('PUT') : ''  }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="jurusan" class="col-sm-2 control-label">Jurusan</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="jurusan" name="jurusan_id">
                                    <option value="">-- Pilih Jurusan --</option>
                                    @forelse($jurusan as $r_jurusan)
                                        <option value="{{ $r_jurusan->id }}" {{ isset($data) && $data->jurusan->id = $r_jurusan->id ? 'selected' : '' }}>{{ $r_jurusan->nama_jurusan }}</option>
                                    @empty
                                        <option disabled selected>Data Jurusan masih kosong</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-sm-2 control-label">Nama</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama"
                                       value="{{ isset($data) ? $data->nama : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nim" class="col-sm-2 control-label">NIM</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nim" placeholder="NIM (ex: 41517010001)" name="nim"
                                       value="{{ isset($data) ? $data->nim : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenisKelamin" class="col-sm-2 control-label">Jenis Kelamin</label>

                            <div class="col-sm-5">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="jenis_kelamin" id="jenisKelamin1" value="L"
                                                {{ isset($data) && $data->jenis_kelamin == 'L' ? 'checked' : '' }}>
                                        Laki-Laki
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="jenis_kelamin" id="jenisKelamin2" value="P"
                                                {{ isset($data) && $data->jenis_kelamin == 'P' ? 'checked' : '' }}>
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" class="btn btn-default" onclick="history.back(-1);">Kembali</button>
                        <button type="submit" class="btn btn-info pull-right">{{ isset($data) ? 'Perbarui' : 'Simpan' }}</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection