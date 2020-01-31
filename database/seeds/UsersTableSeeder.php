<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();

        $pemdesRole = Role::where('name', 'Pemerintah Desa')->first();
        $lemdesRole = Role::where('name', 'Lembaga Desa')->first();
        $pendudukRole = Role::where('name', 'Penduduk')->first();
        $pengunjungRole = Role::where('name', 'Pengunjung')->first();

        $pemdes = User::create([
            'name'=> 'pemdes',
            'email' => 'pemdes@desa.id',
            'password' => Hash::make('password'),
            'nik' => mt_rand(1111111111111111,9999999999999999)
        ]);

        $lemdes = User::create([
            'name'=> 'lemdes',
            'email' => 'lemdes@desa.id',
            'password' => Hash::make('password'),
            'nik' => mt_rand(1111111111111111,9999999999999999)            
        ]);

        $penduduk = User::create([
            'name'=> 'penduduk',
            'email' => 'penduduk@desa.id',
            'password' => Hash::make('password'),
            'nik' => mt_rand(1111111111111111,9999999999999999)    
        ]);

        $pengunjung = User::create([
            'name'=> 'pengunjung',
            'email' => 'pengunjung@desa.id',
            'password' => Hash::make('password'),
            'nik' => mt_rand(1111111111111111,9999999999999999)    
        ]);

        $pemdes->roles()->attach($pemdesRole);
        $lemdes->roles()->attach($lemdesRole);
        $penduduk->roles()->attach($pendudukRole);
        $pengunjung->roles()->attach($pengunjungRole);
    }
}
