<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use App\Models\Dokumen_rdhp;
use App\Models\Dokumen_rptp;
use App\Models\Kategori;
use App\Models\SK;
use App\Models\User;
use App\Models\Artikel;
use App\Models\ArtikelKategori;
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
        User::factory(10)->create();
        Kategori::factory(10)->create();
        Dokumen::factory(10)->create();
        Dokumen_rdhp::factory(10)->create();
        Dokumen_rptp::factory(10)->create();
        SK::factory(10)->create();
        ArtikelKategori::factory(12)->create();
        Artikel::factory(12)->create();
    }
}
