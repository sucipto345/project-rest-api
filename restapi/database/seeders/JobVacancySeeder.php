<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobVacancy;
use Illuminate\Support\Facades\Hash;

class JobVacancySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Create Sample Dummy Users Array
    $JobVacancy = [
      [
        'id' => '1',
        'job_category_id' => '1',
        'company' => 'PT Teknologi Nusantara',
        'address' => 'Jalan Jendral Sudirman No. 45, Jakarta Pusat, DKI Jakarta 10220',
        'description' => 'PT Teknologi Nusantara adalah perusahaan yang bergerak dalam bidang Computing dan CTI (Computer Telephony Integration). Kami menyediakan solusi teknologi informasi canggih dan inovatif untuk meningkatkan efisiensi bisnis dan komunikasi perusahaan Anda. Layanan kami mencakup pengembangan perangkat lunak, integrasi sistem, serta layanan konsultasi IT.'
      ],
      [
        'id' => '2',
        'job_category_id' => '2',
        'company' => 'PT Konstruksi Mandiri Sejahtera',
        'address' => 'Jalan Gatot Subroto No. 99, Surabaya, Jawa Timur 60234',
        'description' => 'PT Konstruksi Mandiri Sejahtera adalah perusahaan yang bergerak dalam bidang Construction and Building. Kami spesialis dalam pembangunan gedung bertingkat, perumahan, dan infrastruktur publik. Dengan tim profesional dan berpengalaman, kami berkomitmen untuk memberikan hasil konstruksi berkualitas tinggi yang memenuhi standar keselamatan dan kenyamanan.
'
      ],
      [
        'id' => '3',
        'job_category_id' => '3',
        'company' => 'PT Lingkungan Satwa Lestari',
        'address' => 'Jalan Diponegoro No. 76, Bandung, Jawa Barat 40132',
        'description' => 'PT Lingkungan Satwa Lestari adalah perusahaan yang bergerak dalam bidang Animal Land and Environment. Kami berfokus pada konservasi satwa dan pengelolaan lingkungan. Layanan kami meliputi penyediaan lahan konservasi, rehabilitasi habitat, serta edukasi lingkungan. Kami berkomitmen untuk menjaga keseimbangan ekosistem dan keberlanjutan alam Indonesia..'
      ],
      [
        'id' => '4',
        'job_category_id' => '4',
        'company' => 'PT Seni Rupa dan Kerajinan Nusantara',
        'address' => 'Jalan Sultan Agung No. 12, Yogyakarta 55122',
        'description' => 'PT Seni Rupa dan Kerajinan Nusantara adalah perusahaan yang bergerak dalam bidang Design Art dan Craft. Kami mengkhususkan diri dalam pembuatan dan pemasaran produk seni rupa serta kerajinan tangan khas Indonesia. Dengan menggabungkan teknik tradisional dan inovasi modern, kami menghadirkan karya-karya unik yang menggambarkan kekayaan budaya Indonesia'
      ]
    ];

    // Looping and Inserting Array's Users into User Table
    foreach ($JobVacancy as $JobVacancy) {
      JobVacancy::create($JobVacancy);
    }
  }
}
