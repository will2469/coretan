<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create(['name' => 'Pemerintah Desa']);
        Role::create(['name' => 'Lembaga Desa']);
        Role::create(['name' => 'Penduduk']);
        Role::create(['name' => 'Pengunjung']);
    }
}
