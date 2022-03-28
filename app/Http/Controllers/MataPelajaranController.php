<?php

namespace App\Http\Controllers;

use App\MataPelajaran;
use Illuminate\Http\Request;
use App\Jurusan;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mata_pelajarans = MataPelajaran::all();
        return view('matapelajaran.index', [
            'matapelajarans' => $mata_pelajarans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('matapelajaran.create', [
            'jurusans' => $jurusans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'id_jurusan' => 'required|integer',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ])->validate();

        $mata_pelajaran = new MataPelajaran($validatedData);
        $mata_pelajaran->save();


        return redirect(route('daftarMapel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(MataPelajaran $mapel)
    {
        $jurusans = Jurusan::all();
        return view('matapelajaran.edit', [
            'matapelajaran' => $mapel,
            'jurusans' => $jurusans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MataPelajaran $mapel)
    {
        $validatedData = validator($request->all(), [
            'id_jurusan' => 'required|integer',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ])->validate();

        $mapel->id_jurusan = $validatedData['id_jurusan'];
        $mapel->nama = $validatedData['nama'];
        $mapel->deskripsi = $validatedData['deskripsi'];
        $mapel->save();

        return redirect(route('daftarMapel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(MataPelajaran $mapel)
    {
        $mapel->delete();
        return redirect(route('daftarMapel'));
    }
}
