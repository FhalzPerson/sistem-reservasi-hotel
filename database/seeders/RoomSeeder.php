<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'id' => 1,
                'room_number' => '101',
                'room_type' => 'Deluxe Ocean View',
                'price_per_night' => 1250000,
                'description' => 'Kamar deluxe dengan pemandangan laut lepas, dilengkapi king-sized bed, balkon pribadi, dan kamar mandi marmer.',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuACkXdSxllefUOttlBczY3fqAXOLaiZJvIF1PUGLzvmFQqncE6p0Hye97w1qsH3n4ZApCpKyrdAshtH7fzAGOEqAfp2kwezjTxNmTa4FzVgQF8mSxNm5oGDzDynQSBhyjw4u6HEelW-TBzvj62_qlAGdOYi1WB8HXiWFqb3FQIgo_4s2uQndqRf3VovFb5rqaQRquRuFzXVSCfkW0-5ReqDh3HvAApUJjGKwR278YNiEtBsdN4_nWDeHpKlSNQ8Lysa5bq578knxqM',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'room_number' => '201',
                'room_type' => 'Executive Suite',
                'price_per_night' => 2800000,
                'description' => 'Suite eksekutif dengan ruang tamu terpisah, meja kerja, akses lounge, dan pemandangan kota.',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDEFUvj2c1AkMFZbUiOOrsy9jyyxux81mwnRGXnVX7QbDYV67x-dSw13s3ghf1NmSNNF2zMYVc6zAFi-zilsdZ2iNRYpVn0gytPAuySceN3picfgZPDqXV5NjLJ0cZjY83XecPQaxXZ-qyePIWneTT2NUBxWY3I-Z6RGf_yrFPfy56V5_xfHM2bTYYV7LAxIGZKEPhd_SHDU13lUtlNvGoin8tlI-f3IJEJ8nkkrBNT01SDWmWrd2AKLpY4RWvKnzjoD8GCXxeBBS4',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'room_number' => '301',
                'room_type' => 'Family Garden View',
                'price_per_night' => 1950000,
                'description' => 'Kamar keluarga luas dengan dua tempat tidur, area bermain anak, dan pemandangan taman.',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDE5WLLK55RGpwLTQ07c0e3qZyjFMAFv-6A7c8MWe-y4kULr8rpzly5DW0gzKP3njeAKF9B6yRlR61PQixwSvo0NunBzVh-AGPxggzUACRrrTcX0fo9fzfCQTgzSZyTCPQBYCx5E_DuJHTDEBNCOkKjBvUtGtWL0RI8NuxwvQl1aHkbY43dJ6ttyj2oTg7uEkCBmFTbpc9GENBVTmZI663WzgrYSST9lUIJkIeNb9NrR-4DLdHodTz_Kfzn9ViyXlJQw0n2ohmxR1Y',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'room_number' => '401',
                'room_type' => 'Signature Suite',
                'price_per_night' => 4500000,
                'description' => 'Suite signature dengan desain mewah, bathtub, layanan butler 24 jam, dan pemandangan 180 derajat.',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCYNq2U35Jg69ER3i8tFHZN1XLItdluv7f0Y3YDIRyJ0qL_aSvR8Wz0o8TJSweOPKOXJr0rM8zkubjDP6HbOwkJgNTapjAbwGq5cDLJNTRBE1vBYxjrgZhl8ZtXoY6ZolnUm5JwR3zzouUqsv7b6t4hfXRwaWM0LOrVoHpb68SbiVEkFXmuJgp7KfmNfDa7frJF8Dz1eHrLkhX5DlAA3pYHELaaFj_93aPqONsaHqbHhfXJupVO8xdJFEreDzJoQcWfDa0Z_bvpCB0',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'room_number' => '102',
                'room_type' => 'Standard Deluxe',
                'price_per_night' => 950000,
                'description' => 'Kamar standar modern dengan fasilitas lengkap: smart TV, free WiFi, dan kamar mandi shower.',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuANb_TsOJrq2RFLydGCpldvnNR6Y7L3HgPLR-BGUV9dlNA_tPN1CqwNr0iAMBElQdvJ3-INYI87ptEk-RjjFEnSooc1l6K4_9ax3ed9ukkH0o9pya4Yq0m7SYwaIT3NooVqeBwORPWh8cXDIz9PrTj6O9GyQy9W4NcxHz7kht3BWe8YU1xV6ItPbyll6zhgkQggg9jtH7q0a-GjT7opSgIqjYaxFsaFDqAyZ3IKkMEZIfUtqYkRq95XyKk0HNW_qn7Ce0wzQ5H6bAU',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'room_number' => '202',
                'room_type' => 'Grand Family Suite',
                'price_per_night' => 3200000,
                'description' => 'Suite keluarga besar dengan dapur kecil, ruang makan, dan dua kamar tidur terpisah.',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCpYtPA2sCiYcjRVT6KSjd5zb9EGeig1OdTkk_e_sO7dJOBnfadlQ9y2UbpcSgTlbOxvPIyqaTVC4wmraxCpyUeSvExIzIX1zNc8Dy6VsgrX98OinuYKySP3Ed5Gz91MKPUd4aIAaYUY_wYnICNdnJl59j0jLg4QbPcskD9LR5qUZaI0c4qVKoJfYFJj9HGessYE7X_z6rf5dOjuar3GSCbkdjUNsOJgLk8fEJQD8ai6632WqPh9MbKrYTSw1IhikgJKYYauHUYbRQ',
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('rooms')->insert($rooms);
    }
}