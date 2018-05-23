<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['header_title'] = 'Mahasiswa';
        $data['mahasiswa'] = Mahasiswa::paginate(10);

        return view('mahasiswa.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['header_title'] = 'Tambah Mahasiswa';
        $data['jurusan'] = Jurusan::all();

        return view('mahasiswa.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jurusan_id' => 'required|integer',
            'nama' => 'required',
            'nim' => 'required|digits:11',
            'jenis_kelamin' => 'required'
        ]);

        $requestData = $request->all();

        $mahasiswa = new Mahasiswa();
        $mahasiswa->jurusan_id = $requestData['jurusan_id'];
        $mahasiswa->nama = $requestData['nama'];
        $mahasiswa->nim = $requestData['nim'];
        $mahasiswa->jenis_kelamin = $requestData['jenis_kelamin'];
        //        $mahasiswa->fill($requestData);
        $mahasiswa->save();

        request()->session()->flash('status', 'Data berhasil disimpan');

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['header_title'] = 'Ubah Mahasiswa';
        $data['jurusan'] = Jurusan::all();
        $data['data'] = Mahasiswa::find($id);

        return view('mahasiswa.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jurusan_id' => 'required|integer',
            'nama' => 'required',
            'nim' => 'required|digits:11',
            'jenis_kelamin' => 'required'
        ]);

        $requestData = $request->all();

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->jurusan_id = $requestData['jurusan_id'];
        $mahasiswa->nama = $requestData['nama'];
        $mahasiswa->nim = $requestData['nim'];
        $mahasiswa->jenis_kelamin = $requestData['jenis_kelamin'];

//        $mahasiswa->fill($requestData);
        $mahasiswa->save();

        request()->session()->flash('status', 'Data berhasil diperbarui');

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();

        request()->session()->flash('status', 'Data berhasil dihapus');

        return redirect()->route('mahasiswa.index');
    }
}
