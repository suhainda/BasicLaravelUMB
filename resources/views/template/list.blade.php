@extends('layout')
@section('content')
    <div class="box">
        <div class="box-body">
            <button type="button" class="btn btn-success pull-right" style="margin-bottom: 20px;">Tambah Data</button>
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th style="width: 200px">Action</th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>ABCD</td>
                    <td>
                        <button type="button" class="btn btn-warning">Ubah</button>
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>EFGH</td>
                    <td>
                        <button type="button" class="btn btn-warning">Ubah</button>
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>IJKL</td>
                    <td>
                        <button type="button" class="btn btn-warning">Ubah</button>
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!-- /.box -->
@endsection