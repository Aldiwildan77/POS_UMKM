<?php

namespace Database\Seeders;

use App\Models\detailTransaksi;
use App\Models\fraktur;
use App\Models\karyawan;
use App\Models\laporan;
use App\Models\menu;
use App\Models\operasional;
use App\Models\resep;
use App\Models\stok_bahan;
use App\Models\stok_bahan_detail;
use App\Models\stok_jadi;
use App\Models\tranksaksi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) { 
            fraktur::create([
                'foto' => $faker->imageUrl(360, 360, 'fraktur', true)
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            operasional::create([
                'keterangan' => $faker->sentence(3),
                'biaya' =>  $faker->randomNumber(5, true),
                'tanggal' => $faker->dateTimeBetween('-1 week', '+1 week'),
                'fraktur_id' => $faker->randomElement(['1', '2', '3','4','5'])
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            laporan::create([
                'jenis' => $faker->word(),
                'periode' =>  $faker->monthName(),
                'pemasukan' => $faker->randomNumber(6, true),
                'operasional_id' => $faker->randomDigitNotNull()
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            menu::create([
                'nama' => $faker->word(),
                'harga' => $faker->randomNumber(5, true),
                'foto' => $faker->imageUrl(360, 360, 'food', true),
                'status' => '1'
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            karyawan::create([
                'nama' => $faker->name(),
                'nohp' => '08'.$faker->randomNumber(9, true),
                'email' => $faker->email(),
                'gaji' => $faker->randomNumber(6, true),
                'status' => '1'
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            stok_bahan::create([
                'nama' => $faker->word()
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            stok_bahan_detail::create([
                'jumlah' => $faker->randomNumber(5, true),
                'tgl_beli' => $faker->date(),
                'stok_bahan_id' => $faker->randomDigit(),
                'fraktur_id' => $faker->randomElement(['1', '2', '3','4','5'])
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            resep::create([
                'stok_bahan_id' => $faker->randomDigit(),
                'jumlah' => $faker->randomDigitNotNull(),
                'menu_id' => $faker->randomDigitNotNull()
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            stok_jadi::create([
                'jumlah' => $faker->randomDigitNotNull(),
                'tgl_produksi' => $faker->date(),
                'menu_id' => $faker->randomDigitNotNull()
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            tranksaksi::create([
                'id' => '2021'.$i,
                'metode' => $faker->randomElement(['cash', 'transfer', 'ovo', 'gopay']),
                'nominal' => $faker->numerify('#####'),
                'nama' => $faker->name(),
                'no_hp' => '08'.$faker->numerify('#########').'',
                'alamat' => $faker->streetAddress(),
                'status' => $faker->randomElement(['1', '2', '3'])
            ]);
        }

        for ($i=0; $i < 15; $i++) { 
            detailTransaksi::create([
                'id' => '2021'.$i,
                'qty' => $faker->randomDigitNotNull(),
                'sub_total' => $faker->numerify('#####'),
                'transaksi_id' => '2021'.$faker->randomDigit(),
                'menu_id' => $faker->randomDigitNotNull()
            ]);
        }

        User::create([
            'id' => '2021001',
            'username' => 'superadmin',
            'password' => 'adminpass',
            'status' => '1',
            'level' => '1',
            'karyawan_id' => '10'
        ]);

        User::create([
            'id' => '2021002',
            'username' => 'userKasir',
            'password' => 'kasirpass',
            'status' => '1',
            'level' => '0',
            'karyawan_id' => '2'
        ]);

        
        

    }
}
