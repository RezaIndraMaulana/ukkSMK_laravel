<?php

namespace App\Http\Controllers;

use App\Exports\GedungExport;
use App\Gedung;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil data max 10
        $data = Gedung::paginate(10);

        //membuat variable tampil yang diisi dengan data
        $tampil['data'] = $data;

        //tampilkan resources/views/kelas/index.blade.php beserta variabel tampil 
        return view("gedung.index", $tampil);
    }

    //export
    public function export(){
        return Excel::download(new GedungExport, 'gedung.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tampilkan resources/views/kelas/create.blade.php 
        return view("gedung.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi inputan
        // $this->validate($request, [
        //     'kode_gedung' => 'required',
        //     'nama_gedung' => 'required|unique:gedung',
        //     'deskripsi_gedung' => 'required'
        // ]);
        $data = Gedung::create($request->all());
        return redirect()->route("gedung.index")->with(
            "success",
            "Data berhasil disimpan."
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($gedu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($gedu)
    {
        $data = Gedung::findOrFail($gedu);
        //tampilkan resources/views/kelas/edit.blade.php 
        return view("gedung.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gedu)
    {
        //validasi inputan 
        $this->validate($request, [
            'kode_gedung' => 'required',
            'nama_gedung' => 'required',
            'deskripsi_gedung' => 'required'
        ]);
        $data = Gedung::findOrFail($gedu);
        $data->kode_gedung = $request->kode_gedung;
        $data->nama_gedung = $request->nama_gedung;
        $data->deskripsi_gedung = $request->deskripsi_gedung;
        $data->save();

        return redirect()->route("gedung.index")->with(
            "success",
            "Data berhasil diubah."
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gedu)
    {
        $data = Gedung::findOrFail($gedu);
        $data->delete();
    }
}
