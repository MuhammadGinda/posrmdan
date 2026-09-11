<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hargaBeli = $this->faker->numberBetween(10_000, 50_000);

        return [
            // PERUBAHAN DI SINI:
            // Jika user dengan role_id = 1 belum ada/tidak ditemukan, otomatis dibuatkan user baru
            'user_id' => User::where('role_id', 1)->inRandomOrder()->value('id') 
                ?? User::factory()->create(['role_id' => 1])->id,

            'foto' => 'produk/' . $this->faker->uuid() . '.jpg',
            'nama' => $this->faker->words(3, true),
            'harga_beli' => $hargaBeli,
            'harga_jual' => $hargaBeli + $this->faker->numberBetween(5_500, 100_000),
            'stok' => $this->faker->numberBetween(1, 500),
        ];
    }
}