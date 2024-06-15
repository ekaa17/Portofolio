<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\ProductTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed database aplikasi.
     */
    public function run(): void
    {
        // Memanggil seeder tambahan jika diperlukan
        // $this->call([
        //     ProductTableSeeder::class,
        //     // Panggil seeder lainnya di sini
        // ]);

        // Membuat 10 pengguna menggunakan factory
        // \App\Models\User::factory(10)->create();

        // Membuat pengguna test
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Mengkonfirmasi untuk merefresh migrasi sebelum melakukan seeding
        // if ($this->command->confirm('Apakah Anda ingin merefresh migrasi sebelum melakukan seeding? Ini akan menghapus semua data lama.')) {
        //     $this->command->call('migrate:refresh');
        //     $this->command->info('Data telah dihapus, memulai dari database kosong.');
        // }

        // Membuat 5 pengguna menggunakan factory
        // User::factory(5)->create();
        // $this->command->info('Pengguna sampel telah di-seed.');

        // Menonaktifkan perlindungan mass-assignment
        Model::unguard();

        // Membuat pengguna secara manual
        User::create([
            'id' => (string) Str::uuid(), // Menghasilkan UUID
            'name' => 'Arnelia',
            'email' => 'Arnelia@example.org',
            'level' => 'admin',
            'password' => Hash::make('password'), // Menggunakan hash untuk keamanan
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => (string) Str::uuid(), // Menghasilkan UUID
            'name' => 'EkaPratama',
            'email' => 'EkaPratama@example.org',
            'level' => 'admin',
            'password' => Hash::make('password'), // Menggunakan hash untuk keamanan
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'id' => (string) Str::uuid(), // Menghasilkan UUID
            'name' => 'Nita',
            'email' => 'Nita@example.org',
            'level' => 'User',
            'password' => Hash::make('password'), // Menggunakan hash untuk keamanan
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Memanggil seeder untuk tabel produk
        $this->call(ProductTableSeeder::class);
    }
}
