<?php

namespace Database\Seeders;

use App\Models\CoverPage;
use App\Models\Information;
use App\Models\User;
use Developer;
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

        User::create([
            'name' => 'Fajar Setiawan',
            'gender' => 'Laki-laki',
            'address' => 'Bandengan RT 06 RW 02, Kabupaten Jepara, Jawa Tengah',
            'phone' => '6282131232210',
            'email' => 'Fajar@mail.com',
            'password' => bcrypt('password'),
            'role' => 1,
            'odd_name' => 'Dias Fadillah',
            'odd_gender' => 'Perempuan',
            'odd_age' => 24,
            'odd_stage' => 'Normal',
            'odd_description' => 'Tinggi badan 165 cm, kulit putih kecoklatan',
        ]);
        User::create([
            'name' => 'Zahra Hasanah',
            'gender' => 'Perempuan',
            'address' => 'Jalan Kebonsari Manunggal LVK IV/5, Jawa Timur',
            'phone' => '6282131232210',
            'email' => 'zahra.hasanah@gmail.com',
            'password' => bcrypt('password'),
            'odd_name' => 'Hilda Handayani',
            'odd_gender' => 'Perempuan',
            'odd_age' => 56,
            'odd_stage' => 'Ringan',
            'odd_description' => 'Tinggi 152, kulit putih kecoklatan, memili tanda lahir di lengan sebelah kiri',
        ]);
        User::create([
            'name' => 'Nasab Hardiansyah',
            'gender' => 'Laki-laki',
            'address' => 'Jalan H Samanhudi No 14, Dki Jakarta',
            'phone' => '6282131232210',
            'email' => 'nasab.hardiansyah@gmail.com',
            'password' => bcrypt('password'),
            'odd_name' => 'Harsaya Hutasoit',
            'odd_gender' => 'Perempuan',
            'odd_age' => 53,
            'odd_stage' => 'Sedang',
            'odd_description' => 'Tinggi badan 160 cm, kulit sawo matang, jalan agak bungkuk',
        ]);
        User::create([
            'name' => 'Farah Nurdiyanti',
            'gender' => 'Perempuan',
            'address' => 'Jalan Pakis Tirtosari XVIII/1, Jawa Timur',
            'phone' => '6282131232210',
            'email' => 'farah.nurdiyanti@gmail.com',
            'password' => bcrypt('password'),
            'odd_name' => 'Jaeman Waluyo',
            'odd_gender' => 'Laki-laki',
            'odd_age' => 57,
            'odd_stage' => 'Gangguan Kognitif Ringan',
            'odd_description' => 'Tinggi badan 165 cm, kulit sawo matang, rambut jarang/tipis, mempunyai tanda lahir di kaki kiri',
        ]);
        User::create([
            'name' => 'Lutfan Pradana',
            'gender' => 'Laki-laki',
            'address' => 'Jalan Jend Urip Sumoharjo 63 A, Jawa Tengah',
            'phone' => '6282131232210',
            'email' => 'lutfan.pradana@gmail.com',
            'password' => bcrypt('password'),
            'odd_name' => 'Titi Anggraini',
            'odd_gender' => 'Perempuan',
            'odd_age' => 53,
            'odd_stage' => 'Ringan',
            'odd_description' => 'Tinggi badan 156, kulit putih, rambut putih sebahu',
        ]);
        User::create([
            'name' => 'Cahya Nashiruddin',
            'gender' => 'Laki-laki',
            'address' => 'Perum Tmn Griya Indah C-143, Jawa Tengah',
            'phone' => '6282131232210',
            'email' => 'cahya.nashiruddin@gmail.com',
            'password' => bcrypt('password'),
            'odd_name' => 'Rahmi Wijayanti',
            'odd_gender' => 'Perempuan',
            'odd_age' => 72,
            'odd_stage' => 'Sedang',
            'odd_description' => 'Tinggi badan 160 cm, kulit sawo matang, jalan agak bungkuk',
        ]);
        User::create([
            'name' => 'Silvia Nasyidah',
            'gender' => 'Perempuan',
            'address' => 'Jalan Letjen Sutoyo 85 RT 02/01, Jawa Timur',
            'phone' => '6282131232210',
            'email' => 'silvia.nasyidah@gmail.com',
            'password' => bcrypt('password'),
            'odd_name' => 'Soleh Sinaga',
            'odd_gender' => 'Laki-laki',
            'odd_age' => 55,
            'odd_stage' => 'Lupa Sewajarnya',
            'odd_description' => 'Tinggi badan 165 cm, kulit sawo matang, rambut jarang/tipis',
        ]);
        User::create([
            'name' => 'Mustofa Putra',
            'gender' => 'Laki-laki',
            'address' => 'Jalan Karang Tineung Dlm 32 A Bl 181, Jawa Barat',
            'phone' => '6282131232210',
            'email' => 'mustofa.putra@gmail.com',
            'password' => bcrypt('password'),
            'odd_name' => 'Doni Nugroho',
            'odd_gender' => 'Laki-laki',
            'odd_age' => 68,
            'odd_stage' => 'Sedang',
            'odd_description' => '',
        ]);
        User::create([
            'name' => 'Samsul Kurniawan',
            'gender' => 'Laki-laki',
            'address' => 'Jalan Ketintang Madya 63, Jawa Timur',
            'phone' => '6282131232210',
            'email' => 'samsul.kurniawan@gmail.com',
            'password' => bcrypt('password'),
            'odd_name' => 'Halima Hastuti',
            'odd_gender' => 'Perempuan',
            'odd_age' => 56,
            'odd_stage' => 'Sedang Berat',
            'odd_description' => 'Tinggi 152, kulit putih, jalan agak pincang sebelah kiri',
        ]);
        User::create([
            'name' => 'Ulva Rahimah',
            'gender' => 'Perempuan',
            'address' => 'Jalan Cipinang Cempedak II 14, Dki Jakarta',
            'phone' => '6282131232210',
            'email' => 'ulva.rahimah@gmail.com',
            'password' => bcrypt('password'),
            'odd_name' => 'Usman Budiman',
            'odd_gender' => 'Laki-laki',
            'odd_age' => 64,
            'odd_stage' => 'Sedang',
            'odd_description' => 'Tinggi badan 160 cm, kulit sawo matang, jalan bungkuk',
        ]);
        User::create([
            'name' => 'Dinda Puspita',
            'gender' => 'Perempuan',
            'address' => 'Jalan Kol. HR. Hadijanto blok A.22, Jawa Tengah',
            'phone' => '6282131232210',
            'email' => 'dinda.puspita@gmail.com',
            'password' => bcrypt('password'),
            'odd_name' => 'Mutia Mandasari',
            'odd_gender' => 'Perempuan',
            'odd_age' => 62,
            'odd_stage' => 'Sedang',
            'odd_description' => 'Tinggi 152, kulit putih kecoklatan, memili tanda lahir di lengan sebelah kiri',
        ]);

        CoverPage::create(['title' => 'Sistem Informasi Alzheimer', 'description' => 'Bersama Bantu Keluarga Orang Dengan Demensia Menemukan Keluarganya']);
    }
}
