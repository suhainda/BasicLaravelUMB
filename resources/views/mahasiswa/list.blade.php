@extends('layout')
@section('content')
    <div class="box">
        <div class="box-body">
            @if(session()->has('status'))
                <script>
                    alert('{{ session()->get('status') }}');
                </script>
            @endif()
            <button onclick="window.location='{{ route('mahasiswa.create') }}';" type="button" class="btn btn-success pull-right" style="margin-bottom: 20px;">Tambah Data</button>
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th style="width: 200px">Action</th>
                </tr>
                @forelse($mahasiswa as $k => $r_mahasiswa)
                <tr>
                    <td>{{ $k+1 }}.</td>
                    <td>{{ $r_mahasiswa->nama }}</td>
                    <td>{{ $r_mahasiswa->nim }}</td>
                    <td>{{ $r_mahasiswa->jurusan->nama_jurusan }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" onclick="window.location='{{ route('mahasiswa.edit', $r_mahasiswa->id) }}'">Ubah</button>
                        <form action="{{ route('mahasiswa.destroy', $r_mahasiswa->id) }}" method="POST" style="display: inline;">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus {{ $r_mahasiswa->nama }}?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Data Kosong</td>
                    </tr>
                @endforelse
            </table>
                {{ $mahasiswa->links() }}
        </div>
    </div>
    <!-- /.box -->
@endsection