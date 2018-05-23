<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['header_title'] = 'Jurusan';
        $data['jurusan'] = Jurusan::paginate(10);

        return view('jurusan.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['header_title'] = 'Tambah Jurusan';

        return view('jurusan.form', $data);
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
            'nama_jurusan' => 'required'
        ]);

        $requestData = $request->all();

        $jurusan = new Jurusan();
        $jurusan->nama_jurusan = $requestData['nama_jurusan'];
        $jurusan->save();

        request()->session()->flash('status', 'Data berhasil disimpan');

        return redirect()->route('jurusan.index');
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
        $data['header_title'] = 'Ubah Jurusan';
        $data['data'] = Jurusan::find($id);

        return view('jurusan.form', $data);
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
            'nama_jurusan' => 'required'
        ]);

        $requestData = $request->all();

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->nama_jurusan = $requestData['nama_jurusan'];
        $jurusan->save();

        request()->session()->flash('status', 'Data berhasil diperbarui');

        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jurusan::find($id)->delete();

        request()->session()->flash('status', 'Data berhasil dihapus');

        return redirect()->route('jurusan.index');
    }
}
