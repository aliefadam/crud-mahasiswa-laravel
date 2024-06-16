<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            "nim" => "123123",
            "nama" => "Abdul Rohman",
            "alamat" => "Jl. Bandung No 45",
            "jurusan" => "Teknik Informatika",
            "foto" => "user-01.png",
        ]);

        Mahasiswa::create([
            "nim" => "234234",
            "nama" => "Siti Aisyah",
            "alamat" => "Jl. Jakarta No 12",
            "jurusan" => "Psikologi",
            "foto" => "user-02.png",
        ]);

        Mahasiswa::create([
            "nim" => "345345",
            "nama" => "Budi Santoso",
            "alamat" => "Jl. Surabaya No 8",
            "jurusan" => "Teknik Mesin",
            "foto" => "user-03.png",
        ]);

        Mahasiswa::create([
            "nim" => "456456",
            "nama" => "Dewi Rahayu",
            "alamat" => "Jl. Yogyakarta No 21",
            "jurusan" => "Akutansi",
            "foto" => "user-04.png",
        ]);

        Mahasiswa::create([
            "nim" => "567567",
            "nama" => "Adi Nugroho",
            "alamat" => "Jl. Medan No 17",
            "jurusan" => "Teknik Elektro",
            "foto" => "user-05.png",
        ]);

        Mahasiswa::create([
            "nim" => "678678",
            "nama" => "Lia Puspitasari",
            "alamat" => "Jl. Semarang No 9",
            "jurusan" => "Teknik Informatika",
            "foto" => "user-06.png",
        ]);

        Mahasiswa::create([
            "nim" => "789789",
            "nama" => "Agus Salim",
            "alamat" => "Jl. Denpasar No 3",
            "jurusan" => "Psikologi",
            "foto" => "user-07.png",
        ]);

        Mahasiswa::create([
            "nim" => "890890",
            "nama" => "Rini Setiawan",
            "alamat" => "Jl. Malang No 14",
            "jurusan" => "Akutansi",
            "foto" => "user-08.png",
        ]);

        Mahasiswa::create([
            "nim" => "901901",
            "nama" => "Feriawan Susanto",
            "alamat" => "Jl. Padang No 6",
            "jurusan" => "Teknik Mesin",
            "foto" => "user-09.png",
        ]);

        Mahasiswa::create([
            "nim" => "012012",
            "nama" => "Anita Wulandari",
            "alamat" => "Jl. Palembang No 27",
            "jurusan" => "Teknik Elektro",
            "foto" => "user-10.png",
        ]);
    }
}
