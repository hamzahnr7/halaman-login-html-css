<?php
 
namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('pegawai')->insert([
            [
                'nama' => 'Anas Saipudin',
                'jabatan' => 'Staff',
                'umur' => 23,
                'alamat' =>
                    'Jl. Terusan Buah Batu No.227, Kujangsari, Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40287',
            ],
            [
                'nama' => 'Umar Syaifudin',
                'jabatan' => 'Manager',
                'umur' => 34,
                'alamat' =>
                    'Jl. Batununggal Indah IV No.17, Batununggal, Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40267',
            ],
            [
                'nama' => 'Budi Doremi',
                'jabatan' => 'Officer',
                'umur' => 20,
                'alamat' =>
                    'Angkringan Kang Al, Jl. Buah Batu No.144, Turangga, Kec. Lengkong, Kota Bandung, Jawa Barat 40265',
            ],
            [
                'nama' => 'Felicia Putri',
                'jabatan' => 'Secretary',
                'umur' => 23,
                'alamat' =>
                    'Jl. Soekarno Hatta Jl. Batununggal Indah IX No.2, Mengger,
                        Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40266',
            ],
            [
                'nama' => 'Gerin Lubis',
                'jabatan' => 'Officer',
                'umur' => 33,
                'alamat' => 'Jl. Telekomunikasi No.1, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40267',
            ],
            [
                'nama' => 'Udin Salafudin',
                'jabatan' => 'Staff',
                'umur' => 27,
                'alamat' => 'Jl. Margacinta No.98, Cijaura, Kec. Buahbatu, Kota Bandung, Jawa Barat 40287',
            ],
            [
                'nama' => 'Kirigaya Kazuto',
                'jabatan' => 'Leader',
                'umur' => 29,
                'alamat' => 'Jl. Banteng No.75, Turangga, Kec. Lengkong, Kota Bandung, Jawa Barat 40262',
            ],
            
        ]);
    }
}