<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

use App\Http\Requests;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate(10);
        return view('mahasiswa.index', ['mahasiswas' => $mahasiswa]);
    }

    public function tambahMahasiswa()
    {
        return view('mahasiswa.create');
    }

    public function simpanMahasiswa(Request $request)
    {

        $this->validate($request, [
            'npm' => 'required|max:8',
            'nama' => 'required|max:50',
            'kelas' => 'required|max:6',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
        ]);

        $mahasiswa = new Mahasiswa;

        $mahasiswa->npm = $request->npm;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->alamat = $request->alamat;

        $mahasiswa->save();

        return redirect('Mahasiswa');
    }
}
