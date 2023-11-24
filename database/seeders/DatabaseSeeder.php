<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Resep;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.  
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            "name" => "vero",
            "email" => "vero@gmail.com",
            "password" => Hash::make('12345678')
        ]);

        
        // $kategori = array(
        //     'Makanan Pembuka', 'Makanan Utama', 'Makanan Penutup',
        //     'Makanan Ringan',
        // );
        // foreach ($kategori as $kategoo) {
        //     Kategori::create([
        //         'nama' => $kategoo,
        //     ]);
        // }

        // $table->foreignId("kategori_id");
        //     $table->string("judul");
        //     $table->string("waktu_masak");
        //     $table->text("bahan");
        //     $table->text("intruksi");Hash::make('029')
        // Resep::create([
        //     "judul" => "Tumis Kangkung",
        //     "kategori_id" => 2,
        //     "waktu_masak" => "10 Menit",
        //     "bahan" => "<ul><li>5 buah bawang merah cincang halus<\/li><li>3 siung bawang putih memarkan cincang halus<\/li><li>1 1\/4 sdt Royco kaldu ayam<\/li><li>1 sdm minyak wijen<\/li><li>2 buah cabai merah buang biji iris serong tipis<\/li><li>2 ikat (500 g) kangkung, petiki daunnya<\/li><li>3 sdm minyak untuk menumis<\/li><\/ul><div><br><\/div>",
        //     "intruksi" => "<ol><li>Panaskan minyak di dalam wajan di atas api sedang. Tumis bawang merah dan bawang putih hingga harum.<\/li><li>Masukkan Royco Kaldu Ayam, minyak wijen, dan cabai merah, aduk rata.<\/li><li>Masukkan kangkung, aduk rata hingga semua bahan tercampur rata. Angkat.<\/li><li>Sajikan segera ditemani nasi putih.<\/li><\/ol><div><br><\/div>",
        // ]);

        // Resep::create([
        //     "judul" => "Sop Buntut",
        //     "kategori_id" => 2,
        //     "waktu_masak" => "180 Menit",
        //     "bahan" => "<ul><li>500 gram buntut sapi rebus sampai empuk<\/li><li>1 sendok makan minyak canola<\/li><li>1 bawang merah iris tipis<\/li><li>2 bawang putih memarkan<\/li><li>2 daun jeruk purut sobek kasar<\/li><li>1 daun bawang ikat<\/li><li>2 seledri ikat<\/li><li>1 batang kayumanis memarkan<\/li><li>1\/2 pala utuh<\/li><li>1 wortel potong<\/li><li>1 kentang potong<\/li><li>1,5 liter air<\/li><li>1 Royco bumbu pelezat serbaguna rasa sapi<\/li><li>garam secukupnya<\/li><li>gula secukupnya<\/li><li>lada putih bubuk secukupnya<\/li><\/ul><div><br><\/div>",
        //     "intruksi" => "<ol><li>Tumis minyak canola, bawang merah, bawang putih, daun jeruk, daun bawang, seledri, kayu manis, dan pala hingga harum.<\/li><li>Tambahkan buntut sapi, garam, gula, lada, lalu aduk rata. Sisihkan.<\/li><li>Didihkan air, dan masukkan Royco Bumbu Pelezat Serbaguna Rasa Sapi.<\/li><li>Masukkan potongan wortel dan kentang ke dalam air mendidih, lalu masak selama 15 menit hingga matang.<\/li><li>Masukkan tumisan buntut sapi ke dalam kuah kaldu, masak hingga matang.<\/li><li>Sajikan bersama potongan tomat segar dan pelengkap lainnya.<\/li><\/ol><div><br><\/div>",
        // ]);

    }
}
