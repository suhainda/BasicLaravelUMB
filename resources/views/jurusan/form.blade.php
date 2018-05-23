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
                <form class="form-horizontal" action="{{ isset($data) ? route('jurusan.update', $data->id) : route('jurusan.store') }}"
                      method="POST">
                    {{ csrf_field() }}
                    {{ isset($data) ? method_field('PUT') : '' }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputText1" class="col-sm-2 control-label">Nama Jurusan</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText1" placeholder="Nama Jurusan" name="nama_jurusan"
                                       value="{{ isset($data) ? $data->nama_jurusan : '' }}">
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