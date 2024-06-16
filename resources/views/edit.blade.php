@extends('layouts.app')
@section('content')
    <div class="bg-white p-5 shadow-lg rounded-lg w-1/2">
        <h1 class="text-2xl poppins-semibold">Edit Mahasiswa</h1>
        <form method="POST" action="{{ route('mahasiswa.update', ['mahasiswa' => $mahasiswa->id]) }}" class="mt-5"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                <input type="text" id="nim" name="nim"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                    required value="{{ $mahasiswa->nim }}" />
            </div>
            <div class="mb-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="nama" name="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                    required value="{{ $mahasiswa->nama }}" />
            </div>
            <div class="mb-5">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <textarea id="alamat" name="alamat" rows="4"
                    class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                    required>{{ $mahasiswa->alamat }}</textarea>
            </div>
            <div class="mb-5">
                <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                <select id="jurusan" name="jurusan"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                    <option>-- Pilih --</option>
                    <option @selected($mahasiswa->jurusan == 'Teknik Informatika')>Teknik Informatika</option>
                    <option @selected($mahasiswa->jurusan == 'Teknik Elektro')>Teknik Elektro</option>
                    <option @selected($mahasiswa->jurusan == 'Teknik Mesin')>Teknik Mesin</option>
                    <option @selected($mahasiswa->jurusan == 'Psikologi')>Psikologi</option>
                    <option @selected($mahasiswa->jurusan == 'Akutansi')>Akutansi</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Lama</label>
                <img class="w-[150px] h-[150px] object-cover" src="/storage/uploads/{{ $mahasiswa->foto }}" alt="">
            </div>
            <div class="mb-5">
                <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ubah Foto</label>
                <input id="foto" name="foto"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                    type="file">
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Simpan</button>
            </div>
        </form>
    </div>
@endsection
