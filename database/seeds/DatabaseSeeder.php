<?php

use App\Teknisi;
use App\Pelanggan;
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
        // $this->call(UserSeeder::class);

        Pelanggan::create([
            'id_pelanggan' => random_int(10000, 90000),
            'nm_pelanggan' => 'Ilham Maulana',
            'telp' => '0845342312',
            'alamat' => 'Padang'
        ]);
        Pelanggan::create([
            'id_pelanggan' => random_int(10000, 90000),
            'nm_pelanggan' => 'Budi',
            'telp' => '0845342312',
            'alamat' => 'Payakumbuh'
        ]);
        Teknisi::create([
            'id_teknisi' => random_int(40000, 90000),
            'nm_teknisi' => 'Andi',
            'telp' => '0845342312'
        ]);
    }
}
