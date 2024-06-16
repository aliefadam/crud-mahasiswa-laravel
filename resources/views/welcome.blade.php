@extends('layouts.app')
@section('content')
    <h1 class="text-2xl poppins-semibold">Data Mahasiswa</h1>
    <div class="relative overflow-x-auto mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NIM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Mahasiswa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jurusan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $m)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $m->nim }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $m->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $m->alamat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $m->jurusan }}
                        </td>
                        <td class="px-6 py-4">
                            <img class="w-[100px] h-[100px] object-cover" src="/storage/uploads/{{ $m->foto }}"
                                alt="">
                        </td>
                        <td class="px-6 py-4 flex gap-3">
                            <a href="javascript:void(0)" class="btn-detail" data-modal-target="detail-modal"
                                data-modal-toggle="detail-modal" data-nim="{{ $m->nim }}"
                                data-nama="{{ $m->nama }}" data-alamat="{{ $m->alamat }}"
                                data-jurusan="{{ $m->jurusan }}" data-foto="{{ $m->foto }}">
                                <i class="fa-regular fa-eye text-xl hover:text-green-600"></i>
                            </a>
                            <a href="{{ route('mahasiswa.edit', ['mahasiswa' => $m->id]) }}">
                                <i class="fa-regular fa-pen-to-square text-xl hover:text-yellow-600"></i>
                            </a>
                            <a data-id="{{ $m->id }}" href="javascript:void(0)" data-modal-target="delete-modal"
                                data-modal-toggle="delete-modal" class="btn-delete">
                                <i class="fa-regular fa-trash text-xl hover:text-red-600"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="delete-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[9999] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="delete-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <form id="form-delete" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin
                            menghapus
                            data mahasiswa ini?</h3>
                        <button data-modal-hide="delete-modal" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Ya, Yakin!
                        </button>
                        <button data-modal-hide="delete-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak,
                            Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="detail-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Detail Mahasiswa
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="detail-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5 space-y-4">
                    <div class="flex flex-col gap-1">
                        <span class="poppins-medium">NIM</span>
                        <span id="nim-detail" class="poppins-semibold text-xl text-gray-500">1462100214</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="poppins-medium">Nama</span>
                        <span id="nama-detail" class="poppins-semibold text-xl text-gray-500">Alief Adam</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="poppins-medium">Jurusan</span>
                        <span id="jurusan-detail" class="poppins-semibold text-xl text-gray-500">Teknik Informatika</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="poppins-medium">Alamat</span>
                        <span id="alamat-detail" class="poppins-semibold text-xl text-gray-500">Surabaya</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="poppins-medium">Foto</span>
                        <img id="foto-detail" src="/storage/uploads/{{ $mahasiswa->first()->foto }}"
                            class="w-[100px] h-[100px] object-cover" alt="">
                    </div>
                </div>
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="detail-modal" type="button"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('more-script')
    <script>
        $(".btn-delete").on("click", showDeleteModal);
        $(".btn-detail").on("click", showDetailModal);

        function showDeleteModal() {
            const id = $(this).data("id");
            $("#form-delete").attr("action", `/mahasiswa/delete/${id}`);
        }

        function showDetailModal() {
            $("#nim-detail").text($(this).data("nim"));
            $("#nama-detail").text($(this).data("nama"));
            $("#jurusan-detail").text($(this).data("jurusan"));
            $("#alamat-detail").text($(this).data("alamat"));
            $("#foto-detail").attr("src", `/storage/uploads/${$(this).data("foto")}`)
        }
    </script>
@endsection
