<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $campaignIds = [1, 2, 3];
        $nominalOptions = [10000, 15000, 20000, 25000, 50000, 100000, 250000];
        $indonesianNames = [
            'Budi Santoso', 'Siti Aminah', 'Agus Wijoyo', 'Dewi Lestari', 'Eko Prasetyo',
            'Fitriani', 'Hadi Nugroho', 'Indah Permatasari', 'Joko Susilo', 'Lina Marlina',
            'Muhammad Ridwan', 'Nurul Hidayah', 'Rahmat Hidayat', 'Sri Wahyuni', 'Tri Hartanto',
            'Ahmad Fauzi', 'Aisyah Putri', 'Ali Akbar', 'Ana Fitria', 'Andi Setiawan',
            'Ani Suryani', 'Antonius Wibowo', 'Arif Rahman', 'Bayu Prakoso', 'Cahya Purnama',
            'Candra Gunawan', 'Citra Kirana', 'Dedi Supriadi', 'Dian Anggraini', 'Dimas Saputra',
            'Dina Handayani', 'Doni Irawan', 'Dwi Cahyono', 'Edi Santoso', 'Elisa Sari',
            'Endang Lestari', 'Fajar Nugraha', 'Farida Hanum', 'Fatmawati', 'Febrianto Kurniawan',
            'Gatot Subroto', 'Gita Permata', 'Gunawan Santoso', 'Hasan Basri', 'Hendra Wijaya',
            'Heru Susanto', 'Ika Wahyuni', 'Imam Hambali', 'Irfan Hakim', 'Ismail Marzuki',
            'Ivan Gunawan', 'Jajang Nurjaman', 'Jamaludin', 'Kartika Sari', 'Kevin Sanjaya',
            'Krisna Murti', 'Kusuma Wardani', 'Laila Sari', 'Leo Chandra', 'Lia Amelia',
            'Lukman Hakim', 'Maria Ulfa', 'Mega Utami', 'Mochammad Iqbal', 'Muchlis Hadi',
            'Nadia Santika', 'Nana Supriatna', 'Nanda Putra', 'Nia Ramadhani', 'Nina Agustina',
            'Novianti', 'Nuraini', 'Oktavia Sari', 'Putra Wijaya', 'Putri Ayu',
            'Qoriatul Aini', 'Rangga Saputra', 'Rani Puspita', 'Ratna Sari', 'Rendi Andika',
            'Rian Ardianto', 'Rina Nose', 'Rini Wulandari', 'Rio Dewanto', 'Rizki Amelia',
            'Rizky Billar', 'Robby Purba', 'Rudi Hartono', 'Sari Yulianti', 'Siska Amelia',
            'Slamet Riyadi', 'Soleh Solihun', 'Sugianto', 'Suharno', 'Sule Sutisna',
            'Supriyadi', 'Surya Insomnia', 'Susi Susanti', 'Tatang Sutarman', 'Taufik Hidayat',
            'Teguh Santoso', 'Tiara Andini', 'Tika Panggabean', 'Toni Firmansyah', 'Ujang Suherman',
            'Vicky Prasetyo', 'Vina Panduwinata', 'Wahyu Hidayat', 'Wawan Kurniawan', 'Wulan Guritno',
            'Yani Suryani', 'Yanto Basna', 'Yoga Pratama', 'Yudi Karyono', 'Zainal Abidin', 'Zaskia Adya Mecca'
        ];

        for ($i = 0; $i < 20; $i++) {
            $nominal = $nominalOptions[array_rand($nominalOptions)];
            $uniqueCode = rand(100, 999);
            $userName = $indonesianNames[array_rand($indonesianNames)];

            Transaction::create([
                'campaign_id' => $campaignIds[array_rand($campaignIds)],
                'user_id' => 1, // Assign to Super Admin
                'user_name' => $userName,
                'user_email' => $faker->email,
                'anonymous' => 1,
                'amount' => $nominal,
                'unique_code' => $uniqueCode,
                'total' => $nominal + $uniqueCode,
                'created_at' => $faker->dateTimeBetween('2025-01-01', '2025-06-30'),
                'status' => 'PAID',
            ]);
        }
    }
}
