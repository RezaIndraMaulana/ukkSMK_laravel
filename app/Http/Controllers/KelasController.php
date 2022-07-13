<?php

namespace App\Http\Controllers;

use App\Exports\KelasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Kelas;
use App\Gedung;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil data max 10 
        $data = Kelas::paginate(10);

        //membuat variabel tampil yang diisi dengan data 
        foreach ($data as $item) {
            $item->gedung = Gedung::find($item->id_gedung);
        }
        $tampil['data'] = $data;

        //tampilkan resources/views/kelas/index.blade.php beserta variabel tampil 
        return view("kelas.index", $tampil);
    }

    //export
    public function export(){
        return Excel::download(new KelasExport, 'kelas.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tampilkan resources/views/kelas/create.blade.php 
        $gedung = Gedung::get();
        foreach ($gedung as $item) {
            $item->option = $item->id_gedung . " " . $item->nama_gedung;
        }
        $data['gedung'] = Gedung::get();
        return view("kelas.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi inputan 
        $this->validate($request, [
            'nama_kelas' => 'required|unique:kelas',
            'kompetensi_keahlian' => 'required',
            'id_gedung' => 'required'
        ]);

        $data = Kelas::create($request->all());
        return redirect()->route("kelas.index")->with(
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
    public function show($kela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kela)
    {
        $data = Kelas::findOrFail($kela);
        $gedung = Gedung::get();
        foreach ($gedung as $item) {
            $item->option = $item->id_gedung . " " . $item->nama_gedung;
        }
        //tampilkan resources/views/kelas/edit.blade.php 
        return view("kelas.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kela)
    {
        //validasi inputan 
        $this->validate($request, [
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
            'id_gedung' => 'required'
        ]);

        $data = Kelas::findOrFail($kela);
        $data->nama_kelas = $request->nama_kelas;
        $data->kompetensi_keahlian = $request->kompetensi_keahlian;
        $data->id_gedung = $request->id_gedung;

        $data->save();

        return redirect()->route("kelas.index")->with(
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
    public function destroy($kela)
    {
        $data = Kelas::findOrFail($kela);
        $data->delete();
    }
}
