namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RekomendasiSeeder extends Seeder
{
    public function run()
    {
        DB::table('rekomendasi')->insert([
            ['judul' => 'Belajar Laravel', 'deskripsi' => 'Panduan dasar Laravel 12', 'link' => '#', 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'UI/UX Design', 'deskripsi' => 'Membuat dashboard modern', 'link' => '#', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}