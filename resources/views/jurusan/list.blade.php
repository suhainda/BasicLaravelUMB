@extends('layout')
@section('content')
    <div class="box">
        <div class="box-body">
            @if(session()->has('status'))
                <script>
                    alert('{{ session()->get('status') }}');
                </script>
            @endif()
            <button onclick="window.location='{{ route('jurusan.create') }}';" type="button" class="btn btn-success pull-right" style="margin-bottom: 20px;">Tambah Data</button>
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th style="width: 200px">Action</th>
                </tr>
                @forelse($jurusan as $k => $r_jurusan)
                <tr>
                    <td>{{ $k+1 }}.</td>
                    <td>{{ $r_jurusan->nama_jurusan }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" onclick="window.location='{{ route('jurusan.edit', $r_jurusan->id) }}'">Ubah</button>
                        <form action="{{ route('jurusan.destroy', $r_jurusan->id) }}" method="POST" style="display: inline;">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus {{ $r_jurusan->nama_jurusan }}?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Data Kosong</td>
                    </tr>
                @endforelse
            </table>
            {{ $jurusan->links() }}
        </div>
    </div>
    <!-- /.box -->
@endsection