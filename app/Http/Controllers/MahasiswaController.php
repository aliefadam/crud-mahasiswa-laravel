<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view("welcome", [
            "title" => "Data Mahasiswa",
            "mahasiswa" => Mahasiswa::all(),
        ]);
    }

    public function create()
    {
        return view("create", [
            "title" => "Tambah Mahasiswa",
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'foto' => 'required|file|mimes:jpg,png,jpeg'
        ], [
            'nim.required' => 'NIM harus diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.unique' => 'NIM Telah digunakan',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.string' => 'Alamat harus berupa string.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'jurusan.required' => 'Jurusan harus diisi.',
            'jurusan.string' => 'Jurusan harus berupa string.',
            'jurusan.max' => 'Jurusan maksimal 255 karakter.',
            'foto.required' => 'Foto harus diunggah.',
            'foto.file' => 'Foto harus berupa file.',
            'foto.mimes' => 'Foto harus berekstensi jpg, png, atau jpeg.',
        ]);

        $foto = $request->file("foto");
        $namaFoto = date("YmdHis") . "." . $foto->extension();
        $foto->storeAs("public/uploads", $namaFoto);

        Mahasiswa::create([
            "nim" => $request->nim,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "jurusan" => $request->jurusan,
            "foto" => $namaFoto,
        ]);

        return redirect()->route("mahasiswa.index")->with("message", [
            "jenis" => "success",
            "pesan" => "Berhasil Menambah Data Mahasiswa",
        ]);
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        if (Gate::denies('update-mahasiswa', $mahasiswa)) {
            return redirect()->back()->with("message", [
                "jenis" => "error",
                "pesan" => "Anda tidak diizinkan untuk melakukan edit",
            ]);
        }

        return view("edit", [
            "title" => "Edit Mahasiswa",
            "mahasiswa" => $mahasiswa
        ]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'foto' => 'nullable|file|mimes:jpg,png,jpeg'
        ], [
            'nim.required' => 'NIM harus diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.unique' => 'NIM Telah digunakan',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa string.',
            'nama.max' => 'Nama maksimal 255 karakter.',
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.string' => 'Alamat harus berupa string.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'jurusan.required' => 'Jurusan harus diisi.',
            'jurusan.string' => 'Jurusan harus berupa string.',
            'jurusan.max' => 'Jurusan maksimal 255 karakter.',
            'foto.file' => 'Foto harus berupa file.',
            'foto.mimes' => 'Foto harus berekstensi jpg, png, atau jpeg.',
        ]);

        $dataUpdate = [
            "nim" => $request->nim,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "jurusan" => $request->jurusan,
        ];

        if ($request->hasFile('foto')) {
            $foto = $request->file("foto");
            $namaFoto = date("YmdHis") . "." . $foto->extension();
            $foto->storeAs("public/uploads", $namaFoto);
            if ($mahasiswa->foto) {
                Storage::delete("public/uploads/" . $mahasiswa->foto);
            }
            $dataUpdate["foto"] = $namaFoto;
        }

        $mahasiswa->update($dataUpdate);
        return redirect()->route("mahasiswa.index")->with("message", [
            "jenis" => "success",
            "pesan" => "Berhasil Merubah Data Mahasiswa",
        ]);
    }

    public function delete(Mahasiswa $mahasiswa)
    {
        if (Gate::denies('delete-mahasiswa', $mahasiswa)) {
            return redirect()->back()->with("message", [
                "jenis" => "error",
                "pesan" => "Anda tidak diizinkan untuk melakukan hapus",
            ]);
        }

        $mahasiswa->delete();
        if ($mahasiswa->foto) {
            Storage::delete("public/uploads/" . $mahasiswa->foto);
        }
        return redirect()->route("mahasiswa.index")->with("message", [
            "jenis" => "success",
            "pesan" => "Berhasil Menghapus Data Mahasiswa",
        ]);
    }

    public function denied_action()
    {
        return redirect()->back()->with("message", [
            "jenis" => "error",
            "pesan" => "Anda tidak diizinkan untuk melakukan hapus",
        ]);
    }
}
