<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    public function create()
    {
      return view('siswa.create');
    }

    public function store(Request $request)
    {
      $siswa = new Siswa;
      $siswa->nis = $request->nis;
      $siswa->nama = $request->nama;
      $siswa->kelas = $request->kelas;
      $siswa->save();

      $data = Siswa::all();
      return response()->json(['success' => 1, 'message' => 'Data Siswa Berhasil Ditambahkan!', 'html' => view('siswa.table', compact('data'))->render()]);
    }

    public function edit($id)
    {
      $data = Siswa::findOrFail($id);
      return view('siswa.edit', compact('data'));
    }

    public function update(Request $request)
    {
      $id = $request->id;
      $siswa = Siswa::findOrFail($id);
      $siswa->nis = $request->nis;
      $siswa->nama = $request->nama;
      $siswa->kelas = $request->kelas;
      $siswa->save();

      $data = Siswa::all();
      return response()->json(['success' => 1, 'message' => 'Data Siswa Berhasil Diubah!', 'html' => view('siswa.table', compact('data'))->render()]);
    }

    public function delete($id)
    {
      $siswa = Siswa::findOrFail($id);
      $siswa->delete();

      $data = Siswa::all();
      return response()->json(['success' => 1, 'message' => 'Data Siswa Berhasil Dihapus!', 'html' => view('siswa.table', compact('data'))->render()]);
    }
}
