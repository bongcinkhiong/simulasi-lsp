<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jadwal;
use App\Models\Kota;
use App\Models\Maskapai;
use App\Models\Rute;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'nama_lengkap' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        User::create([
            'nama_lengkap' => 'petugas',
            'username' => 'petugas',
            'password' => bcrypt('petugas'),
            'role' => 'petugas',
        ]);

        User::create([
            'nama_lengkap' => 'pengguna',
            'username' => 'pengguna',
            'password' => bcrypt('pengguna'),
            'role' => 'pengguna',
        ]);

        Maskapai::create([
            'nama_maskapai' => 'Garuda',
            'kapasitas' => '3',
            'logo_maskapai' => 'foto1.png',
        ]);

        Maskapai::create([
            'nama_maskapai' => 'Garudi',
            'kapasitas' => '2',
            'logo_maskapai' => 'foto1.png',
        ]);

        Kota::create([
            'nama_kota' => 'Bandung',
        ]);

        Kota::create([
            'nama_kota' => 'Jakarta',
        ]);

        Kota::create([
            'nama_kota' => 'Jawa',
        ]);

        Kota::create([
            'nama_kota' => 'Konoha',
        ]);

        Rute::create([
            'maskapai_id' => '2',
            'rute_asal' => 'Jawa',
            'rute_tujuan' => 'Konoha',
            'tanggal_pergi' => '2009-02-10',
        ]);
        Rute::create([
            'maskapai_id' => '1',
            'rute_asal' => 'Jakarta',
            'rute_tujuan' => 'bandung',
            'tanggal_pergi' => '2004-02-10',
        ]);

        Jadwal::create([
            'rute_id' => '1',
            'waktu_tiba' => '09:00',
            'waktu_berangkat' => '22:00',
            'harga' => '2200',
        ]);

        Jadwal::create([
            'rute_id' => '2',
            'waktu_tiba' => '02:00',
            'waktu_berangkat' => '12:00',
            'harga' => '29900',
        ]);
    }
}
